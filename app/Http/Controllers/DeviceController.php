<?php

namespace App\Http\Controllers;

use App\Client;
use App\Device;
use App\Http\Requests\DeviceCreateRequest;
use App\Job;


class DeviceController extends Controller
{

    /**
     * Lists/searches all device based on serial number
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $devices = Device::search(request()->query('search', null))
            ->paginate(self::DEFAULT_PAGINATION);

        return view('device.index', compact('devices'));
    }


    /**
     * Displays single device
     *
     * @param Device $device
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Device $device){

        $jobs = $device->jobs()->with('user', 'parts')->latest()->paginate(self::DEFAULT_PAGINATION);

        $client = $device->client;

        return view('device.show', compact('device', 'jobs', 'client'));
    }


    /**
     * Redirects to new device form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreateForm()
    {
        $clients = Client::all('name')->pluck('name');

        return view('device.create', compact('clients'));
    }


    /**
     * Stores a new device
     *
     * @param DeviceCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DeviceCreateRequest $request)
    {
        $device = new Device();

        $device->fill($request->all());

        $device->client()->associate(Client::where('name',$request->client_name)->first());

        $device->save();

        return redirect()->action('DeviceController@show', $device->id);
    }


    /**
     * Redirects to edit form of a device
     *
     * @param Device $device
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEditForm($device_id)
    {
        $device = Device::with('client')
            ->where('id', $device_id)
            ->first();

        $clients = Client::all('name')->pluck('name');

        return view('device.edit', compact('device', 'clients'));
    }


    /**
     * Stores edited device to database
     *
     * @param Device $device
     * @param DeviceCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Device $device, DeviceCreateRequest $request)
    {
        $client = Client::where('name',$request->client_name)->first();

        $device->client()->associate($client);

        $device->update($request->all());

        return redirect()->action('DeviceController@show', $device->id);
    }

}
