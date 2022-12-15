<?php

namespace App\Repositories;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use App\Models\InvoiceProductDetail;
use App\Models\InvoiceServiceDetail;
use App\Repositories\BaseRepository;

/**
 * Class InvoiceRepository
 * @package App\Repositories
 * @version July 5, 2020, 3:24 pm PKT
*/

class InvoiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'invoice_type_id',
        'quotation_id'
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

    public function createInvoice($input, $request)
    {
        try{
            DB::beginTransaction();
            // start insertion //

            $invoice = $this->model->newInstance($request->except('amount'));
            $invoice->save();
            if(request('file')){
                $invoice->addMedia(request('file'))->toMediaCollection();
            }

            // calculate invoice amount and vat
            $amount = 0.0;
            $vat = 0.0;
            $total_amount = 0.0;
            if(isset($input['product'])){

                //product details
                foreach ($input['product'] as $key => $product) {
                    $vat += $input['amount'][$key] * config('enum.tax_rate');
                    $total_amount += ($input['amount'][$key] * config('enum.tax_rate')) + $input['amount'][$key];

                    InvoiceProductDetail::create(
                    [
                        'invoice_id' => $invoice->id,
                        'product' => $product,
                        'unit' => $input['unit'][$key],
                        'qty' => $input['qty'][$key],
                        'rate' => $input['rate'][$key],
                        'amount' => $input['amount'][$key],
                        'vat' => $input['amount'][$key] * config('enum.tax_rate'),
                        'total_amount' => ($input['amount'][$key] * config('enum.tax_rate')) + $input['amount'][$key],
                    ]);
                }
            }

            if(isset($input['description'])){

                //service details
                foreach ($input['description'] as $key => $description) {
                    $total_amount += $input['service_amount'][$key];

                    InvoiceServiceDetail::updateOrCreate(
                    [
                        'invoice_id' => $invoice->id,
                        'description' => $description,
                        'amount' => $input['service_amount'][$key],
                    ]);
                }
            }

            //update request status
            $invoice->request()->increment('status');

            //update invoice total_amount
            $invoice->update([
                'amount' => $total_amount - $vat,
                'vat' => $vat,
                'total_amount' => $total_amount,
            ]);

            // End Insertion //
            DB::commit();

            return true;
        } catch(Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function updateInvoice($input, $id, $request)
    {
        try{
            DB::beginTransaction();
            // start insertion //

            $query = $this->model->newQuery();
            $invoice = $query->findOrFail($id);
            $invoice->fill($request->except('amount'));
            $invoice->save();
            if(request('file')){
                $invoice->addMedia(request('file'))->toMediaCollection();
            }

            // calculate invoice amount
            $amount = 0.0;
            $vat = 0.0;
            $total_amount = 0.0;

            if(isset($input['product'])){
                $invoice->invoice_product_details()->delete();

                //product details
                foreach ($input['product'] as $key => $product) {
                    $vat += $input['amount'][$key] * config('enum.tax_rate');
                    $total_amount += ($input['amount'][$key] * config('enum.tax_rate')) + $input['amount'][$key];

                    InvoiceProductDetail::updateOrCreate(
                    [
                        'invoice_id' => $invoice->id,
                        'product' => $product,
                        'unit' => $input['unit'][$key],
                        'qty' => $input['qty'][$key],
                        'rate' => $input['rate'][$key],
                        'amount' => $input['amount'][$key],
                        'vat' => $input['amount'][$key] * config('enum.tax_rate'),
                        'total_amount' => ($input['amount'][$key] * config('enum.tax_rate')) + $input['amount'][$key],
                    ]);
                }
            }else{
                $invoice->invoice_product_details()->delete();
            }

            if(isset($input['description'])){
                $invoice->invoice_service_details()->delete();

                //service details
                foreach ($input['description'] as $key => $description) {
                    $total_amount += $input['service_amount'][$key];

                    InvoiceServiceDetail::updateOrCreate(
                    [
                        'invoice_id' => $invoice->id,
                        'description' => $description,
                        'amount' => $input['service_amount'][$key],
                    ]);
                }
            }else{
                $invoice->invoice_service_details()->delete();
            }

            //update invoice total_amount
            $invoice->update([
                'amount' => $total_amount - $vat,
                'vat' => $vat,
                'total_amount' => $total_amount,
            ]);

            // End Insertion //
            DB::commit();

            return true;
        } catch(Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function delete($id)
    {
        try{
            DB::beginTransaction();
            // start insertion //

            $query = $this->model->newQuery();
            $invoice = $query->findOrFail($id);

            //update request status
            $invoice->request()->decrement('status');

            //delete transactions
            $invoice->transaction()->delete();

            //delete invoice
            $invoice->delete();

            // End Insertion //
            DB::commit();

            return true;
        } catch(Exception $e) {
            DB::rollback();
            return $e;
        }
    }
}
