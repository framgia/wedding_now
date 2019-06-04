<?php

namespace App\Http\Controllers\User;

use App\Models\ScheduleWedding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ScheduleWedding\ScheduleWeddingRepository;

class PackageController extends Controller
{
	protected $wedding;

    public function __construct(ScheduleWedding $scheduleWedding)
    {
        $this->wedding = new ScheduleWeddingRepository($scheduleWedding);
    }

    public function detail(Request $request)
    {
    	$package = $this->wedding->getPackage($request->id);

    	return view('user.sections.detail_package', compact('package'));
    }
}
