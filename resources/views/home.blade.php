@extends('adminlte::page')

@section('title', 'Página Principal')

@section('content_header')
    
@stop

@section('content')
    @can('Diretor')
    <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-blue"><i class="fas fa-user-graduate"></i></span>
        <div class="info-box-content">
            <span>Quantidade de Alunos</span>
            <span class="info-box-number">{{App\Http\Controllers\AlunoController::quantidade()}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    @endcan
    @can('Aluno')
        Aluno
    @endcan
    @can('Coordenador')
        Coordenador
    @endcan
    @can('Professor')
        Professor
    @endcan
@stop