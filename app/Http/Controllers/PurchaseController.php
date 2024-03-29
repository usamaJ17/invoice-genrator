<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Part;
use Illuminate\Http\Request;
use App\DataTables\PurchaseDataTable;
use App\Models\Supplier;
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
        $suppliers=Supplier::orderby('name','asc')->select('id','name','trn','phone')->get();
        $name = array();
        $data=array();
        foreach($suppliers as $supplier){
            $name += [$supplier->id=>$supplier->name];
            $data = Arr::add($data, $supplier->id, [$supplier->trn,$supplier->phone]);
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
            $supplier_id = $this->purchaseRepository->createSupplier($request->all());
            $request->merge([
                'sup_name' => $supplier_id,
            ]);
        }
        $input = $request->all();

        $this->purchaseRepository->updateSupplier($request->all());

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
        $purchase = purchase::with('supplier')->find($id);
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
    public function edit($id)
    {
        $purchase = Purchase::with('part')->find($id);
        $parts=Part::where('purchase_no','=',$purchase->purchase_no)->orderby('part_id','asc')->get();
        $suppliers=Supplier::orderby('name','asc')->select('id','name','trn','phone')->get();
        $name = array();
        $data=array();
        foreach($suppliers as $supplier){
            $name += [$supplier->id=>$supplier->name];
            $data = Arr::add($data, $supplier->id, [$supplier->trn,$supplier->phone]);
        }
        return view('purchases.edit')->with(compact('purchase','parts','name','data'));

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
            $supplier_id = $this->purchaseRepository->createSupplier($request->all());
            $request->merge([
                'sup_name' => $supplier_id,
            ]);
        }
        $this->purchaseRepository->updateSupplier($request->all());

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
}
