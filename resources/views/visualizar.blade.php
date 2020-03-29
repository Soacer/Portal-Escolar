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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Número de Matrícula</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user['nome']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['numero_matricula']}}</td>
                        <td>
                            <a href="" class="btn btn-danger"><i class="fa fa-user-times"></i>  Deletar Aluno</a>
                        </td>
                        <td>
                            <a href="" class="btn btn-success"><i class="fa fa-user-plus"></i> Editar Dados Cadastrais</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endcan
@stop