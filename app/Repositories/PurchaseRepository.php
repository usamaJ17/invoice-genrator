<?php

namespace App\Repositories;

use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Part;
use App\Repositories\BaseRepository;

/**
 * Class PurchaseRepository
 * @package App\Repositories
 * @version July 4, 2020, 8:10 pm PKT
*/

class PurchaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Purchase::class;
    }
        /**
     * add product to invoice
     *
     * @param array $input
     *
     * @return Model
     */
    public function addPart($input,$purchase_no )
    {
        for ($i=1; $i <= $input['total_row'] ; $i++) { 
            if(isset($input['price_'.$i]) || isset($input['name_'.$i]) ||  isset($input['amount_'.$i])){
                $part=new Part();
                $part->purchase_no =$purchase_no ;
                $part->name=(isset($input['name_'.$i])) ? $input['name_'.$i] : null ;
                $part->unit=(isset($input['unit_'.$i])) ? $input['unit_'.$i] : null ;
                $part->price=(isset($input['price_'.$i])) ? $input['price_'.$i] : null ;
                $part->qty=(isset($input['qty_'.$i])) ? $input['qty_'.$i] : null ;
                $part->amount=(isset($input['amount_'.$i])) ? $input['amount_'.$i] : null ;
                $part->save();        
            }
        }
    }
    public function updatePart($input, $id)
    {
        // $query = Product::newQuery();

        $part = Part::find($id);

        $part->name=(isset($input['name_'.$id])) ? $input['name_'.$id] : null ;
        $part->unit=(isset($input['unit_'.$id])) ? $input['unit_'.$id] : null ;
        $part->price=(isset($input['price_'.$id])) ? $input['price_'.$id] : null ;
        $part->qty=(isset($input['qty_'.$id])) ? $input['qty_'.$id] : null ;
        $part->amount=(isset($input['amount_'.$id])) ? $input['amount_'.$id] : null ;
        $part->save();
        
        return $part;
    }
    public function updatedAddPart($input, $purchase_no)
    {
        for ($i=1; $i <= $input['total_row'] ; $i++) { 
            if(isset($input['price_new_'.$i]) || isset($input['name_new_'.$i]) ||  isset($input['amount_new_'.$i])){
                $part=new Part();
                $part->purchase_no=$purchase_no;
                $part->name=(isset($input['name_new_'.$i])) ? $input['name_new_'.$i] : null ;
                $part->unit=(isset($input['unit_new_'.$i])) ? $input['unit_new_'.$i] : null ;
                $part->price=(isset($input['price_new_'.$i])) ? $input['price_new_'.$i] : null ;
                $part->qty=(isset($input['qty_new_'.$i])) ? $input['qty_new_'.$i] : null ;
                $part->amount=(isset($input['amount_new_'.$i])) ? $input['amount_new_'.$i] : null ;
                $part->save();
            }          
        }
    }
     /**
     * create a new supplier
     *
     * @param array $input
     *
     * @return id
     */
    public function createSupplier($input)
    {
        $supplier=new Supplier();
        $supplier->name=$input['sup_name'];
        $supplier->phone=$input['phone'];
        $supplier->trn=$input['sup_trn'];
        $supplier->save();
        return (string)$supplier->id;
    }

         /**
     * update a supplier 
     *
     * @param array $input
     *
     * @return Model
     */
    public function updateSupplier($input)
    {
        $supplier=Supplier::find($input['sup_name']);
        $supplier->phone=$input['phone'];
        $supplier->trn=$input['sup_trn'];
        $supplier->save();
        return ;
    }
}
