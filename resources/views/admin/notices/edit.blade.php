@extends('adminlte::page')

@section('title', 'Edit Post')

@section('content_header')
    <h1>Editar Postagem</h1>
@stop

@section('content')
@if (Session::has('message'))   
   <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Aviso!</h4>
    {{ Session::get('message') }}
  </div>
@endif
<form action="{{ route('notices.update',['id'=>$notice->id]) }}" method="post">
    @method('PUT')
    @csrf
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6">
                    <label for="">Título:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title') ? old('title') : $notice->title}}">
                    @error('title')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <label for="">Imagem:</label>
                    <div class="input-group">
                        <input id="thumbnail" class="form-control" type="text" name="image_url" value="{{old('image_url')? old('image_url') : $notice->image_url}}" onchange="updateImage()">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-upload"></i>
                            </a>
                        </span>
                    </div>
                    @error('image_url')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                    <img id="holder" src="{{old('image_url')? old('image_url') : $notice->image_url}}" style="margin-top:15px;max-height:100px;">
                </div>
                <div class="col-sm-3">
                    <label for="">Categoria:</label>
                    <select name="categories_id" id="" class="form-control">
                    <option value="{{$notice->categories_id}}">{{$notice->categories->title}}</option>
                        @foreach ($categories as $i)
                            @if($notice->categories_id != $i->id)
                                <option value="{{$i->id}}">{{$i->title}}</option>   
                            @endif
                        @endforeach
                    </select>
                    @error('categories_id')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label for="">Descrição:</label>
                <textarea name="description" id="description" cols="30" rows="20" class="form-control">{{old('description')? old('description') : $notice->description}}</textarea>
                    @error('description')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
                </div>
            </div>
        </div>
    
    </div>
</form>

@stop
@section('js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: "{{route('unisharp.lfm.show',['type'=>'Images'])}}",
    filebrowserImageUploadUrl: "{{route('unisharp.lfm.upload',['type'=>'Images','token'=>csrf_token()])}}",
    filebrowserBrowseUrl: "{{route('unisharp.lfm.show',['type'=>'Files'])}}",
    filebrowserUploadUrl: "{{route('unisharp.lfm.upload',['type'=>'Files','token'=>csrf_token()])}}"
  };
</script>
<script>
    CKEDITOR.replace('description', options);
    $('#lfm').filemanager('image', {prefix: "{{route('unisharp.lfm.show',['type'=>'Images','token'=>csrf_token()])}}"});
    function updateImage() {        
        $('#holder').attr("src",$('#thumbnail').val());
    }
</script>
    
@endsection