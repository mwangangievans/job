@extends('layouts.app')

@section('title', '| booking')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
  <h3 class="info">charges </h3>


<button type="button" class="btn btn-primary non_printable" data-toggle="modal" data-target="#cost">
  <h4 class="non_printable">Book for a group</h4>
</button>


<div class="modal fade non_printable" id="cost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="ticket">
    <form method="POST" action="{{ route('groups.store') }}" class="formless" >   
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div>
                     <div class="form-group">
                            <label  for="check_in">
                               Check in days
                            </label>
                            <input  type="date" name="check_in"  class="form-control" placeholder="enter check in dates">
                    </div>
                     <div class="form-group">
                            <label  for="check_out">
                               check out dates
                            </label>
                            <input  type="date" name="check_out"  class="form-control" placeholder="enter check out days">
                    </div>
                     <div class="form-group">
                            <label  for="phone">
                               phone no 
                            </label>
                            <input  type="text" name="phone"  class="form-control" placeholder="enter phone">
                    </div>
                     <div class="form-group">
                            <label  for="members">
                               NO. of participants
                            </label>
                            <input  type="text" name="members"  class="form-control" placeholder="enter number of members">
                    </div>
              </div>
            <button class="btn btn-primary non_printable">Save</button>
    </form>
            </div>
      </div>
    </div>
  </div>
</div>

        <table id="example" class="table table-bordered table-striped ">
            <thead>
                <tr class="wildlifeme">
                    <th>check-in</th>
                    <th >check-out</th>
                    <th >Contact Number</th>
                   <th >no of participants</th>
                    <th >Duration in days</th>
                    <th >charges in kenya sh</th>
                   <th class="non_printable">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($groups) > 0)
                    @foreach ( $groups as $group)
                        <tr><td>{{$group ->check_in }}</td>
                            <td >{{$group ->check_out }}</td>
                            <td>{{$group ->phone}}</td>
                            <td>{{$group ->members}}</td>
                            <td>{{$group ->Duration}}</td>
                            <td>{{$group ->pay}}</td>
                    <td class="non_printable">
                         <button type="button" class="btn btn-primary pull-right non_printable" data-toggle="modal" data-target="#exampleModal{{$group->id}}">
                    Edit
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                           
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           {{ Form::model($group, array('route' => array('groups.update', $group->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

                            <div class="form-group">
                                {{ Form::label('check_in', 'check in dates') }}
                                {{ Form::text('check_in', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('check_out', 'check out  dates') }}
                                {{ Form::text('check_out', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('phone', 'phone no') }}
                                {{ Form::text('phone', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('members', 'no of participants') }}
                                {{ Form::text('members', null, array('class' => 'form-control')) }}
                            </div>
                            
                            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
               {!! Form::open(['method' => 'DELETE', 'route' => ['groups.destroy', $group->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger pull-right']) !!}
                    {!! Form::close() !!}</td> 
                        </tr>
                    @endforeach
                @else
                <!-- @endif -->
            </tbody>

        </table>
    </div>
     
</div>
       <div class="pull-right"> <button onclick="printme()" class="btn btn-primary">Print</button></div>
@endsection