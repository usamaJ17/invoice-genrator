<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{   
   public $table = 'invoice';
   public $primaryKey = 'invoice_no';
   public $fillable = [
    'customer',
    'authorized',
    'phone',
    'trn',
    'type',
    'payment',
    'lpo',
    'reference',
    'address',
    'remarks',
    'total',
    'discount',
    'gross',
    'vat',
    'vat_amount'
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        // 'last_name' => 'required',
        // 'joining_date' => 'required',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
     /**
     * Get the products that associated with invoice.
     */
    public function product()
    {
        return $this->hasMany(Product::class,'invoice_no','invoice_no');
    }
    /**
     * Get the services that associated with invoice.
     */
    public function service()
    {
        return $this->hasMany(Service::class,'invoice_no','invoice_no');
    }
}
