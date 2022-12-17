<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $table = 'service';
    public $primaryKey = 'service_id ';
    public $fillable = [
    'number',
    'name',
    'model',
    'brand',
    'amount',
    'invoice_no '
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
