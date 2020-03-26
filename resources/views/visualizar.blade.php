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
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    @endcan
@stop