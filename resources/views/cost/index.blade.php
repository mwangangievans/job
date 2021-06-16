@extends('layouts.app')

@section('title', '| booking')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
  <h3 class="info">charges </h3>
  @role(['Admin'])
 @if (!Auth::guest())

<button type="button" class="btn btn-primary non_printable" data-toggle="modal" data-target="#cost">
  <h4 class="non_printable">Add charges</h4>
</button>
 @endif
@endrole

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
    <form method="POST" action="{{ route('costs.store') }}" class="formless" >   
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div>
                     <div class="form-group">
                            <label  for="Foreigner">
                               Foreigner
                            </label>
                            <input  type="text" name="foreigner"  class="form-control" placeholder="enter charges for foreigner visitors">
                    </div>
                     <div class="form-group">
                            <label  for="Foreigner">
                               Local
                            </label>
                            <input  type="text" name="local"  class="form-control" placeholder="enter charges for local visitors">
                    </div>
                     <div class="form-group">
                            <label  for="children">
                               Children
                            </label>
                            <input  type="text" name="children"  class="form-control" placeholder="enter charges for Children">
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
                    <th>Foreigner</th>
                    <th >Local</th>
                    <th >Children</th>
                   <th class="non_printable">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($costs) > 0)
                    @foreach ( $costs as $cost)
                        <tr><td>{{$cost ->foreigner }}</td>
                            <td >{{ $cost ->local }}</td>
                            <td>{{$cost ->children}}</td>
                    <td class="non_printable">
                         <button type="button" class="btn btn-primary pull-right non_printable" data-toggle="modal" data-target="#exampleModal{{$cost->id}}">
                    Edit
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$cost->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                           
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           {{ Form::model($cost, array('route' => array('costs.update', $cost->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

                            <div class="form-group">
                                {{ Form::label('foreigner', 'charges for Foreigner ') }}
                                {{ Form::text('foreigner', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('local', 'charges for Local ') }}
                                {{ Form::text('local', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('children', 'charges for children ') }}
                                {{ Form::text('children', null, array('class' => 'form-control')) }}
                            </div>
                            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
               {!! Form::open(['method' => 'DELETE', 'route' => ['costs.destroy', $cost->id] ]) !!}
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