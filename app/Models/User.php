<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Hash;

use App\Consts\UserConsts;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'login_id',
    ];

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
    ];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    /**
     * ユーザー情報をDBに格納する
     * 
     * @param array $data
     * @return void
     */
    public function insertUser(array $data)
    {
        $this->name = $data['name'];
        $this->login_id = $data['login_id'];
        $this->password = Hash::make($data['password']);
        $this->save();
    }


    /**
     * ユーザー名を更新する
     *
     * @param array $data
     * @return void
     */
    public function updateUser(array $data)
    {
        $user = $this->find(Auth::user()->id);
        $user->name = $data['name'];
        $user->save();
    }


    /**
     * ログイン情報を更新する
     *
     * @param array $data
     * @return void
     */
    public function updateLogin(array $data)
    {
        $user = $this->find(Auth::user()->id);
        $user->login_id = $data['login_id'];
        // パスワードが変更された場合
        if (strlen($data['password']) > 0) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();
    }

}
