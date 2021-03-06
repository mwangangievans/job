<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Category;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    { 
             $categories = Category::all();
             $animals = Animal::all();




        $name = auth()->user()->name;

         $animals = Animal::orderby('id', 'desc')->paginate(10);
        return view('animal.index', compact('animals','name','categories'));
    }
    public function create()
    {
     $categories = Category::all();
        return view('animal.create', ['categories'=>$categories]);
    }
    public function store(Request $request)
    {
       $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1999',
       ]);
       // hadle file appload
       if ($request->hasFile('image')) {

        $filenameWithExt = $request->file('image')->getClientOriginalName ();
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $request->file('image')->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename. '_'. time().'.'.$extension;
        // Upload Image
        $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
        }
        // Else add a dummy image
        else {
        $fileNameToStore = 'simba.jpeg';
        }
        //create product
        $animal = new Animal();
        $animal ->user_id == auth()->user()->id;
        $animal ->name =$request->input('name');
        $animal ->description =$request->input('description');
        $animal ->category_id =$request->input('category_id');
        $animal ->image =$fileNameToStore;
        $animal->save();
         return redirect()->route('animals.index')->with('flash_message','Animal, '. $animal->name.' created');
    }
    public function edit($id)
    {
         $animal = Animal::findOrFail($id);
        return view('animal.edit', compact('animal'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|max:100',
            // 'category_id'=>'required|max:100',
            'description'=>'required|max:5000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1999',
                    ]);
        $animal = Animal::findOrFail($id);
        $animal->name = $request->input('name');
        $animal->category_id = $request->input('category_id');
        $animal->description = $request->input('description');
        
    //  $employee = Employee::find($id);

     if($request->file != ''){        
          $path = public_path().'/storage/image/';

          //code for remove old file
          if($animal->file != ''  && $animal->file != null){
               $file_old = $path.$animal->file;
               unlink($file_old);
          }

          //upload new file
          $file = $request->file;
          $filename = $file->getClientOriginalName();
          $file->move($path, $filename);

          //for update in table
          $animal->update(['file' => $filename]);
     }
        // $animal->image = $request->input('image');
        $animal->save();
        return redirect()->route('animals.index')->with('flash_message', 'Animal,'. $animal->name.' updated');
    }
    public function destroy($id)
    {
        //
    }
     public function show($id)
    {
        //
    }
}
