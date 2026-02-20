<?php

namespace App\Http\Controllers;

use App\Models\Right;
use Illuminate\Http\Request;

class RightController extends Controller
{
    public function create (){
        return view('create');
    }
    public function newfile (Request $request){
        $imageName = null;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images', $imageName, 'public');
        }
        
        $right = new Right();
        $right->name = $request->name;
        $right->description = $request->description;
        $right->photo = $imageName;
        $right->save();
        
        return redirect()->route('test')->with('success', 'Data has been saved successfully.');
    }
    
    public function test (){
        $rights = Right::paginate(3);
        return view('test', ['rights' => $rights]);
    }
    public function editfile($id){
        $right = Right::find($id);
        return view('edit', ['right' => $right]);
    }

    public function updatefile(Request $request, $id){
        $right = Right::find($id);
        $imageName = null;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images', $imageName, 'public');
        } else {
            $imageName = $right->photo;
        }

        $right->name = $request->name;
        $right->description = $request->description;
        $right->photo = $imageName;
        $right->save();

        return redirect()->route('test')->with('success', 'Data has been updated successfully.');
    }
       
    public function deletefile($id){
        $right = Right::find($id);
        $right->delete();
        return redirect()->route('test')->with('success', 'Data has been deleted successfully.');
    }

       
       
       
       
       
       
 }



