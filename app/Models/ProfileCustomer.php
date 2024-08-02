<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileCustomer extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';
    protected $table = 'profile_customer';
    protected $fillable = ['user_id', 'customer_name'];
}
