@extends('layouts.app')

@section('content')
           <div class="card ">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action=" " method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select name="category_id"  class="form-control">
                                <option value="">General </option>
                                @foreach ($categories as $category)
                                <option value={{$category->id}}>{{$category->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="severity">Severidad</label>
                            <select name="severity" class="form-control">
                                <option value="M">Menor </option>
                                <option value="N">Normal </option>
                                <option value="A">Alta </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea name="descripcion" class="form-control">{{old('descripcion')}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Registrar Incidente </button>
                        </div>
                    </form>
                </div>
            </div>
       
@endsection
