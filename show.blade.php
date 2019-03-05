@extends('layouts.app')

@section('content')

Paparan aduan

{{ $aduan->tajuk }} <br>
{{ $aduan->aduan }} <br>
{{ $aduan->tarikh_aduan }}

<a href="/aduan/{{ $aduan->id }}/edit" class="btn btn-primary">Kemaskini</a>
@endsection