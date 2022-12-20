<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = 'customers';
    public $primaryKey = 'id';
    public $fillable = [
     'name',
     'nationality',
     'phone',
     'address',
     'emirates_id',
     'trn',
     'licence_copy',
     'company_name',
     'opening_balance',
     'image',
     'due_date'
     ];
     /**
      * Validation rules
      *
      * @var array
      */
     public static $rules = [
         'name' => 'required',
     ];
}

