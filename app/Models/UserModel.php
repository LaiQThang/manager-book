<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserModel extends Authenticatable
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