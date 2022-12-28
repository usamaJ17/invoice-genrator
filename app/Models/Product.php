<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'product';
    public $primaryKey = 'product_id';
    public $fillable = [
    'invoice_no ',
    'start_date',
    'end_date',
    'name',
    'code',
    'rental',
    'period',
    'unit',
    'price',
    'qty',
    'amount'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'end_date',
        'start_date'
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'name' => 'required',
        // 'last_name' => 'required',
        // 'joining_date' => 'required',
    ];
}
