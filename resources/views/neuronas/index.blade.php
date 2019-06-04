@extends('layouts.app')

@section('content')

@if(count($neuronas) > 0)

    @foreach($neuronas as $key => $value)
        {{ $key . " " . $value  }} <br> 
    @endforeach

@else

<section class="text-center">
        <div class="container">
    
            <div class="mt-3"><h3>Aún no hay neuronas</h1></div>
    
        </div>
</section>

@endif

@endsection
