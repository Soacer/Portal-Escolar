@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    
@stop

@section('content')
    @can('Diretor')
        <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-red"><i class="fa fa-star"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">93,139</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
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