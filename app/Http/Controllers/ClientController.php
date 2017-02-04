<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientCreateRequest;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::search(request()->query('search', null))
            ->paginate(self::DEFAULT_PAGINATION);

        return view('client.index', compact('clients'));
    }


    public function showCreateForm(){
        return view('client.create');
    }

    public function store(ClientCreateRequest $request){

        $client = new Client;

        $client->fill($request->all());

        $client->save();

        return redirect()->back();
    }


    public function show(Client $client){

        return view('client.show', compact('client'));

    }


    public function showEditForm(Client $client){

        return view('client.edit', compact('client'));
    }


    public function edit(Client $client, ClientCreateRequest $request){

            $client->update($request->all());

            return redirect()->back();

    }

}