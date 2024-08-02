<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'role'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getNameAttribute()
    {
        $role = Auth::user()->role;
        if ($role == 'customer') {
            return $this->profileCustomer()->first();
        } else if ($role == 'merchant') {
            return $this->profileCustomer()->first();
        }
    }

    public function profileCustomer()
    {
        return $this->join('profile_customer', 'profile_customer.user_id', '=', 'users.id')
            ->select('users.email', 'users.role', 'profile_customer.customer_name as name');
    }

    public function profileMerchant()
    {
        return $this->join('profile_merchant', 'profile_merchant.user_id', '=', 'users.id')
            ->select('users.email', 'users.role', 'profile_merchant.merchant_name as name');
    }
}
