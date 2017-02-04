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
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Novi servis</div>
                    <div class="panel-body">
                        <form action="{{action('JobController@store', $device->id)}}" enctype="multipart/form-data"
                              method="POST" class="form-horizontal">
                        {{csrf_field()}}

                            <!--        notes          -->
                            <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                                <label for="notes" class="control-label col-sm-2">Bilješke:</label>
                                <div class="col-sm-10">
                                    <textarea id="notes" name="notes" rows = "10"
                                              class="form-control" autofocus>{{ old("notes") }}</textarea>
                                    @if ($errors->has('notes'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('notes') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary pull-right" value="Spremi">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection