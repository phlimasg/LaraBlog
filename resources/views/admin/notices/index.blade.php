@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Postagens</h1>
@stop

@section('content')
@if (Session::has('message'))   
   <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Aviso!</h4>
    {{ Session::get('message') }}
  </div>
@endif
    <div class="box">
        <div class="box-header">
            Todas as postagens
            <div class="box-tools">
              <a href="{{ route('notices.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Nova Postagem</a>
            </div>
        </div>
        <div class="box-body">
            @forelse ($notices as $i)
            <div class="row">
                <div class="col-sm-2">
                    <img src="{{$i->image_url}}" alt="" class="img-responsive" style="max-height: 150px">
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>{{$i->title}}</h3>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {{strip_tags($i->description)}}
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                        <small>Criado por: {{$i->userCreate->name}} em {{date('d/m/Y H:i',strtotime($i->created_at))}}</small><br>
                        <small>Última edição por: {{$i->userEdit->name}} em {{date('d/m/Y H:i',strtotime($i->updated_at))}}</small>
                        </div>                        
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="btn-group">
                        <a href="{{ route('notices.edit', ['id'=>$i->id]) }}" class="btn btn-primary"> <i class="fa fa-edit"></i> Editar</a>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                        <li><a href="#" data-toggle="modal" data-target="#delete{{$i->id}}"><i class="fa fa-trash" ></i>Excluir</a></li>
                          
                        </ul>
                    </div>
                </div>
            </div>
        <div class="modal modal-danger fade" id="delete{{$i->id}}" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                      <h4 class="modal-title">Excluir</h4>
                    </div>
                    <div class="modal-body">
                    <p>Deseja realmente exclui "{{$i->title}}"</p>
                    *Não pode ser desfeito.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                      <form action="{{ route('notices.destroy', ['id'=>$i->id]) }}" method="post">
                        @csrf
                        @method('delete')
                          <button type="submit" class="btn btn-outline">Cofirmar</button>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <hr>
            @empty
                Nada cadastrado
            @endforelse
        </div>
        <div class="box-footer">
            {{ $notices->links() }}
        </div>
    </div>
@stop