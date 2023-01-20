<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public $table = 'purchase';
    public $primaryKey = 'purchase_no';
    public $fillable = [
     'date',
     'sup_name',
     'sup_invoice',
     'sup_trn',
     'phone',
     'payment',
     'remarks',
     'bank',
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
    /**
    * Get the parts that associated with invoice.
    */
    public function part()
    {
        return $this->hasMany(Part::class,'purchase_no','part_id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'sup_name');
    }
}
