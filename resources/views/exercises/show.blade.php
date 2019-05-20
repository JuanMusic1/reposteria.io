@extends('layouts.app')

@section('content')


<div class="container">
    <h1 class="mt-5">{{ $exercise->title }}</h1>
    <p class="lead">{{ $exercise->description }}</p>
</div>

@endsection