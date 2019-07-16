<?php

namespace App\Http\Controllers\User;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Schedule\ScheduleRepository;

class PackageController extends Controller
{
	protected $wedding;

    public function __construct(Schedule $scheduleWedding)
    {
        $this->wedding = new ScheduleRepository($scheduleWedding);
    }

    public function detail(Request $request)
    {
    	$package = $this->wedding->getPackage($request->id);

    	return view('user.sections.detail_package', compact('package'));
    }
}
