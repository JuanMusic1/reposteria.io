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

                    
                    <form method="post" action="{{ route('exercises.update', $exercise->id) }} " enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    
                        <div class="form-group">
                            <label for="title">Titulo:</label>
                            <input type="text" class="form-control" name="title" value="{{ $exercise->title }}" />
                         </div>

                        <div class="form-group">
                          <label for="description">Descripcion:</label>
                          <textarea class="form-control" name="description" rows="5">{{ $exercise->description }}</textarea>
                        </div>

                        <div class="form-group">
                                <label for="tag">Categoría:</label>
                                <select class="form-control" name="tag">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" @if($tag->id == $exercise->tag_id) {{ "selected" }} @endif >{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                        </div>

                    
                        <div class="form-group">
                                <label for="users">IDs de los usuarios:</label><br>
                                <input value="@foreach($users as $user) @if($user->id != Auth::user()->id) {{ $user->id . "," }} @endif @endforeach" data-role="tagsinput" name="users"/>
                            </div>
    
                          <div class="form-group control-group increment">
                                <label for="files">Archivos:</label>
                                <meta name="csrf-token" content="{{ csrf_token() }}" />

                                <div class="file-loading">
                                    <input id="input-file" type="file" class="file" name="attachment[]" data-preview-file-type="text" multiple>
                                </div>

                                <script>
                                    

                                    var urls        = @json($urls);
                                    var urls_data   = @json($urls_data);

                                    
                                    var deleteButton =  '<button type="button" id="deleteThisShit" class="btn kv-cust-btn btn-sm btn-kv btn-default btn-outline-secondary" title="Delete" key="{key}">' +
                                                        '<i class="fa fa-trash"></i>' +
                                                        '</button>';
                                                        
                                    $(document).ready(function(){
                                        // initialize with defaults
                                        $("#input-file").fileinput({
                                            fileActionSettings:{
                                                showRemove: false
                                            },
                                            otherActionButtons: deleteButton,
                                            initialPreview: urls,
                                            initialPreviewAsData: true,
                                            initialPreviewConfig: urls_data,
                                            theme: 'fa',
                                            language: 'es',
                                            showUpload: false,
                                            showUploadStats: false,
                                            overwriteInitial: false,
                                            uploadAsync: false
                                        });
                                        //ajax delete
                                        $(".kv-preview-thumb").on('click', "#deleteThisShit", function(e) {
                                            var thumb       = $(this).parent().parent().parent().parent();
                                            var id          = $(this).attr("key");
                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });                                            
                                            e.preventDefault();
                                            $.ajax({
                                                type: "delete",
                                                url: "http://localhost:8000/files/"+id,
                                                contentType: "application/json; charset=utf-8",
                                                dataType: "json",
                                                async:true,
                                                success: function (data) {
                                                    console.log(data);
                                                    thumb.fadeOut( "slow", function() {
                                                        thumb.remove();
                                                    })
                                                },
                                                error: function (data) {
                                                    console.log(data);
                                                }
                                             });
                                        });
                                    });


                                </script>
    
                            </div>  
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection