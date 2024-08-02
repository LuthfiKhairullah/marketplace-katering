<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrders extends Model
{
    use HasFactory;
    protected $primaryKey = 'detail_order_id';
    protected $table = 'detail_orders';
    protected $fillable = ['order_id', 'detail_order_name', 'detail_order_qty', 'detail_order_price', 'detail_order_total_price'];
}
