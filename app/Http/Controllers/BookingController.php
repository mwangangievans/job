<?php

namespace App\Http\Controllers;

use DateTime;
use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
     $user = Auth::user();
        if ($user->hasRole('Admin')) {

            $bookings = Booking::all();
            return view('admin')->with('bookings', $bookings);

        } elseif ($user->hasRole('Staff')) {
            $bookings = Booking::all();
            
            return view('Staff')->with('bookings', $bookings);

        } else {

           $user = Auth::user();
      
    return view('user')->with('user',$user);
        }
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                return view('booking.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

         $this->validate($request, [
            // 'user_id'         => 'required|numeric',
            'phone'           => 'required|string|max:255',
            'gender'          => 'required|string|max:255',
            'age'              => 'required|string|max:255',
            'check_in'        => 'required|date',
            'check_out'       => 'required|date',
            'nationality'      => 'required|string|max:255'

        ]);

        $date3=date_create($request->input('check_in'));
        
        // $date1 = new DateTime(date("Y-m-d"));
        $date2=date_create($request->input('check_out'));
        //get the difference between check out and check in
        $diff=date_diff($date3,$date2);
                //get the difference between now  and check in date
        // $diff=date_diff($date1,$date3);

        //return no. of days
        $days = substr($diff->format("%R%a "),1);

        // return $days.=" days";
        // return "Today is " . date("Y-m-d");

        $booking  = new Booking();
        $date3=date_create($request->input('check_in'));
        $date2=date_create($request->input('check_out'));
        $diff=date_diff($date3,$date2);
        $day = substr($diff->format("%R%a "),1);

        $booking->user_id = Auth::User()->id;
        $booking ->phone =$request->input('phone');
        $booking ->gender =$request->input('gender');
        $booking ->age =$request->input('age');
        $booking ->check_in=$request->input('check_in');
        $booking ->check_out=$request->input('check_out');
        $booking ->nationality =$request->input('nationality');
        $booking-> Duration = $day;

                // return $day;

        $booking->save();

         return redirect()->route('bookings.index')->with('flash_message','ticket created successfully');
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
        
           $booking = Booking::findOrFail($id);

        return view('booking.edit', compact('booking'));
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
        $booking = Booking::where('id', $id)->first(); 
        $this->validate($request, [
            // 'user_id'         => 'required|numeric',
            'phone'           => 'required|string|max:255',
            'gender'          => 'required|string|max:255',
            'age'              => 'required|string|max:255',
            'check_in'        => 'required|date',
            'check_out'       => 'required|date',
            'nationality'        =>'required|string|max:255'
        ]);

        // $input = $request->only(['user_id', 'phone', 'gender','age','check_in','check_out']);
        // $booking->fill($input)->save();
        // $booking->user_id = $id;
        $booking->phone = $request->input('phone');
        $booking->gender = $request->input('gender');
        $booking->age = $request->input('age');
        $booking->check_in = $request->input('check_in');
        $booking->check_out = $request->input('check_out');
        $booking->nationality = $request->input('nationality');

        $booking->Duration =  $this->dateDiff($request->input('check_in'),$request->input('check_out'));
        $booking->save();

      
        return redirect()->route('bookings.index')
            ->with('flash_message',
             'booking successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        //  return $id;
          $booking = Booking::findOrFail($id);
        return $booking;
        $booking->delete();

       ;

        return redirect()->route('bookings.index')
            ->with('flash_message',
             'ticket successfully deleted.');
    }

    private function dateDiff($start, $end){
        $date3=date_create($start);
        $date2=date_create($end);
        $diff=date_diff($date3,$date2);
        $days = substr($diff->format("%R%a "),1);
        return $days;
    }


}
