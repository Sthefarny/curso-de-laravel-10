<h1>LISTAGEM DE SUPORTES</h1>
<a href="{{route('supports.create')}}">Criar Dúvida</a>
<table>
    <thead>
        <th>assunto</th>
        <th>status</th>
        <th>descrição</th>
        <th>ações</th>
    </thead>
    <tbody>
    @foreach($support as $supports)
    
    <tr>
        <td>{{$support-> subjects}}</td>
        <td>{{$support-> status}}</td>
        <td>{{$support-> body}}</td>
        <td>
            >
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@extends('admin.layouts.app')

@section('title', 'Fórum')

@section('header')
@include('admin.supports.partials.header', compact('supports'))
@endsection

@section('content')
@include('admin.supports.partials.content')

<x-pagination
    :paginator="$supports"
    :appends="$filters" />

@endsection
