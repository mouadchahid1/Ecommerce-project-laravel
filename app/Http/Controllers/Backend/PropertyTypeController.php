<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    // 
    // affiche tous les type dans la page admin all type 
    public function allType() { 
        $types = PropertyType::latest()->get() ; 
        return view("admin.backend.type.all_type",compact("types")) ;
    } 
    public function createType() {
        return view("admin.backend.type.create_type");
    } 
    public function storeType(Request $request) {
        $request->validate([ 
            "type_name"=>"required|string|max:200|unique:property_types" , 
            "type_icon"=>"required|string|max:200"
        ]) ; 
        PropertyType::insert([
            "type_name"=>$request->type_name, 
            "type_icon"=>$request->type_icon 
        ]) ;
        $notification = array(
            "message" => "Type added successfully" , 
            "alert-type" =>"success",
        ); 
        return redirect()->route("all.type")->with($notification);
    }
    public function editType($id) { 
        $type = PropertyType::findOrFail($id); 
        return view("admin.backend.type.edit_type",compact("type"));
    } 
    public function updateType(Request $request) { 
        $request->validate([ 
            "type_name"=>"required|string|max:200" , 
            "type_icon"=>"required|string|max:200"
        ]) ;  
        $idtype = $request->id ; 
        PropertyType::findOrFail($idtype)->update([
            "type_name"=>$request->type_name, 
            "type_icon"=>$request->type_icon 
        ]);


        $notification = array(
            "message" => "Type edited successfully" , 
            "alert-type" =>"success",
        ); 
        return redirect()->route("all.type")->with($notification);

    } 
    public function destroyType($id) { 
       PropertyType::findOrFail($id)->delete();    
       $notification = array(
        "message" => "Type Deleted successfully" , 
        "alert-type" =>"success",
    ); 
    return redirect()->back()->with($notification);
       
    }
}
