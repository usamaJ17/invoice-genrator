<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $table = 'suppliers';
    public $primaryKey = 'id';
    public $fillable = [
     'name',
     'trn',
     'city',
     'contact_person',
     'contact_person',
     'phone',
     'email',
     'address',
     'emirates_id',
     'old_balance'
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

