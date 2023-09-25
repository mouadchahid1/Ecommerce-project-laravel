<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles  ;

    /**
     * The attributes that are mass assignable.
     *HasRoles
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ]; 
    protected $guarded = [] ; 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ]; 
    public static function getGroupPermission() {
        $group_permission = DB::table("permissions")->select("group_name")->groupBy("group_name")->get() ;
        return $group_permission ;
    } 
    public static function getPermissionByGroupName($group_name) {
        $permission = DB::table("permissions")->select("id","name")->where("group_name",$group_name)->get(); 
        return $permission ;
    }
}
