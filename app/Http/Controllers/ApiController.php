<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Animal;
use App\Category;
use App\Booking;
use App\User;



class ApiController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $user = Auth::user();

        if ($user->hasRole('Admin')) {

            $users = User::all();
            $bookings = Booking::all();
            $categories = Category::all();
            $animals = Animal::all();

            return view('Admin')->with('users','bookings','categories','animals',$users, $bookings,$categories,$animals)->findOrFail($user->id);

        } elseif ($user->hasRole('Staff')) {

            $book = Booking::all();
            $categories = Category::all();
            $animals = Animal::all();

         return view('Staff')->with('bookings','categories','animals' $bookings,$categories,$animals)->findOrFail($user->id);

        } else {

           $user = Auth::user();
      
    return view('user')->with('user',$user);
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
