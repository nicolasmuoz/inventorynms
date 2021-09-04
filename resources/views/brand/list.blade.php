@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
        <a href="{{ route('brand.form')}}" class="btn btn-primary">New Brand</a>
    </div>
</div>
@if(Session:: has('message'))
<p class="alert alert-success">
    {{ Session::get('message') }}
</p> 
@endif

@if(Session::has('deleteNotification'))
    <p class="alert alert-warning">
        {{Session::get('deleteNotification')}}
    </p>
@endif
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->id}}</td>
                <td>{{ $brand->name}}</td>
                <td>
                <a href=" {{ route('brand.form',['id' =>$brand->id])}}" class="btn btn-warning">Editar</a>
                <a href="{{ route('brand.delete',['id'=>$brand->id])}}" class="btn btn-danger">Borrar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection