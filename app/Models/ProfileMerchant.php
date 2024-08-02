<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMerchant extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';
    protected $table = 'profile_merchant';
    protected $fillable = ['user_id', 'merchant_name', 'merchant_address', 'merchant_contact', 'merchant_description'];
}
