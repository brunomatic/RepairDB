<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Requests\JobCreateRequest;
use App\Job;

class JobController extends Controller
{
    public function showCreateForm(Device $device)
    {
        return view('job.create', compact('device'));
    }

    public function store(Device $device, JobCreateRequest $request)
    {
        $job = new Job();

        $job->fill($request->all());

        $job->device()->associate($device);

        $job->user()->associate(auth()->user());

        auth()->user()->jobs()->save($job);

        $device->jobs()->save($job);

        return redirect()->action('DeviceController@show', $device->id);
    }
}
