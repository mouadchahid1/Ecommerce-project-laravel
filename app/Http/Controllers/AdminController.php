<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{ 
    // 
    public function adminDashboard() {
        return view("admin.index");
    } 

    // la methode de logout admin 
    public function adminLogout(Request $request) 
    { 
        Auth::guard("web")->logout() ;  

        $request->session()->invalidate() ;  

        $request->session()->regenerateToken() ;  

        return  redirect("admin/login"); 
        
    } 

    // fonction de login 
    public function adminLogin() { 
        return view("admin.admin_login");
    }  

    // fonction de update profile 
    

        
    // fonction redirect vers profile with info user connecte 

    // -----------------Crud admin -------------------- 
    public function indexAdmin() { 
        $dataAdmins = User::where("role","admin")->get() ; 
       return view("admin.backend.page.admin.index_admin",compact("dataAdmins"));

    } 
    public function CreateAdmin() { 
        $roles = Role::all() ; 
        return view("admin.backend.page.admin.create_admin",compact("roles"));
    } 
    public function StoreAdmin(Request $request) { 
        $request->validate([ 
            "email"=>"email|required" , 
            "password" => ["string"]
        ]);
        $user = new User() ; 
        $user->name = $request->name ;  
        $user->username = $request->username ; 
        $user->email = $request->email ; 
        $user->password = Hash::make($request->password) ; 
        $user->role = 'admin' ; 
        $user->phone = $request->phone ; 
        $user->status =  'active' ;  
        $user->save() ; 
        if($request->roles) { 
            $user->assignRole($request->roles);
        } 
        $notification = array(
            "message" =>"Admin Role created successfully" ,
            "alert-type" =>"success"
        );
        return redirect()->route("admin.index")->with($notification);
    }  
     public function EditAdmin($id) {  
        $roles = Role::all() ;
        $user = User::findOrFail($id); 
        return view("admin.backend.page.admin.edit_admin",compact("user", "roles"));
     } 
     public function UpdateAdmin(Request $request , $id) { 

        $user = User::findOrFail($id);  
        $user->name = $request->name ;  
        $user->username = $request->username ; 
        $user->email = $request->email ; 
        $user->role = 'admin' ; 
        $user->phone = $request->phone ; 
        $user->status =  'active' ;  
        $user->save() ;  

        $user->roles()->detach() ; 

        if($request->roles) { 
            $user->assignRole($request->roles);
        } 
        $notification = array(
            "message" =>"Admin Role updated successfully" ,
            "alert-type" =>"success"
        );
        return redirect()->route("admin.index")->with($notification);
     } 
     public function DeleteAdmin($id) {
         $user = User::findOrFail($id); 
         if(!is_null($user)) {
            $user->delete();
         } 
         $notification = array(
            "message" =>"Admin Role Deleted successfully" ,
            "alert-type" =>"success"
        );
        return redirect()->route("admin.index")->with($notification);
     }

     //------------------------Fin de la methode CRUD de Admin ------------------------------
    
     public function adminProfile() { 
        $id = Auth::id() ; 
        $userData = User::find($id) ; 
    return view("admin.admin_profile",compact("userData"));
     } 
     public function adminProfileStore(Request $request) {  
        $request->validate([
            "name"=>["required","string","min:2"] , 
            "username"=>["string","min:2"] , 
            "address"=> ["string","min:4"] , 
            "phone" => ["string"] ,
            "photo"=>["image","mimes:jpeg,png,jpg,gif","max:2048"]  , 
            "email"=>["email","required"]  
        ]);  

            $id = Auth::id() ; 
            $userData = User::find($id); 
            $userData->name = $request->name;  
            $userData->email = $request->email; 
            $userData->username = $request->username; 
            $userData->address = $request->address; 
            $userData->phone = $request->phone;  

        if($request->file("photo")) { 
            $file = $request->file("photo");  
            @unlink(public_path("upload/admin_images/".$userData->photo));
            $fileName = date("YmdHi").$file->getClientOriginalName() ; 
            $file->move(public_path("upload/admin_images"),$fileName);
            $userData["photo"] = $fileName; 

        }  
        $userData->save(); 

        $notification = array(
            "message" =>"Admin profile update successfully" ,
            "alert-type" =>"success"
        );
        return redirect()->back()->with($notification);
       } 
       public function adminChangePassword() {
         $id = Auth::id() ; 
         $userData = User::find($id) ;  
         return view("admin.admin_change_password",compact("userData"));
       } 
       public function adminUpdatePassword(Request $request)  {
        // valide les mots de pass  
        $request->validate([ 
            "old_password" => "required" , 
            "new_password" => ["required",Password::defaults(),"confirmed"]
            
        ]) ;  
         // confirmation de old password 
         if(!Hash::check($request->old_password,Auth::user()->password))  
         {
          $notification = array(
            "message" => "Old password incorrect" ,
            "alert-type" => "error"
          ) ; 
           return  back()->with($notification) ;
         }  
         // le nouveau mot de passe 
         User::whereId(Auth::id())->update([ 
            "password" => Hash::make($request->new_password) 
         ]);  
         $notification = array( 
            "message" => "Password updated successfully"  , 
            "alert-type" => "success" 
         );
         return back()->with($notification);

       } 

    
}
