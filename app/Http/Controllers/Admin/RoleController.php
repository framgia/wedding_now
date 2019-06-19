<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Http\Requests\Admin\CreateRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $role;
    protected $permission;

    public function __construct(RoleRepositoryInterface $role, PermissionRepositoryInterface $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $permission = $this->permission->getData();

        return view('admin.list_role', compact('permission'));
    }

    public function getAll()
    {
        $roles = collect($this->role->getData([], [], ['*'], ['permissions']))->filter(function ($role) {
            return $role->name != config('define.role.name.admin');
        });

        return $roles;
    }

    public function store(CreateRoleRequest $request)
    {
        DB::transaction(function () use ($request) {

            $role = $this->role->create([
                strtolower($request->name),
                $request->display_name,
                $request->description,
            ]);

            $role->attachPermission($request->permissions);
        });
    }

    public function show($id)
    {
        return $this->role->findById($id);
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        DB::transaction(function () use ($request, $id) {

            $this->role->update($id, [
                $request->name,
                $request->display_name,
                $request->description,
            ]);

            $role = $this->role->findById($id);

            $role->permissions()->sync($request->permissions);
        });
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {

            $role = $this->role->findById($id);

            $role->permissions()->detach();

            $this->role->destroy($id);
        });
    }
}
