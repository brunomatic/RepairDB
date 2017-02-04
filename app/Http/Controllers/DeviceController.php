<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Requests\DeviceCreateRequest;
use App\Job;


class DeviceController extends Controller
{


    public function index()
    {
        $devices = Device::search(request()->query('search', null))
            ->paginate(self::DEFAULT_PAGINATION);

        return view('device.index', compact('devices'));
    }

    public function show(Device $device){

        $jobs = $device->jobs()->with('user')->latest()->paginate(self::DEFAULT_PAGINATION);

        return view('device.show', compact('device', 'jobs'));
    }


    public function showCreateForm()
    {
        return view('device.create');
    }

    public function store(DeviceCreateRequest $request)
    {
        $device = new Device();

        $device->fill($request->all());

        $device->save();

        return redirect()->action('DeviceController@show', $device->id);
    }

    public function showEditForm(Device $device)
    {
        return view('device.edit', compact('device'));
    }

    public function edit(Device $device, DeviceCreateRequest $request)
    {
        $device->update($request->all());

        return redirect()->action('DeviceController@show', $device->id);
    }

}
