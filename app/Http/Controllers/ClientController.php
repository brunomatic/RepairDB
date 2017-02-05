<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientCreateRequest;

class ClientController extends Controller
{


    /**
     * Lists/searches clients based on their name
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $clients = Client::search(request()->query('search', null))
            ->paginate(self::DEFAULT_PAGINATION);

        return view('client.index', compact('clients'));
    }


    /**
     * Redirects to create form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreateForm(){
        return view('client.create');
    }


    /**
     * Stores new client to DB
     *
     * @param ClientCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClientCreateRequest $request){

        $client = new Client;

        $client->fill($request->all());

        $client->save();

        return redirect()->back();
    }


    /**
     * Shows a single client
     *
     * @param Client $client
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Client $client){
        $devices = $client->devices()->paginate(9);
        return view('client.show', compact('client', 'devices'));
    }


    /**
     * Redirects to edit form
     *
     * @param Client $client
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEditForm(Client $client){

        return view('client.edit', compact('client'));
    }


    /**
     * Stores edited client to db
     *
     * @param Client $client
     * @param ClientCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Client $client, ClientCreateRequest $request){

            $client->update($request->all());

            return redirect()->back();

    }

}