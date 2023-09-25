<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $roles = Role::all() ; 
        return view("admin.backend.page.role.index_role",compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
        return view("admin.backend.page.role.create_role");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $request->validate([
            "name" =>"required|max:200" , 
           
        ]) ; 
        Role::insert([
            "name"=>$request->name,     
            'guard_name' => 'web' , 
            "created_at"=>Carbon::now() 
         
        ]) ;
        $notification = array(
            "message" => "Roel added successfully" , 
            "alert-type" =>"success",
        ); 
        return redirect()->route("roles.index")->with($notification);
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
        $role = Role::findOrFail($id) ;   
        return view("admin.backend.page.role.update_role",compact("role")) ;
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "name" =>"required|max:200" , 
             
        ]) ; 
        Role::findorFail($id)->update([
            "name"=>$request->name,     
            'guard_name' => 'web' ,
            "updated_at"=>Carbon::now() 
         
        ]) ;
        $notification = array(
            "message" => "Role updated successfully" , 
            "alert-type" =>"success",
        ); 
        return redirect()->route("roles.index")->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Role::findOrFail($id)->delete();
        $notification = array(
            "message" => "Role deleted successfully" , 
            "alert-type" =>"success",
        );   
        return back()->with($notification);
 
    }  
    public function CreateRolePermission() {
         $roles = Role::select("id","name")->get() ; 
         $permissions = Permission::all() ;  
         $group_names = User::getGroupPermission();
         return view("admin.backend.page.setup.create_role_permission",compact("roles", "permissions" ,"group_names")) ; 
    }
    public function StoreRolePermission(Request $request) {
           $data = array() ; 
           $permissions = $request->permission ;  
           foreach($permissions as $key => $item) {
            $data["role_id"] = $request->role_id ;  
            $data["permission_id"] = $item ; 
            DB::table("role_has_permissions")->insert($data) ;
           } 
        $notification = array(
        "message" => "Permission added  successfully" , 
        "alert-type" =>"success",
        );   
        return  redirect()->route("all.role.permission")->with($notification);
    }
     
    public function AllRolesPermission() {  

        $roles = Role::all() ;

        return view("admin.backend.page.setup.all_roles_permission",compact("roles"));

    } 
    public function EditRolePermission($id) {  
        $role = Role::findOrFail($id); 
        $permissions = Permission::all() ;  
        $group_names = User::getGroupPermission();
        return view("admin.backend.page.setup.edit_roles_permission",compact("role", "permissions" ,"group_names")) ; 
  
    } 
    public function UpdateRolePermission(Request $request , $id) {
        $role = Role::findOrFail($id) ; 
        $permissions = $request->permission ; 
        if(!empty($permissions)) { 
            $role->syncPermissions($permissions);
        } 
        $notification = array(
        "message" => "role permission updated successfully" , 
        "alert-type" =>"success",
        );   
        return  redirect()->route("all.role.permission")->with($notification);
    } 
    public function DeleteRolePermission($id) {
      $role = Role::findOrFail($id) ; 
      if(!is_null($role)) {
        $role->delete() ;
      }
      $notification = array(
        "message" => "role permission Deleted successfully" , 
        "alert-type" =>"success",
        );   
        return  redirect()->back()->with($notification);
    }
     
}
