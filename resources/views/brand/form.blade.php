@extends('layout')
@section('title',$brand-> id ? 'Update Brand':'New Brand')
@section('header',$brand-> id ? 'Update Brand': 'New Brand')
@section('content')

<form action="{{ route('brand.save')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $brand -> id}}">
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" value="{{ @old('name') ? @old('name') : $brand->name}}">
        </div>
        @error('name')
            <p class="text-danger">
                {{$message}}
            </p>
        @enderror
    </div>
    <div class="row mb-3">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <a href="/brand" class="btn brn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div>
</form>
@endsection