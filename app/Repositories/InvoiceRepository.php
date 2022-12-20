<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Service;
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
                $product->start_date=$input['start_date_'.$i];
                $product->end_date=$input['end_date_'.$i];
                $product->name=$input['name_'.$i];
                $product->code=$input['code_'.$i];
                $product->rental=$input['rental_'.$i];
                $product->period=$input['period_'.$i];
                $product->unit=$input['unit_'.$i];
                $product->price=$input['price_'.$i];
                $product->qty=$input['qty_'.$i];
                $product->amount=$input['amount_'.$i];
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
    public function updateProduct($input, $id)
    {
        // $query = Product::newQuery();

        $model = Product::find($id);

        $model->start_date=$input['start_date_'.$id];
        $model->end_date=$input['end_date_'.$id];
        $model->name=$input['name_'.$id];
        $model->code=$input['code_'.$id];
        $model->rental=$input['rental_'.$id];
        $model->period=$input['period_'.$id];
        $model->unit=$input['unit_'.$id];
        $model->price=$input['price_'.$id];
        $model->qty=$input['qty_'.$id];
        $model->amount=$input['amount_'.$id];
        $model->save();
        
        return $model;
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
}
