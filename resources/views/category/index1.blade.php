@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
   <h3> <i class="fa fa-check-square-o" aria-hidden="true"></i>Categories11</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th><h4>ID</h4></th>
                     <th><h4>Category Name</h4></th>
                    <th><h4>Date Added</h4></th>
                     <th><h4>Action</h4></th>


                </tr>
            </thead>
            <tbody>
     
                @foreach($categoty->categories as $category)
                                <tr>
                <td><h4>{{ $category->name }}</h4></td> 
</tr>

                  foreach ($animals as $animal)

                <tr>

                <td><h4>{{ $animal->name }}</h4></td>

               
                </tr>
                  @endforeach
              }      
               <!-- @endforeach -->
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('categories/create') }}" class="btn btn-success">Add Category</a>

</div>

@endsection