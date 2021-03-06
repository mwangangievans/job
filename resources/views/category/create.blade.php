@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h1>Create New Category</h1>
        <hr>
        {{-- @include ('errors.list') --}}

        {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'categories.store')) }} 

        <div class="form-group">
            {{ Form::label('name', 'Category Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            <br>

            {{-- {{ Form::label('body', 'Post Body') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
            <br> --}}

            {{ Form::submit('Create Category', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
@endsection