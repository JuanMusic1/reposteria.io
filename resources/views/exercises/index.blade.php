@extends('layouts.app')

@section('content')

<section class="text-center">
        <div class="container"> 
            
            <table class="table table-striped">
                
                <thead>
                    <tr>
                      <td>Título</td>
                      <td>Acciones</td>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($exercises as $exercise)
                    <tr>
                        <td>{{$exercise->title}}</td>
                        <td>
                            <div class="form-group">
                                
                                <a href="{{ route('exercises.show',$exercise->id)}}" class="btn btn-primary"><li class="fa fa-eye"></li></a>
                        
                                        <a href="{{ route('exercises.edit',$exercise->id)}}" class="btn btn-success"><li class="fa fa-edit"></li></a>
    
                                        <form style="display:inline;" action="{{ route('exercises.destroy', $exercise->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><li class="fa fa-trash"></li></button>
                                        </form>
    
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        
            </table>
        </div>
    </section>

@endsection
