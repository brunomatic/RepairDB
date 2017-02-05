@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novi uređaj</div>
                    <div class="panel-body">
                        <form action="{{action('DeviceController@store')}}" enctype="multipart/form-data"
                              method="POST" class="form-horizontal">
                        {{csrf_field()}}

                        <!--        client        -->
                            <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label col-sm-2">Klijent:</label>
                                <div class="col-sm-10">
                                    <input list="clients" type="text" id="client_name" name="client_name"
                                           value="{{ old("client_name") }}"
                                           class="form-control" autofocus>
                                    <datalist id="clients">
                                        @foreach($clients as $client)
                                            <option value="{{ $client }}">
                                        @endforeach
                                    </datalist>
                                    @if ($errors->has('client_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_name') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <!--        manufacturer        -->
                            <div class="form-group{{ $errors->has('manufacturer') ? ' has-error' : '' }}">
                                <label for="name" class="control-label col-sm-2">Proizvođač:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="manufacturer" name="manufacturer"
                                           value="{{ old("manufacturer") }}"
                                           class="form-control" required autofocus>
                                    @if ($errors->has('manufacturer'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('manufacturer') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>


                            <!--        type          -->
                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="control-label col-sm-2">Tip:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="type" name="type" value="{{ old("type") }}"
                                           class="form-control" required autofocus>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>


                            <!--        serial_number          -->
                            <div class="form-group{{ $errors->has('serial_number') ? ' has-error' : '' }}">
                                <label for="serial_number" class="control-label col-sm-2">Serijski broj:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="serial_number" name="serial_number"
                                           value="{{ old("serial_number") }}"
                                           class="form-control" required autofocus>
                                    @if ($errors->has('serial_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('serial_number') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>


                            <!--        model          -->
                            <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                                <label for="model" class="control-label col-sm-2">Model:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="model" name="model"
                                           value="{{ old("model") }}"
                                           class="form-control" required autofocus>
                                    @if ($errors->has('model'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('model') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <!--        notes          -->
                            <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                                <label for="notes" class="control-label col-sm-2">Bilješke:</label>
                                <div class="col-sm-10">
                                    <textarea id="notes" name="notes" rows="10"
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