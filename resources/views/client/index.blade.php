@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="" method="get" class="form-inline pull-right">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                   value="{{ request()->get('search', null) }}"
                                   placeholder="Pretraži..">
                            <span class="input-group-btn">
				<button class="btn" type="submit"><i class="fa fa-search"></i></button>
			</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @foreach($clients as $client)

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
                            </dl>
                            <a href="{{ action('ClientController@show', $client->id) }}" class="btn btn-primary pull-right">Detalji</a>
                        </div>
                    </div>
                </div>
            </div>


        @endforeach

        <div class="row">
            <div class="text-center">
                {{ $clients->links() }}
            </div>
        </div>
    </div>
@endsection