<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'product';
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
