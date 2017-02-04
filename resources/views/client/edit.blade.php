@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novi klijent</div>
                    <div class="panel-body">
                        <form action="{{action('ClientController@edit', $client->id)}}" enctype="multipart/form-data"
                              method="POST" class="form-horizontal">
                        {{csrf_field()}}

                        <!--        Name        -->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label col-sm-2">Ime klijenta:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" value="{{ $client->name }}"
                                           class="form-control" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>


                            <!--        email          -->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label col-sm-2">E-mail:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="email" name="email" value="{{ $client->email }}"
                                           class="form-control" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>


                            <!--        Address          -->
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="control-label col-sm-2">Adresa:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="address" name="address" value="{{ $client->address }}"
                                           class="form-control" required autofocus>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>


                            <!--        contact_person          -->
                            <div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }}">
                                <label for="contact_person" class="control-label col-sm-2">Kontakt osoba:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="contact_person" name="contact_person"
                                           value="{{ $client->contact_person }}"
                                           class="form-control" required autofocus>
                                    @if ($errors->has('contact_person'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_person') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <!--        telephone          -->
                            <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <label for="telephone" class="control-label col-sm-2">Telefon:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="telephone" name="telephone" value="{{ $client->telephone }}"
                                           class="form-control" required autofocus>
                                    @if ($errors->has('telephone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telephone') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>


                            <!--        website          -->
                            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                <label for="website" class="control-label col-sm-2">Web:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="website" name="website" value="{{ $client->website }}"
                                           class="form-control" required autofocus>
                                    @if ($errors->has('website'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>



                            <!--        notes          -->
                            <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                                <label for="notes" class="control-label col-sm-2">Bilješke:</label>
                                <div class="col-sm-10">
                                    <textarea id="notes" name="notes" rows = "10"
                                              class="form-control" required autofocus>{{ $client->notes }}</textarea>
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
