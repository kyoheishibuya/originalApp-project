<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /**ここで指定された属性は、create メソッドなどで一括してデータベースに保存できます。*/

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**ここで指定された属性は、モデルのインスタンスを JSON 形式に変換する際に、非表示にする属性を指定します。*/

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**➀②パスワードをハッシュ化してデータベースに*/
    public function posts() {
        return $this->hasMany(Post::class);
    }
    /**
    User モデルと Post モデルとの関連を定義。
     *1対多の関係であり、ユーザーは複数の投稿を持つことができます。
     * この関連を通じて、ユーザーに関連付けられた投稿を取得できます。
     */
}
