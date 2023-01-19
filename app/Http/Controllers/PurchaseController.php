<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Part;
use Illuminate\Http\Request;
use App\DataTables\PurchaseDataTable;
use App\Models\Customer;
use App\Repositories\PurchaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use DB;

use Flash;

class PurchaseController extends Controller
{
    /** @var  PurchaseRepository */
    private $purchaseRepository;

    public function __construct(PurchaseRepository $purchaseRepo)
    {
        $this->purchaseRepository = $purchaseRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PurchaseDataTable $datatable)
    {
        return $datatable->render('purchases.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nextId = DB::select("SHOW TABLE STATUS LIKE 'purchase'")[0]->Auto_increment;
        $customers=Customer::orderby('name','asc')->select('id','name','trn','phone')->get();
        $name = array();
        $data=array();
        foreach($customers as $customer){
            $name += [$customer->id=>$customer->name];
            $data = Arr::add($data, $customer->id, [$customer->trn,$customer->phone]);
        }
        return view('purchases.create')->with(compact('name','data','nextId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!ctype_digit($request->sup_name)) {
            $customer_id = $this->purchaseRepository->createCustomer($request->all());
            $request->merge([
                'sup_name' => $customer_id,
            ]);
        }
        $input = $request->all();

        $this->purchaseRepository->updateCustomer($request->all());

        $purchase = $this->purchaseRepository->create($input);

        // create payments associated with purchase

        $this->purchaseRepository->addPart($input,$purchase->purchase_no);

        Flash::success(__('messages.saved', ['model' => "Purchase"]));

        return redirect(route('purchase.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = purchase::find($id);
        if (empty($purchase)) {
            Flash::error(__('messages.not_found', ['model' => 'purchase']));

            return redirect(route('purchase.index'));
        }

        $parts=Part::where('purchase_no','=',$purchase->purchase_no)->get();

        $data=compact('purchase','parts');
        return view('purchases.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $purchase = $this->purchaseRepository->find($id);

        if (empty($purchase)) {
            Flash::error(__('messages.not_found', ['model' => 'purchase']));

            return redirect(route('purchase.index'));
        }

        if (!ctype_digit($request->sup_name)) {
            $customer_id = $this->purchaseRepository->createCustomer($request->all());
            $request->merge([
                'sup_name' => $customer_id,
            ]);
        }
        $this->purchaseRepository->updateCustomer($request->all());

        $purchase = $this->purchaseRepository->update($request->all(), $id);

        // update parts associated with purchase
        $parts=Part::where('purchase_no','=',$purchase->purchase_no)->get();
        foreach ($parts as $part) {
            $part = $this->purchaseRepository->updatePart($request->all(), $part->part_id);
        }
        $this->purchaseRepository->updatedAddPart($request->all(),$purchase->purchase_no);

        Flash::success(__('messages.updated', ['model' => 'purchase']));

        return redirect(route('purchase.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = $this->purchaseRepository->find($id);

        if (empty($purchase)) {
            Flash::error(__('messages.not_found', ['model' => 'purchase']));

            return redirect(route('purchase.index'));
        }

        $status = $this->purchaseRepository->delete($id);
        if($status)
            Flash::success(__('messages.deleted', ['model' => 'purchase']));
        else
            Flash::error(__('messages.permisssion_error'));

        return redirect(route('purchase.index'));
    }
    public function checkPassword(Request $request)
    {

        if (Hash::check($request->password, Auth::user()->password)) {
            //if request is for delete purchase 
            if($request->type=='delete'){
                $this->destroy($request->id);
            }
            else{
                //if for edit
                $purchase = Purchase::with('part')->find($request->id);
                $parts=Part::where('purchase_no','=',$purchase->purchase_no)->orderby('part_id','asc')->get();
                $customers=Customer::orderby('name','asc')->select('id','name','trn','phone')->get();
                $name = array();
                $data=array();
                foreach($customers as $customer){
                    $name += [$customer->id=>$customer->name];
                    $data = Arr::add($data, $customer->id, [$customer->trn,$customer->phone]);
                }
                return view('purchases.edit')->with(compact('purchase','parts','name','data'));
            }
        }
        Flash::error(__('messages.wrong', ['model' => 'Password']));
        return redirect(route('purchase.index'));
    }
}
