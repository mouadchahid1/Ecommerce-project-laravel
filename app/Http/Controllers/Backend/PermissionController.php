<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
use Maatwebsite\Excel\Facades\Excel; 
use Carbon\Carbon; 
use App\Imports\PermissionsExport ;
use App\Imports\PermissionsImport;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $permissions = Permission::all() ; 
        return view("admin.backend.page.permission.index_permission",compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
        return view("admin.backend.page.permission.create_permission");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $request->validate([
            "name" =>"required|max:200" , 
            "group_name"=>"required"
        ]) ; 
        Permission::insert([
            "name"=>$request->name,  
            "group_name"=>$request->group_name,      
            'guard_name' => 'web' , 
            "created_at"=>Carbon::now() 
         
        ]) ;
        $notification = array(
            "message" => "Permission added successfully" , 
            "alert-type" =>"success",
        ); 
        return redirect()->route("permissions.index")->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //  
        $permission = Permission::findOrFail($id) ;   
        return view("admin.backend.page.permission.update_permission",compact("permission")) ;
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "name" =>"required|max:200" , 
            "group_name"=>"required"
        ]) ; 
        Permission::findorFail($id)->update([
            "name"=>$request->name,  
            "group_name"=>$request->group_name,      
            'guard_name' => 'web' ,
            "updated_at"=>Carbon::now() 
         
        ]) ;
        $notification = array(
            "message" => "Permission updated successfully" , 
            "alert-type" =>"success",
        ); 
        return redirect()->route("permissions.index")->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Permission::findOrFail($id)->delete();
        $notification = array(
            "message" => "Permission deleted successfully" , 
            "alert-type" =>"success",
        );   
        return back()->with($notification);

    } 
    public function ImportPermissions() {
        return view("admin.backend.page.permission.import_permission");
    } 
    public function export() {

        return Excel::download(new PermissionExport , 'permissions.xlsx')   ;        
    } 
    public function import() {
        Excel::import(new PermissionsImport, 'users.xlsx');
        $notification = array(
            "message" => "Permission deleted successfully" , 
            "alert-type" =>"success",
        );   
        return redirect()->back()->with($notification);
    }
}
