@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">

            <div class="card uper">
            
                <div class="card-header">
                    Subir ejercicio
                </div>
            
                <div class="card-body">
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                
                  <form method="post" action="{{ route('exercises.store') }} " enctype="multipart/form-data">
                      
                    <div class="form-group">
                          @csrf
                          <label for="title">Título:</label>
                          <input type="text" class="form-control" name="title"/>
                      </div>
                      
                      <div class="form-group">
                          <label for="description">Descripción:</label>
                          <textarea class="form-control" name="description" rows="5"></textarea>
                      </div>
                      
                        <div class="form-group">
                            <label for="tag">Categoría:</label>
                            <select class="form-control" name="tag">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" @if($tag->id == $requestTag) {{ "selected" }} @endif >{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                      
                        <div class="form-group">
                            <label for="users">IDs de los usuarios:</label><br>
                            <input data-role="tagsinput" name="users"/>
                        </div>

                      <div class="form-group control-group increment">
                            <label for="files">Archivos:</label>
                            
                            <div class="file-loading">
                                <input type="file" name="attachment[]" data-preview-file-type="text" multiple>
                            </div>


                            <script>
                                $(document).on('ready', function() {
                                    // initialize with defaults
                                    $("[type='file']").fileinput({ initialPreview: [url1, url2],
                                        theme: "fas"
                                    });
                                });
                            </script>

                        </div>  

                            

                      <button type="submit" class="btn btn-primary">Subir</button>
                  
                    </form>
              
                </div>
            </div>

        </div>
    </div>
</div>


@endsection