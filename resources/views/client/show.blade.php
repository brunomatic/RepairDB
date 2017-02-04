@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $client->name }}</div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Telefon:</dt>
                            <dd>{{ $client->telephone }}</dd>

                            <dt>Lokacija</dt>
                            <dd>{{ $client->address }}</dd>

                            <dt>Kontakt osoba:</dt>
                            <dd>{{ $client->contact_person }}</dd>

                            <dt>E-mail</dt>
                            <dd>{{ $client->email }}</dd>

                            <dt>Web stranica:</dt>
                            <dd>{{ $client->website }}</dd>

                            <dt>Bilješke:</dt>
                            <dd>{{ $client->notes }}</dd>

                        </dl>
                    </div>

                    <div class="panel-footer">
                        <a href="{{ action('ClientController@showEditForm', $client->id) }}" class="btn btn-primary">Uredi</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection