<?php

namespace App\Http\Controllers\Admin;

use Entrust;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

use App\Repositories\Role\RoleRepository;

use App\Http\Requests\Admin\RoleRequest;
use App\Http\Requests\Admin\RoleUpdateRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleModel;

    public function __construct(Role $role)
    {
        $this->roleModel = new RoleRepository($role);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = Permission::all();

        return view('admin.role.index', compact('permission'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRole()
    {
        return Role::withCount('permissions')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = $this->roleModel->create($request->only('name', 'display_name', 'description'));

        $permission = $request->except(
            '_token',
            '_method',
            'roleId',
            'name',
            'display_name',
            'description'
        );

        $role->attachPermission($permission);

        return __('base.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Role::findOrFail($id)->load('permissions');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $this->roleModel->update($id, $request->only('name', 'display_name', 'description'));

        $role = Role::findOrFail($id)->load('permissions');
        $permission = $request->except(
            '_token',
            '_method',
            'roleId',
            'name',
            'display_name',
            'description'
        );

        $role->perms()->detach($role->permissions);
        $role->attachPermission($permission);

        return __('base.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);

            $role->delete();
            $role->users()->sync([]);

            return __('base.success');
        } catch (Exception $e) {
            return __('base.error');
        }
    }
}
