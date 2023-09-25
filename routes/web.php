<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\AmenitiesController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});  
// applique le middelware role pour que l utilisateur ne peux pas entre dans url de admin ou de agent 
Route::prefix("admin")->name("admin.")->group(function() { 
    // les route avec middleware de auth et role admin
    Route::middleware(["auth","roles:admin"])->group(function() {
        Route::get("/dashboard",[AdminController::class,"adminDashboard"])
        ->name("dashboard");  
        Route::post("/logout" , [AdminController::class ,"adminLogout"]) 
        ->name("logout"); 
        Route::get("/profile",[AdminController::class,"adminProfile"]) 
        ->name("profile");  
        Route::post("/profile/store",[AdminController::class,"adminProfileStore"])
        ->name("profile.store"); 
        Route::get("change/password",[AdminController::class,"adminChangePassword"]) 
        ->name("change.password"); 
        Route::post("update/password",[AdminController::class,"adminUpdatePassword"]) 
        ->name("update.password");  
    }); // end route avec admin et auth 
    Route::get("/login",[AdminController::class,"adminLogin"])
    ->name("login"); 
     
  
});
Route::middleware(["auth","roles:agent"])->group(function() {
    Route::get("/agent/dashboard",[AgentController::class,"agentDashbord"])
    ->name("agent.dashboard");
});

// all type controller 
Route::middleware(["auth","roles:admin"])->group(function() {
     Route::controller(PropertyTypeController::class)->group(function() {
          Route::get("all/type","allType") ->name("all.type"); 
          Route::get("create/type","createType") ->name("create.type"); 
          Route::post("store/type","storeType") ->name("store.type"); 
          Route::get("edit/type/{id}","editType") ->name("edit.type"); 
          Route::post("/update/type","updateType") ->name("update.type"); 
          Route::delete("/destroy/type/{id}","destroyType") ->name("destroy.type");
    });    
    // start cont r 
    Route::resource("aminities",AmenitiesController::class);  
    // end controller resoucre
    Route::post("/aminiteCheck",[AmenitiesController::class,"checkAmenitieUnique"]) 
    ->name("aminites.checkUnique"); 
    // ------------------------------------------------
    Route::resource("permissions",PermissionController::class);  
    // ---------------------------------------------------
    Route::get("import/permissions",[PermissionController::class,"ImportPermissions"]) 
    ->name("permissions.import"); 
    Route::get("export",[PermissionController::class,"export"]) 
    ->name("export");  
    Route::get("permissions/import",[PermissionController::class,"import"]) 
    ->name("permission.import");  
    //---------------------- controller de ressource de roleController 
    Route::resource("roles" , RoleController::class) ;  
    Route::get("add/roles/permissions",[RoleController::class,"CreateRolePermission"]) 
    ->name("create.roles.permission");
    Route::post("role/permission/store",[RoleController::class,"StoreRolePermission"]) 
    ->name("role.permission.store"); 
    Route::get("all/roles/permission",[RoleController::class,"AllRolesPermission"]) 
    ->name("all.role.permission"); 
    Route::get("edit/role/permission/{id}",[RoleController::class,"EditRolePermission"]) 
    ->name("edit.role.permissions") ;
    Route::post("update/role/permission/{id}",[RoleController::class,"UpdateRolePermission"]) 
    ->name("role.permission.update") ;  
    Route::post("delete/role/permission/{id}",[RoleController::class,"DeleteRolePermission"]) 
    ->name("delete.role.permission") ;  
    //-------------------crud admin ----------------------------------- 
     
        Route::get("all/admin",[AdminController::class,"indexAdmin"])->name("admin.index"); 
        Route::get("create/admin",[AdminController::class,"CreateAdmin"])->name("admin.create"); 
        Route::post("store/admin",[AdminController::class,"StoreAdmin"])->name("admin.store");
        Route::get("edit/admin/{id}",[AdminController::class,"EditAdmin"])->name("admin.edit");  
        Route::patch("udpate/admin/{id}",[AdminController::class,"UpdateAdmin"])->name("admin.update");  
        Route::delete("delete/admin/{id}",[AdminController::class,"DeleteAdmin"])->name("admin.delete"); 
        
        


}); // end route avec admin et auth 
 
 

 

require __DIR__.'/auth.php';
