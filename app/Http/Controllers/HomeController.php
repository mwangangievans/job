<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Animal;
use App\Category;
use App\Booking;
use App\User;

class HomeController extends Controller
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

            return view('Admin')->with('users','bookings','categories','animals',$users, $bookings,$categories,$animals);

        } elseif ($user->hasRole('Staff')) {

            $bookings = Booking::all();
            $categories = Category::all();
            $animals = Animal::all();

         return view('Staff')->with('bookings','categories','animals' ,$bookings,$categories,$animals);

        } else {

           $user = Auth::user();
      
    return view('user')->with('user',$user);
        }
    }
}
