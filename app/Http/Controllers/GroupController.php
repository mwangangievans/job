<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Cost;
use Twilio\Rest\Client;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('group.index')->with('groups', $groups);

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
        $date3=date_create($request->input('check_in'));
        $date2=date_create($request->input('check_out'));
        $diff=date_diff($date3,$date2);     
        $days = substr($diff->format("%R%a "),1);

        $costs = Cost::all();
        $groups  = new Group();
        $date3=date_create($request->input('check_in'));
        $date2=date_create($request->input('check_out'));
        $diff=date_diff($date3,$date2);
        $day = substr($diff->format("%R%a "),1);
        $groups ->phone =$request->input('phone');
        $groups ->check_in=$request->input('check_in');
        $groups ->check_out=$request->input('check_out');
        $groups ->members=$request->input('members');
        $groups-> Duration = $day;
        foreach ( $costs as $cost){
        $sum = ((int)$day * (int)(($cost ->children)/2 )*($request->input('members')));
        }
        $groups->pay=$sum;        
        $groups->save();
         $this->sendMessage( 'Welcome to Big life Zoo Foundation your booking   was  successful!! we are glad to have you as our visitors..your visit for the'.' '.$request->input('members').' '.'visitors will last for '.' '.$days.' '.'days at a cost of '.' '.$sum.' '.'ksh' .' '.'you can pay via mpesa this is our the till number 345786',$request->phone);
         return redirect()->route('groups.index')->with('flash_message','ticket created successfully'.' '.'A text message for booking approval has been sent to your phone number'.' '.$request->input('phone'));
    }
    public function show($id)
    {
        $groups = Group::findOrFail($id);
        return view('group.index', compact('groups'));
    }
    public function edit($id)
    {
        $groups = Group::findOrFail($id);
        return view('group.index', compact('groups'));
    }
    public function update(Request $request, $id)
    {
        $costs = Cost::all();
        $groups = Group::where('id', $id)->first(); 
        $this->validate($request, [
        'check_in'        => 'required|date',
        'check_out'       => 'required|date',
        'phone'           => 'required|string|max:255',
        'members'          => 'required|string|max:255'
        ]);

        $groups->phone = $request->input('phone');
        $groups->members = $request->input('members');
        $groups->check_in = $request->input('check_in');
        $groups->check_out = $request->input('check_out');
        $date3=date_create($request->input('check_in'));
        $date2=date_create($request->input('check_out'));
        $diff=date_diff($date3,$date2);
        $day = substr($diff->format("%R%a "),1);
        $groups->Duration =  $day;
         foreach ( $costs as $cost){
        $sum = ((int)$day * (int)(($cost ->children)/2 )*($request->input('members')));
        }
        $groups->pay=$sum; 
        $groups->save();
         $this->sendMessage( 'your booking information  of ticket number '.' '.$id.' '.'has been edited..your visit for the'.' '.$request->input('members').' '.'visitors will last for '.' '.$day.' '.'days at a cost of '.' '.$sum.' '.'ksh' .' '.'you can pay via mpesa this is our the till number 345786',$request->phone);
        return redirect()->route('groups.index')->with('flash_message','booking successfully updated.'.' '.'A text message for edited ticket has been sent to your phone number'.' '.$request->input('phone'));
    }
// $this->dateDiff($request->input('check_in'),$request->input('check_out'));
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groups = Group::findOrFail($id);
        $groups->delete();

        return redirect()->route('groups.index')->with('flash_message','ticket successfully deleted.');
    }
    public function sendCustomMessage(Request $request)
    {
        $validatedData = $request->validate([
            'users' => 'required|array',
            'body' => 'required',
        ]);
        $recipients = $validatedData["users"];
        // iterate over the array of recipients and send a twilio request for each
        foreach ($recipients as $recipient) {
            $this->sendMessage($validatedData["body"], $recipient);
        }
        return back()->with(['success' => "A text message for booking approval has been sent to your phone "]);
    }
    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients Number of recipient
     */
    private function sendMessage($message, $recipients)
    {
        $groups = Group::all();
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
    }
    
}
