@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-md-7">
                        <!--            Device details          -->
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $device->serial_number }}</div>
                            <div class="panel-body">
                                <dl class="dl-horizontal">
                                    <dt>Proizvođač:</dt>
                                    <dd>{{ $device->manufacturer }}</dd>

                                    <dt>Tip:</dt>
                                    <dd>{{ $device->type }}</dd>

                                    <dt>Serijski broj:</dt>
                                    <dd>{{ $device->serial_number }}</dd>

                                    <dt>Model:</dt>
                                    <dd>{{ $device->model }}</dd>

                                    <dt>Bilješke:</dt>
                                    <dd>{{ $device->notes }}</dd>

                                </dl>
                            </div>

                            <!--            Device control          -->
                            <div class="panel-footer">
                                <a href="{{ action('DeviceController@showEditForm', $device->id) }}"
                                   class="btn btn-primary">Uredi</a>
                                <a href="{{ action('JobController@showCreateForm', $device->id) }}"
                                   class="btn btn-success">Novi
                                    servis</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $client->name }}</div>
                            <div class="panel-body">
                                <dl>
                                    <dt>Telefon:</dt>
                                    <dd>{{ $client->telephone }}</dd>

                                    <dt>Lokacija</dt>
                                    <dd>{{ $client->address }}</dd>

                                    <dt>E-mail</dt>
                                    <dd>{{ $client->email }}</dd>

                                </dl>
                            </div>

                            <div class="panel-footer">
                                <a href="{{ action('ClientController@show', $client->id) }}" class="btn btn-primary">Detalji</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel-group">
                        @foreach($jobs as $job)
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    @if($job->created_at->isToday())
                                        {{ $job->created_at->diffForHumans() }}
                                    @else
                                        {{ $job->created_at->format('d F Y | H:i') }}
                                    @endif
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">
                                        <dt>Servisirao:</dt>
                                        <dd>{{ $job->user->first_name .' '.$job->user->last_name }}</dd>
                                        <dt>Bilješke:</dt>
                                        <dd>{{ $job->notes }}</dd>
                                    </dl>
                                    @if((!($job->parts->isEmpty())))
                                        <hr>
                                        <h4>Dijelovi</h4>
                                        <dl class="dl-horizontal">
                                            @foreach($job->parts as $part)
                                                <div class="well-sm">
                                                    <dt>Tip:</dt>
                                                    <dd>{{ $part->type }}</dd>
                                                    <dt>Serijski broj:</dt>
                                                    <dd>{{ $part->serial_number }}</dd>
                                                </div>
                                            @endforeach
                                        </dl>
                                    @endif
                                </div>

                                <!--        Job control         -->
                                <div class="panel-footer">
                                    <a href="{{ action('JobController@show', $job->id) }}"
                                       class="btn btn-link">Detalji</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        {{ $jobs->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection