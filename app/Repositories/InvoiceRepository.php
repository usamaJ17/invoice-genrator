<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Service;
use App\Models\Customer;
use App\Repositories\BaseRepository;

/**
 * Class CompanyRepository
 * @package App\Repositories
 * @version July 4, 2020, 8:10 pm PKT
*/

class InvoiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type'
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
        return Invoice::class;
    }
        /**
     * add product to invoice
     *
     * @param array $input
     *
     * @return Model
     */
    public function addProduct($input,$invoice_no)
    {
        for ($i=1; $i <= $input['total_row'] ; $i++) { 
            if(isset($input['start_date_'.$i]) || isset($input['name_'.$i]) ||  isset($input['amount_'.$i])){
                $product=new Product();
                $product->invoice_no=$invoice_no;
                $product->start_date=(isset($input['start_date_'.$i])) ? $input['start_date_'.$i] : null ;
                $product->end_date=(isset($input['end_date_'.$i])) ? $input['end_date_'.$i] : null ;
                $product->name=(isset($input['name_'.$i])) ? $input['name_'.$i] : null ;
                $product->code=(isset($input['code_'.$i])) ? $input['code_'.$i] : null ;
                $product->rental=(isset($input['rental_'.$i])) ? $input['rental_'.$i] : null ;
                $product->period=(isset($input['period_'.$i])) ? $input['period_'.$i] : null ;
                $product->unit=(isset($input['unit_'.$i])) ? $input['unit_'.$i] : null ;
                $product->price=(isset($input['price_'.$i])) ? $input['price_'.$i] : null ;
                $product->qty=(isset($input['qty_'.$i])) ? $input['qty_'.$i] : null ;
                $product->amount=(isset($input['amount_'.$i])) ? $input['amount_'.$i] : null ;
                $product->save();
            }          
        }
    }
    public function updateProduct($input, $id)
    {
        // $query = Product::newQuery();

        $model = Product::find($id);

        $model->start_date=(isset($input['start_date_'.$id])) ? $input['start_date_'.$id] : null ;
        $model->end_date=(isset($input['end_date_'.$id])) ? $input['end_date_'.$id] : null ;
        $model->name=(isset($input['name_'.$id])) ? $input['name_'.$id] : null ;
        $model->code=(isset($input['code_'.$id])) ? $input['code_'.$id] : null ;
        $model->rental=(isset($input['rental_'.$id])) ? $input['rental_'.$id] : null ;
        $model->period=(isset($input['period_'.$id])) ? $input['period_'.$id] : null ;
        $model->unit=(isset($input['unit_'.$id])) ? $input['unit_'.$id] : null ;
        $model->price=(isset($input['price_'.$id])) ? $input['price_'.$id] : null ;
        $model->qty=(isset($input['qty_'.$id])) ? $input['qty_'.$id] : null ;
        $model->amount=(isset($input['amount_'.$id])) ? $input['amount_'.$id] : null ;
        $model->save();
        
        return $model;
    }
    public function updatedAddProduct($input, $invoice_no)
    {
        for ($i=1; $i <= $input['total_row'] ; $i++) { 
            if(isset($input['start_new_date_'.$i]) || isset($input['name_new_'.$i]) ||  isset($input['amount_new_'.$i])){
                $product=new Product();
                $product->invoice_no=$invoice_no;
                $product->start_date=(isset($input['start_new_date_'.$i])) ? $input['start_new_date_'.$i] : null ;
                $product->end_date=(isset($input['end_new_date_'.$i])) ? $input['end_new_date_'.$i] : null ;
                $product->name=(isset($input['name_new_'.$i])) ? $input['name_new_'.$i] : null ;
                $product->code=(isset($input['code_new_'.$i])) ? $input['code_new_'.$i] : null ;
                $product->rental=(isset($input['rental_new_'.$i])) ? $input['rental_new_'.$i] : null ;
                $product->period=(isset($input['period_new_'.$i])) ? $input['period_new_'.$i] : null ;
                $product->unit=(isset($input['unit_new_'.$i])) ? $input['unit_new_'.$i] : null ;
                $product->price=(isset($input['price_new_'.$i])) ? $input['price_new_'.$i] : null ;
                $product->qty=(isset($input['qty_new_'.$i])) ? $input['qty_new_'.$i] : null ;
                $product->amount=(isset($input['amount_new_'.$i])) ? $input['amount_new_'.$i] : null ;
                $product->save();
            }          
        }
    }

     /**
     * add service to invoice
     *
     * @param array $input
     *
     * @return Model
     */
    public function addService($input,$invoice_no)
    {
        if($input['type']=='service'){
            $service=new Service();
            $service->name=$input['name'];
            $service->model=$input['model'];
            $service->brand=$input['brand'];
            $service->amount=$input['amount'];
            $service->number=$input['number'];
            $service->invoice_no=$invoice_no;
            $service->save();
        }
    }

    public function updateservice($input, $id)
    {
        // $query = Product::newQuery();

        $model = Service::find($id);

        $model->name=$input['name'];
        $model->model=$input['model'];
        $model->brand=$input['brand'];
        $model->amount=$input['amount'];
        $model->number=$input['number'];
        $model->save();
        
        return $model;
    }
     /**
     * create a new customer
     *
     * @param array $input
     *
     * @return id
     */
    public function createCustomer($input)
    {
        $customer=new Customer();
        $customer->name=$input['customer'];
        $customer->phone=$input['phone'];
        $customer->trn=$input['trn'];
        $customer->address=$input['address'];
        $customer->save();
        return (string)$customer->id;
    }

         /**
     * update a customer 
     *
     * @param array $input
     *
     * @return Model
     */
    public function updateCustomer($input)
    {
        $customer=Customer::find($input['customer']);
        $customer->phone=$input['phone'];
        $customer->trn=$input['trn'];
        $customer->address=$input['address'];
        $customer->save();
        return ;
    }
}
