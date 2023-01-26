<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Invoice extends Model
{
   public $table = 'invoice';
   public $primaryKey = 'invoice_no';
   public $fillable = [
    'customer',
    'date',
    'manual',
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
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'date'
    ];
    protected $appends = ['invoice_number'];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer');
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i');
    }

    public function getInvoiceNumberAttribute()
    {
        return 'ER-'.$this->invoice_no;
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
