@extends('layouts.app')

@section('title', '| booking')

@section('content')
@section('content')

<div class="col-lg-10 col-lg-offset-1">
  <h3 class="info">recent bookings </h3>
  <div>
        <table id="example" class="table table-bordered table-striped">
            <thead>
                <tr class="wildlifeme">
                     <th>ID</th>
                    <th>User Name</th>
                    <th >Check in</th>
                    <th >Check out</th>
                    <th >phone</th>
                    <th >Age</th>
                    <th >Gender</th>
                     <th >Duration in days</th>
                    <th class="non_printable">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- @if (count($bookings) > 0) -->
                    @foreach ($bookings as $booking)
                    <tr>
                            <td>{{$booking->id}}</td>
                        <td>{{$booking->userBooking->name}}</td>
                            <td >{{ $booking->check_in }}</td>
                            <td>{{ $booking->check_out}}</td>
                            <td>{{$booking->phone }}</td>
                            <td>{{$booking->age}}</td>
                            <td>{{$booking->gender }}</td>
                            <td>{{$booking->Duration }}</td>
                    <td class="non_printable" id="action">
                         <button type="button" class="btn btn-primary pull-right non_printable " data-toggle="modal" data-target="#exampleModal{{$booking->id}}">
                    Edit
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$booking->userBooking->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           {{ Form::model($booking, array('route' => array('bookings.update', $booking->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

                            <div class="form-group">
                                {{ Form::label('check_in', 'Checkin dates') }}
                                {{ Form::date('check_in', null, array('class' => 'form-control')) }}
                            </div>
                             <div class="form-group">
                                {{ Form::label('check_out', 'check_out') }}
                                {{ Form::date('check_out', null, array('class' => 'form-control')) }}
                            </div>
                             <div class="form-group">
                                {{ Form::label('phone', 'Phone') }}
                                {{ Form::text('phone', null, array('class' => 'form-control')) }}
                            </div>
                             <div class="form-group">
                                {{ Form::label('age', 'Age') }}
                                {{ Form::text('age', null, array('class' => 'form-control')) }}
                            </div>
                             <div class="form-group">
                                {{ Form::label('gender', 'Gender') }}
                                {{ Form::text('gender', null, array('class' => 'form-control')) }}
                            </div>
                            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    
                     {!! Form::open(['method' => 'DELETE', 'route' => ['bookings.destroy', $booking->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td> 
                        </tr>
                    @endforeach
                @else
                <!-- @endif -->
            </tbody>

        </table>

    </div>

</div>
    <div class="pull-right non_printabl"> <button onclick="printme()" class="btn btn-primary ">Print</button></div>

@endsection