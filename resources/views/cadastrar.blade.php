@extends('adminlte::page')

@if($selecao == 'alunos')
    @section('title', 'Cadastro de Aluno')
@endif
@if($selecao == 'docentes')
    @section('title', 'Cadastro de Docentes')
@endif

@section('content_header')
    
@stop

@section('content')
    @can('Diretor')
        @if($selecao == 'alunos')
            <form method="POST" action="{{route('salvar_aluno')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome do Aluno</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email do Aluno</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Foto do Aluno</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>  Cadastrar</button>
            </form>
        @endif
        @if($selecao == 'docentes')
        <form method="POST" action="{{route('salvar_docentes')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome do Docente</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email do Docente</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Foto do Docente</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>  Cadastrar</button>
            </form>
        @endif
    @endcan
@stop