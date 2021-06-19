@extends('layouts.app')

@section('title', '| Edit User')

@section('content')
<div  class='col-lg-4 col-lg-offset-4'>
<div class="ticket">
    <div class ="formless">
{{ Form::model($booking, array('route' => array('bookings.update', $booking->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('check_in', 'Check in date') }}
        {{ Form::text('check_in', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('check_out', 'Check out date') }}
        {{ Form::text('check_out', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('age', 'Age') }}
        {{ Form::text('age', null, array('class' => 'form-control')) }}
    </div>
      <div class="form-group">
        {{ Form::label('phone', 'phone number') }}
        {{ Form::text('phone', null, array('class' => 'form-control')) }}
    </div>
      <div class="form-group">
        {{ Form::label('nationality', 'Nationality') }}
        {{ Form::text('nationality', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
</div>
</div>
</div>

@endsection