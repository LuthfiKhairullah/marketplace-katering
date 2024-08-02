<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';
    protected $table = 'orders';
    protected $fillable = ['order_id', 'order_invoice', 'order_delivery_date'];

    public function scopeJoinAllOrderMerchant($query)
    {
        return $query->join('detail_orders', 'detail_orders.order_id', '=', 'orders.order_id')
            ->select('orders.created_at', 'orders.order_invoice', 'orders.order_delivery_date', DB::raw('SUM(detail_orders.detail_order_total_price) as total_price'))
            ->groupBy('order_invoice', 'order_delivery_date', 'created_at')
            ->orderBy('created_at', 'ASC');
    }

    public function scopeJoinAllOrderCustomer($query)
    {
        return $query->join('detail_orders', 'detail_orders.order_id', '=', 'orders.order_id')
            ->select('orders.created_at', 'orders.order_invoice', 'orders.order_delivery_date', DB::raw('SUM(detail_orders.detail_order_total_price) as total_price'))
            ->groupBy('order_invoice', 'order_delivery_date', 'created_at')
            ->orderBy('created_at', 'ASC');
    }
}
