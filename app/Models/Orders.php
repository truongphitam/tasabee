<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends BaseModel
{
    //
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'auto_code',
        'customer_id',
        'staff_id',
        'invoice_number',
        'packing_list',
        'bill_number',
        'invoice_date',
        'debt_term_date',
        'debt_due_date',
        'port_of_loading',
        'etd',
        'port_of_discharge',
        'eta',
        'train_number',
        'number_of_containers',
        'place_of_delivery',
        'insurrance',
        'incoterms',
        'method',
        'type_method',
        'lc_number',
        'status_orders',
        'note',
        'file_contract',
        'sub_total',
        'payment',
        'discount',
        'vat',
        'deposit',
        'confirm_status',
        'confirm_admins_id'
    ];

    public function detail()
    {
        return $this->hasMany(OrdersDetail::class, 'orders_id', 'id');
    }

    public function attached()
    {
        return $this->hasMany(OrdersAttached::class, 'orders_id', 'id');
    }
}
