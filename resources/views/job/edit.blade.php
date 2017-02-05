@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $job->device->serial_number }}</div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Proizvođač:</dt>
                            <dd>{{ $job->device->manufacturer }}</dd>

                            <dt>Tip:</dt>
                            <dd>{{ $job->device->type }}</dd>

                            <dt>Serijski broj:</dt>
                            <dd>{{ $job->device->serial_number }}</dd>

                            <dt>Model:</dt>
                            <dd>{{ $job->device->model }}</dd>

                            <dt>Bilješke:</dt>
                            <dd>{{ $job->device->notes }}</dd>

                        </dl>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Novi servis</div>
                    <div class="panel-body">
                        <form action="{{action('JobController@edit', $job->id)}}" enctype="multipart/form-data"
                              method="POST" class="form-horizontal">
                        {{csrf_field()}}

                        <!--        notes          -->
                            <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                                <label for="notes" class="control-label col-sm-2">Bilješke:</label>
                                <div class="col-sm-10">
                                    <textarea id="notes" name="notes" rows="10"
                                              class="form-control" autofocus>{{ $job->notes }}</textarea>
                                    @if ($errors->has('notes'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('notes') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <label for="parts" class="control-label col-sm-2">Dijelovi:</label>
                            <div class="form-group{{ $errors->has('parts[]') ? ' has-error' : '' }} col-xs-10"
                                 id="parts-wrapper">
                                @foreach($job->parts as $index => $part)
                                    <div>
                                        <input type="text" placeholder="Proizvođač" class="form-control"
                                               value="{{$part->manufacturer}}" name="parts[{{$index}}][manufacturer]">
                                        <input type="text" placeholder="Tip" class="form-control"
                                               value="{{$part->type}}" name="parts[{{$index}}][type]">
                                        <input type="text" placeholder="Serijski broj" required class="form-control"
                                               value="{{$part->serial_number}}" name="parts[{{$index}}][serial_number]">
                                        <input type="text" placeholder="Opis" class="form-control"
                                               value="{{$part->description}}" name="parts[{{$index}}][description]">
                                        <span>
                        <button class="btn btn-danger rm-part" type="button" style="color: #fff"
                                onclick="$(this).parent().parent().remove()">Remove</button>
                        </span>
                                    </div>

                                @endforeach
                            </div>

                            <button class="btn btn-primary" id="add-part" type="button">
                                <i class="fa fa-plus"></i>
                            </button>

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

@section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var max_fields = 20;
            var wrapper = $("#parts-wrapper");
            var add_button = $("#add-part");

            add_button.on('click', function () {
                var current_answers = wrapper.children('div');

                if (current_answers.length <= max_fields) {
                    wrapper.append('<div>' +
                        '<input type = "text" placeholder="Proizvođač" class = "form-control" name = "parts[' + current_answers.length + '][manufacturer]">' +
                        '<input type = "text" placeholder="Tip" class = "form-control" name = "parts[' + current_answers.length + '][type]">' +
                        '<input type = "text" placeholder="Serijski broj" required class = "form-control" name = "parts[' + current_answers.length + '][serial_number]">' +
                        '<input type = "text" placeholder="Opis" class = "form-control" name = "parts[' + current_answers.length + '][description]">' +
                        '<span>' +
                        '<button class="btn btn-danger rm-part" type="button" style="color: #fff" onclick="$(this).parent().parent().remove()">Remove</button>' +
                        '</span></div>');
                }
            });

        });
    </script>
@endsection