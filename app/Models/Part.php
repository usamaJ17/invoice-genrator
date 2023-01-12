<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    public $table = 'part';
    public $primaryKey = 'part_id';
    public $fillable = [
     'purchase_no',
     'name',
     'unit',
     'qty',
     'price',
     'total'
     ];
     /**
      * Validation rules
      *
      * @var array
      */
     public static $rules = [
     ];
     /**
      * The attributes that should be mutated to dates.
      *
      * @var array
      */
     protected $dates = [
         'created_at',
         'updated_at',
     ];
}
