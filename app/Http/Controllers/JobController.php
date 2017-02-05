<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Requests\JobCreateRequest;
use App\Job;
use App\Part;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{

    /**
     * Redirects to create form for a job
     *
     * @param Device $device
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreateForm(Device $device)
    {
        return view('job.create', compact('device'));
    }


    /**
     * Stores job data and binds it to user and device entry
     *
     * @param Device $device
     * @param JobCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Device $device, JobCreateRequest $request)
    {

        DB::transaction(function () use ($request, $device) {
            $job = new Job();

            $job->fill($request->all());

            $job->device()->associate($device);

            $job->user()->associate(auth()->user());

            auth()->user()->jobs()->save($job);

            $device->jobs()->save($job);

            $parts = [];
            foreach ($request->get('parts', []) as $part) {
                $part_db = new Part();
                $part_db->fill($part);
                $parts[] = $part_db;
            }
            $job->parts()->saveMany($parts);
        });

        return redirect()->action('DeviceController@show', $device->id);
    }


    /**
     * Displays job details
     *
     * @param Job $job
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Job $job)
    {
        $parts = $job->parts;
        $device = $job->device;
        return view('job.show', compact('device', 'job', 'parts'));
    }


    /**
     * Redirects to job edit form
     *
     * @param $job_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEditForm($job_id)
    {
        $job = Job::with('user', 'device', 'parts')
            ->where('id', $job_id)
            ->first();

        return view('job.edit', compact('job'));
    }


    /**
     * Stores edited job on submit
     *
     * @param Job $job
     * @param JobCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Job $job, JobCreateRequest $request)
    {
        DB::transaction(function () use ($request, $job) {

            foreach ($job->parts as $part) {
                $part->delete();
            }

            $job->update($request->all());

            $job->user()->associate(auth()->user());

            auth()->user()->jobs()->save($job);

            $parts = [];
            foreach ($request->get('parts', []) as $part) {
                $part_db = new Part();
                $part_db->fill($part);
                $parts[] = $part_db;
            }
            $job->parts()->saveMany($parts);

        });

        return redirect()->action('JobController@show', $job->id);;
    }


    /**
     * Removes job and subsequent parts from the database
     *
     * @param Job $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Job $job)
    {
        $device = $job->device;

        DB::transaction(function () use ($job) {
            foreach ($job->parts as $part) {
                $part->delete();
            }
            $job->delete();
        });

        return redirect()->action('DeviceController@show', $device->id);
    }

}
