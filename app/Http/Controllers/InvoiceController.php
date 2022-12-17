<?php

namespace App\Http\Controllers;

use App\DataTables\InvoiceDataTable;
use App\Repositories\InvoiceRepository;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Service;
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
        $users=User::orderby('name','asc')->select('id','name')->get();
        // dd($user);
        $data = array();
        foreach($users as $user){
            $data += [$user->id=>$user->name];
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
        // create Invoice
        $input = $request->all();

        $invoice = $this->invoiceRepository->create($input);
        $invoice->user_id = $request['user_id'];
        $invoice->save();
        // create payments associated with invoice

        for ($i=1; $i <= $request['total_row'] ; $i++) { 
            if(isset($request['start_date_'.$i]) || isset($request['name_'.$i]) ||  isset($request['amount_'.$i])){
                $product=new Product();
                $product->invoice_no=$invoice->invoice_no;
                $product->start_date=$request['start_date_'.$i];
                $product->end_date=$request['end_date_'.$i];
                $product->name=$request['name_'.$i];
                $product->code=$request['code_'.$i];
                $product->rental=$request['rental_'.$i];
                $product->period=$request['period_'.$i];
                $product->unit=$request['unit_'.$i];
                $product->price=$request['price_'.$i];
                $product->qty=$request['qty_'.$i];
                $product->amount=$request['amount_'.$i];
                $product->save();
            }          
        }

        // create payments associated with invoice
        if($request['type']=='service'){
            $service=new Service();
            $service->name=$request['name'];
            $service->model=$request['model'];
            $service->brand=$request['brand'];
            $service->amount=$request['amount'];
            $service->number=$request['number'];
            $service->invoice_no=$invoice->invoice_no;
            $service->save();
        }
        Flash::success(__('messages.saved', ['model' => "Invoice"]));

        return redirect(route('invoice.index'));
    }

    public function show($id)
    {
        $invoice = Invoice::with('user')->find($id);
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
        $users=User::orderby('name','asc')->select('id','name')->get();
        // dd($user);
        $data = array();
        foreach($users as $user){
            $data += [$user->id=>$user->name];
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
