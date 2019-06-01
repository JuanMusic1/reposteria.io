@extends('layouts.app')

@section('content')

@if(count($exercises) > 0)

<section class="text-center">
    <div class="container"> 
        
        <table class="table table-striped">
            
            <thead>
                <tr>
                  <td>Título</td>
                  <td colspan="3"></td>
                </tr>
            </thead>
            
            <tbody>
                @foreach($exercises as $exercise)
                <tr>
                    <td>{{$exercise->title}}</td>
                    <td><a href="{{ route('exercises.show',$exercise->id)}}" class="btn btn-success">Ver</a></td>
                    
                    @foreach($exercise->users as $user)
                        @if($user->id == Auth::user()->id)
                            
                            <td><a href="{{ route('exercises.edit',$exercise->id)}}" class="btn btn-primary">Editar</a></td>
                            <td>
                            <form action="{{ route('exercises.destroy', $exercise->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </td>

                        @endif  
                    @endforeach
                    
                </tr>
                @endforeach
            </tbody>
    
        </table>
    </div>
</section>

@else

<section class="text-center">
    <div class="container">

        <div class="mt-3"><h3>Aún no hay ejercicios ¡Sube uno!</h1></div>
        <div class="mt-3"><a href="{{ route('exercises.create', ['tag' => $tag] )}}" class="btn btn-primary">Subir un ejercicio</a></div>

    </div>
</section>

@endif

@endsection