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
        @if($alunos != null)
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
                    @foreach($alunos as $aluno)
                        <tr>
                            <td>{{$aluno['nome']}}</td>
                            <td>{{$aluno['email']}}</td>
                            <td>{{$aluno['numero_matricula']}}</td>
                            <td>
                                <form action="{{route('deletar_aluno', $aluno['id'])}}" method="POST">
                                    @method('DELETE')
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-user-times"></i>  Deletar Aluno</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('editar_aluno', $aluno['id'] ?? '')}}" class="btn btn-success"><i class="fa fa-user-plus"></i> Editar Dados Cadastrais</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-user-times"></i>  Não existem alunos cadastrados
        </div>
        @endif
    @endif
     <!-- Professores -->
    @if($selecao == 'docentes')
        @if($professores != null)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($professores as $professor)
                        <tr>
                            <td>{{$professor['nome']}}</td>
                            <td>{{$professor['email']}}</td>
                            <td>
                                <form action="{{route('deletar_docentes', $professor['id'])}}" method="POST">
                                    @method('DELETE')
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-user-times"></i>  Deletar Professor</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('editar_docentes', $professor['id'] ?? '')}}" class="btn btn-success"><i class="fa fa-user-plus"></i> Editar Dados Cadastrais</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-user-times"></i>  Não existem professores cadastrados
        </div>
        @endif
    @endif
    @endcan
@stop