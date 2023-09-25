<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Amenities;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    public function __construct() { 
        $this->middleware('permission:edit_aminite')->only("edit");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  
        $aminities = Amenities::latest()->get() ; 
        return view("admin.backend.aminities.index_aminites",compact("aminities"));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
        return view("admin.backend.aminities.create_aminites");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $request->validate([ 
            "amenitie_name"=>"required|string|max:200|unique:amenities" ,   
        ]) ; 
        Amenities::insert([
            "amenitie_name"=>$request->amenitie_name, 
             
        ]) ;
        $notification = array(
            "message" => "Aminitie added successfully" , 
            "alert-type" =>"success",
        ); 
        return redirect()->route("aminities.index")->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Amenities $amenities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        //  
        $amenities = Amenities::findOrFail($id);
         return view("admin.backend.aminities.edit_aminites",compact("amenities"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 
        $request->validate([ 
            "amenitie_name"=>"required|string|max:200|unique:amenities" ,   
        ]) ;
        
        Amenities::findOrFail($id)->update([
            "amenitie_name"=>$request->amenitie_name, 
        ]);


        $notification = array(
            "message" => "Aminities edited successfully" , 
            "alert-type" =>"success",
        ); 
        return redirect()->route("aminities.index")->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //  
        Amenities::findOrFail($id)->delete(); 
         return redirect()->back();
    }
    public function checkAmenitieUnique(Request $request)
    {
        $amenitieName = $request->input('amenitie_name');
        $exists = Amenities::where('amenitie_name', $amenitieName)->exists();
    
        return response()->json(['valid' => !$exists]);
    }
}
