<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'fiscal_code',
        'phone_number',
        'password_changed_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'role',
        'password',
        'remember_token',
        'password_changed_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password_changed_at' => 'datetime',
        'birth_date' => 'date',
    ];

    public function scopeAdmins($query){
        return $query->where('role', '=', 'A');
    }

    public function scopePediatricians($query){
        return $query->where('role', '=', 'P');
    }

    public function scopeUsers($query){
        return $query->where('role', '=', 'U');
    }
    
    public function scopeCurrentUser($query){
        return $query->where('id', '=', auth()->user()->id);
    }

    public function ownPediatrician(){
        return $this->belongsTo('\App\Models\User', 'user_id');
    }


    public function ownUsers(){
        return User::where('user_id', '=', $this->id);
    }

    public function surveys(){
        return $this->hasMany('\App\Models\Survey');
    }

    public function age(){
        return Carbon::now()->diffInYears(Carbon::parse($this->birth_date));
    }
}
