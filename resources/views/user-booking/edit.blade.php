@extends('layouts.app')

@section('title', '| Edit User')

@section('content')
<div  class='col-lg-4 col-lg-offset-4'>
<div class="ticket">
<form action="{{ route('bookings.update',$booking->id) }}" method="PATCH" class="formless" > 
  
    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
    <div>
        <div class="form-group">
            <label  for="Name">Check in date</label>
            <input  type="date" name="check_in"  class="form-control"  value="{{ $booking->check_in }}">
        </div>
        <div class="form-group">
                    <label  for="Name">Check out date</label>
                        <input  type="date" name="check_out" id="datepicker-sc" class="form-control" value="{{ $booking->check_out }}">
        </div>
        <div class="form-group">
                            <label  for="Name">
                                Phone 
                            </label>
                            <input  type="text" name="phone" id="phone" class="form-control" value="{{ $booking->phone }}">
        </div>
        <div class="form-group">
                            <label  for="Name">
                                Age 
                            </label>
                     <input  type="text" name="age"  class="form-control" value="{{ $booking->age }}">
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
                                <input name="gender" class="mr-2 leading-tight" type="radio"  value="male" {{ ($booking->gender == 'male') ? 'checked' : '' }}>
                                <span class="text-sm">Male</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-bold">
                            <input name="gender" class="mr-2 leading-tight" type="radio"  value="female" {{ ($booking->gender == 'female') ? 'checked' : '' }}>
                                <span class="text-sm">Female</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-bold">
                                <input name="gender" class="mr-2 leading-tight" type="radio"  value="other" {{ ($booking->gender == 'other') ? 'checked' : '' }}>
                                <span class="text-sm">Other</span>
                            </label>
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
                                <input name="nationality" class="mr-2 leading-tight" type="radio"  value="foreigner" {{ ($booking->nationality == 'foreigner') ? 'checked' : '' }}>
                                <span class="text-sm">Foreigner</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-bold">
                                <input name="nationality" class="mr-2 leading-tight" type="radio"  value="local" {{ ($booking->nationality == 'local') ? 'checked' : '' }}>
                                <span class="text-sm">Local</span>
                            </label>
                           
                        </div>
                    
                    </div>
            </div>
            <button class="btn btn-success non_printable">Update</button>
    </div>
    </form>
    </div>
    </div>
@endsection