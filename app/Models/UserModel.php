<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;



class UserModel extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'permission',
        'remember_token',
        'address',
        'phone',
        'image'
    ];

    protected $table = 'users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function getToken()
    {
        return hash_hmac('sha256', Str::random(40), config('app.key'));
    }


    public function getAllUsers($request){
        $users = DB::table($this->table)
        ->join('permissions', $this->table.'.permission', '=' ,'permissions.permission_id')
        ->select($this->table.'.*', 'permissions.permission_name')
        ->paginate(5)->appends($request->all());
        return $users;
    }

    public function getUser($id){
        $user = DB::table($this->table)
        ->where('id', '=', $id)
        ->get()->first();
        if($user){
            return $user;
        }
        else{
            return false;
        }
    }

    public function getPermissionUser($id){
        $permission = DB::table($this->table)
        ->where($this->table.'.id', '=', $id)
        ->join('permission_items', $this->table.'.permission', '=', 'permission_items.permission_id')
        ->join('permission_lists', 'permission_items.permission_list_id', '=', 'permission_lists.id')
        ->select('permission_lists.permission_url')
        ->get();

        return $permission;
    }

    public function updateUser($dataUpdate, $id){
        $result = DB::table($this->table)
        ->where('id', $id)
        ->update($dataUpdate);

        return $result;
    }

    public function deleteUser($id){
        $result = DB::table($this->table)
        ->where('id', '=' , $id)
        ->delete();

        return $result;
    }

    public function addUser($dataPost){
        $result = DB::table($this->table)
        ->insert($dataPost);

        return $result;
    }

    public function getUserLogin($request){
        $user = DB::table($this->table)
        ->where('email', '=', $request->email)
        ->get()
        ->first();

        return $user;
    }

    public function updatePermission($token){
        $result = DB::table($this->table)
        ->where('remember_token', $token)
        ->update(['permission' => 1]);

        return $result;
    }

    public function rollBackUser($token){
        return DB::table($this->table)
            ->where('remember_token', '=', $token)
            ->delete();
    }
}
