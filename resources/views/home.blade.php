@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Pretraži uređaje po serijskom broju</h3>
                        <form action="{{action('DeviceController@index')}}" method="get" class="form-inline">
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
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
