@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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

                    <div class="panel-footer">
                        <a href="{{ action('DeviceController@showEditForm', $device->id) }}" class="btn btn-primary">Uredi</a>
                        <a href="{{ action('JobController@showCreateForm', $device->id) }}" class="btn btn-success">Novi
                            servis</a>
                    </div>
                </div>

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
                            </div>
                        </div>
                    @endforeach

                    <div class="row">
                        <div class="text-center">
                            {{ $jobs->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection