<?php

namespace App\Http\Controllers;

use App\DataTables\InvoiceDataTable;
use App\Repositories\InvoiceRepository;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Service;
use App\Models\Customer;
use App\User;

use Flash;


use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /** @var  InvoiceRepository */
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepo)
    {
        $this->invoiceRepository = $invoiceRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InvoiceDataTable $datatable)
    {
        return $datatable->render('invoices.index');
        // dd(Invoice::with('user')->with('service')->with('product')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=Customer::orderby('name','asc')->select('name')->get();
        $data = array();
        foreach($customers as $customer){
            $data += [$customer->name=>$customer->name];
        }
        return view('invoices.create')->with(compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // create Invoice
        $input = $request->all();

        $invoice = $this->invoiceRepository->create($input);

        // create payments associated with invoice

        $this->invoiceRepository->addProduct($input,$invoice->invoice_no);

        // create service associated with invoice

        $this->invoiceRepository->addService($input,$invoice->invoice_no);

        Flash::success(__('messages.saved', ['model' => "Invoice"]));

        return redirect(route('invoice.index'));
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);
        $products=Product::where('invoice_no','=',$invoice->invoice_no)->get();
        $service=Service::where('invoice_no','=',$invoice->invoice_no)->first();

        if (empty($invoice)) {
            Flash::error("Invoice".' '.__('messages.not_found'));

            return redirect(route('invoice.index'));
        }
        $data=compact('invoice','products','service');
        return view('invoices.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::with('user')->find($id);
        $products=Product::where('invoice_no','=',$invoice->invoice_no)->get();
        $service=Service::where('invoice_no','=',$invoice->invoice_no)->first();
        $customers=Customer::orderby('name','asc')->select('name')->get();
        $data = array();
        foreach($customers as $customer){
            $data += [$customer->name=>$customer->name];
        }

        if (empty($invoice)) {
            Flash::error("Invoice".' '.__('messages.not_found'));

            return redirect(route('invoice.index'));
        }
        $data=compact('invoice','products','service','data');
        return view('invoices.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invoice = $this->invoiceRepository->find($id);

        if (empty($invoice)) {
            Flash::error(__('messages.not_found', ['model' => 'invoice']));

            return redirect(route('invoice.index'));
        }
        $invoice = $this->invoiceRepository->update($request->all(), $id);
        
        // update products associated with invoice
        $products=Product::where('invoice_no','=',$invoice->invoice_no)->get();
        foreach ($products as $product) {
            $product = $this->invoiceRepository->updateProduct($request->all(), $product->product_id);
        }
        
        // update service associated with invoice
        if($request['type']=='service'){
            $service=Service::where('invoice_no','=',$invoice->invoice_no)->first();
            $service = $this->invoiceRepository->updateservice($request->all(), $service->service_id);
        }

        Flash::success(__('messages.updated', ['model' => 'invoice']));

        return redirect(route('invoice.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = $this->invoiceRepository->find($id);

        if (empty($invoice)) {
            Flash::error(__('messages.not_found', ['model' => 'Invoice']));

            return redirect(route('companies.index'));
        }

        $status = $this->invoiceRepository->delete($id);
        if($status)
            Flash::success(__('messages.deleted', ['model' => 'Invoice']));
        else
            Flash::error(__('messages.permisssion_error'));

        return redirect(route('invoice.index'));
    }
}
