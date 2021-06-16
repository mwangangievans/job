@extends('layouts.app')

@section('title', '| booking')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
  <h3 class="info">recent bookings </h3>
<div class="pull-right"> <a href="https://www.twilio.com/console/phone-numbers/verified"><button  class="btn btn-primary">Verify your phone number</button></a></div>
  
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary non_printable" data-toggle="modal" data-target="#BookVisit">
  <h4 class="non_printable">Book a visit</h4>
</button>

<!-- Modal -->
<div class="modal fade non_printable" id="BookVisit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book a Visit to our Zoo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="ticket">
    <form method="POST" action="{{ route('bookings.store') }}" class="formless" >   

             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    <div class="form-group">
                            <label  for="Name">
                                Check in date
                            </label>
                            <input  type="date" name="check_in" id="datepicker-sc" class="form-control" placeholder="enter check in dates">
                    </div>
                     <div class="form-group">
                            <label  for="Name">
                         Check out date                            </label>
                            <input  type="date" name="check_out" id="datepicker-sc" class="form-control" placeholder="enter chech out dates">
                    </div>
                     <div class="form-group">
                            <label  for="Name">
                                Phone 
                            </label>
                            <input  type="text" name="phone" id="phone" class="form-control" placeholder="enter phone">
                    </div>
                     <div class="form-group">
                            <label  for="Name">
                                Age 
                            </label>
                            <input  type="text" name="age" id="age" class="form-control" placeholder="enter age">
                    </div>
                <div class="form-group">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Gender
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="flex flex-row items-center">
                            <label class="block text-gray-500 font-bold">
                                <input name="gender" class="mr-2 leading-tight" type="radio" value="male">
                                <span class="text-sm">Male</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-bold">
                                <input name="gender" class="mr-2 leading-tight" type="radio" value="female">
                                <span class="text-sm">Female</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-bold">
                                <input name="gender" class="mr-2 leading-tight" type="radio" value="other">
                                <span class="text-sm">Other</span>
                            </label>
                        </div>
                    
                    </div>
                </div>
                <div class="form-group">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Nationality
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="flex flex-row items-center">
                            <label class="block text-gray-500 font-bold">
                                <input name="nationality" class="mr-2 leading-tight" type="radio" value="foreigner">
                                <span class="text-sm">Foreigner</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-bold">
                                <input name="nationality" class="mr-2 leading-tight" type="radio" value="local">
                                <span class="text-sm">Local</span>
                            </label>
                           
                        </div>
                    
                    </div>
                </div>
            <button class="btn btn-primary non_printable">Save</button>
                    </div>
    </form>
            </div>
      </div>
    </div>
  </div>
</div>

        <table id="example" class="table table-bordered table-striped ">
            <thead>
                <tr class="wildlifeme">
                    <th>User Name</th>
                    <th >Check in</th>
                    <th >Check out</th>
                    <th >phone</th>
                    <th >Age</th>
                    <th >Gender</th>
                    <th >Nationality</th>
                     <th >Duration in days</th>
                     <th >Charges in ksh</th>
                   <th class="non_printable">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($user->booking) > 0)
                    @foreach ($user->booking as $booking)
                        <tr>
                        <td>{{$booking->userBooking->name}}</td>
                            <td >{{ $booking->check_in }}</td>
                            <td>{{ $booking->check_out}}</td>
                            <td>{{$booking->phone }}</td>
                            <td>{{$booking->age}}</td>
                            <td>{{$booking->gender }}</td>
                            <td>{{$booking->nationality }}</td>
                            <td>{{$booking->Duration }}</td>
                             <td>{{$booking->pay }}</td>

                    <td class="non_printable" id="action">
                        
                    <a href="{{ route('bookings.edit',$booking->id) }}"> <button type="button" class="btn btn-primary pull-right non_printable">Edit</button></a>
                 
                   
               {!! Form::open(['method' => 'DELETE', 'route' => ['bookings.destroy', $booking->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}</td> 
                        </tr>
                    @endforeach
                @else
                @endif
            </tbody>

        </table>
    </div>
     
</div>
       <div class="pull-right"> <button onclick="printme()" class="btn btn-primary">Print</button></div>

<script>
    function printme(){
        window.print();
    }
</script>
@endsection