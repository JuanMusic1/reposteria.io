@extends('layouts.app')

@section('content')

@foreach($exercises as $exercise)
    {{$exercise->title}}
@endforeach

@endsection