@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Kemaskini Aduan</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('aduan.update', $aduan->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT')}}

                        <div class="form-group{{ $errors->has('tajuk') ? ' has-error' : '' }}">
                            <label for="tajuk" class="col-md-4 control-label">Tajuk</label>

                            <div class="col-md-6">
                                <input id="tajuk" type="text" class="form-control" name="tajuk" value="{{ old('tajuk', $aduan->tajuk) }}" required autofocus>

                                @if ($errors->has('tajuk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tajuk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('aduan') ? ' has-error' : '' }}">
                            <label for="aduan" class="col-md-4 control-label">Aduan</label>

                            <div class="col-md-6">
                                <textarea name="aduan" id="aduan" cols="30" rows="3">{{ old('aduan', $aduan->aduan) }}</textarea>

                                @if ($errors->has('aduan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aduan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection