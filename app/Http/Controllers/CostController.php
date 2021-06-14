<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cost;


class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $costs = Cost::all();

     return view('cost.index')->with('costs', $costs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                        return view('cost.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
             'foreigner'           => 'required|numeric',
            'local'           => 'required|numeric',
            'children'           => 'required|numeric'
        ]);
        $cost  = new Cost();
        $cost ->foreigner =$request->input('foreigner');
        $cost ->local =$request->input('local');
        $cost ->children =$request->input('children');
        $cost->save();

         return redirect()->route('costs.index')->with('flash_message','charges created successfully');
    
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
        $cost = Cost::findOrFail($id);

             return view('cost.edit')->with('cost', $cost);

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
          $this->validate($request, [
            'foreigner'           => 'required|numeric',
            'local'           => 'required|numeric',
            'children'           => 'required|numeric'
        ]);
        $cost = Cost::findOrFail($id);
        $cost ->foreigner =$request->input('foreigner');
        $cost ->local =$request->input('local');
        $cost ->children =$request->input('children');
        $cost->save();

         return redirect()->route('costs.index')->with('flash_message','charges updated  successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cost = Cost::findOrFail($id);

        $cost->delete();

        return redirect()->route('costs.index')
            ->with('flash_message',
             'charges successfully deleted.');
    }
}
