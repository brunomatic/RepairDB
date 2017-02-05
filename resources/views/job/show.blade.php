@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <!--        Related device      -->
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

                <!--        Job         -->
                <div class="panel panel-primary">
                    <div class="panel-heading">Servis</div>
                    <div class="panel-body">

                        <!--        Job details         -->
                        <dl class="dl-horizontal">
                            <dt>Servisirao:</dt>
                            <dd>{{ $job->user->first_name .' '.$job->user->last_name }}</dd>
                            <dt>Datum i vrijeme:</dt>
                            <dd>
                                @if($job->created_at->isToday())
                                    {{ $job->created_at->diffForHumans() }}
                                @else
                                    {{ $job->created_at->format('d F Y | H:i') }}
                                @endif
                            </dd>
                            <dt>Bilješke:</dt>
                            <dd>{{ $job->notes }}</dd>
                            @if((!($parts->isEmpty())))
                                <hr>
                            <!--        Part list       -->
                                <h4>Dijelovi</h4>
                                <dl class="dl-horizontal">
                                    @foreach($parts as $part)
                                        <div class="well-sm">
                                            <dt>Proizvođač:</dt>
                                            <dd>{{ $part->manufacturer }}</dd>

                                            <dt>Tip:</dt>
                                            <dd>{{ $part->type }}</dd>

                                            <dt>Serijski broj:</dt>
                                            <dd>{{ $part->serial_number }}</dd>

                                            <dt>Opis:</dt>
                                            <dd>{{ $part->description }}</dd>
                                        </div>
                                    @endforeach
                                </dl>
                            @endif
                        </dl>
                    </div>
                    <!--        Job control     -->
                    <div class="panel-footer">
                        <a href="{{ action('JobController@showEditForm', $job->id) }}" class="btn btn-primary">Uredi</a>
                        <a href="#" data-href="{{action('JobController@delete', $job->id)}}" class="btn btn-danger"
                           data-toggle="modal"
                           data-target="#confirm-delete">Obriši</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--        Popup for deletion      -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Potvrdite brisanje</h4>
                </div>

                <div class="modal-body">
                    <p>Servisni zapis će biti nepovratno obrisan.</p>
                    <p>Da li želite nastaviti?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                    <a class="btn btn-danger btn-ok">Obriši</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#confirm-delete').on('show.bs.modal', function (e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
    </script>
@endsection