@extends('adminlte::page')

@if($selecao == 'alunos')
    @section('title', 'Editar Aluno')
@endif
@if($selecao == 'docentes')
    @section('title', 'Editar Docentes')
@endif

@section('content-number-css')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection

@section('content_header')
    
@stop

@section('content')
    @can('Diretor')
        @if($selecao == 'alunos')
            <form method="POST" action="{{route('atualizar_aluno', $id)}}" enctype="multipart/form-data">
                @method('PUT')
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
                    <label for="exampleInputEmail1">Número de Matrícula</label>
                    <input type="number" maxlength="14" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{date('Y', strtotime(now()))}}" name="matricula">
                    <small>*O Número de Matrícula deve ser um número de 14(quartoze) algarismos, onde os primeiros quatro são o ano atual</small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Foto do Aluno</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>  Editar</button>
            </form>
        @endif
     
        <!-- Professores -->
       @if($selecao == 'docentes')
        <form method="POST" action="{{route('atualizar_docentes', $id)}}" enctype="multipart/form-data">
            @method('PUT')
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Nome do Professor</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email do Professor</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="email">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlFile1">Foto do Professor</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>  Editar</button>
        </form>
       @endif
    @endcan
@stop