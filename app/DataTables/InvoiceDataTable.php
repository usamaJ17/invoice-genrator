<?php

namespace App\DataTables;

use App\Models\Invoice;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;
use Yajra\DataTables\Html\Column;

class InvoiceDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new CollectionDataTable($query);

        return $dataTable->addIndexColumn()->addColumn('action', 'invoices.datatables_actions')
        ->addColumn('date', function($query) {
            return $query->date;
        })
        ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Invoice $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Invoice $model)
    {
        // return $model->newQuery()->orderBy('invoice_no','desc');
        $model = $model->newQuery()->with('customer');

        if(request('from_date') && request('to_date'))
        $model->whereDate('date', '>=', request('from_date'))
            ->whereDate('date', '<=', request('to_date'));

        if(request('invoice_type'))
            $model->where('type','=',request('invoice_type'));

        return $model->orderBy('invoice_no','desc')->get();

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->ajax([
                'url'=> url('/invoice') ,
                'data'=> 'function(d){
                    d.invoice_type= $("#invoice_type option:selected").text()
                    d.from_date= $(\'input[name=from_date]\').val();
                    d.to_date= $(\'input[name=to_date]\').val();
                }'
            ])
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'pageLength' => '25',
                'dom'       => '<"row" <"col-md-3"B> <"col-md-7"<"table-filter">> <"col-md-2"f> >rt<"row" <"col-md-6"li> <"col-md-6"p> >',
                'bSort' => false,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                ],
                'language' => [
                    'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'invoice_no' => new Column(['title' => __('models/invoices.fields.no'), 'data' => 'invoice_number']),
            'date' => new Column(['title' => __('models/invoices.fields.date'), 'data' => 'date']),
            'manual' => new Column(['title' => __('models/invoices.fields.manual'), 'data' => 'manual']),
            'name' => new Column(['title' => __('models/invoices.fields.name'), 'data' => 'customer.name']),
            'type' => new Column(['title' => __('models/invoices.fields.type'), 'data' => 'type']),
            'authorized' => new Column(['title' => __('models/invoices.fields.authorized'), 'data' => 'authorized']),
            'phone' => new Column(['title' => __('models/invoices.fields.phone'), 'data' => 'phone']),
            'lpo' => new Column(['title' => __('models/invoices.fields.lpo'), 'data' => 'lpo']),
            'payment' => new Column(['title' => __('models/invoices.fields.payment'), 'data' => 'payment']),
            'gross' => new Column(['title' => __('models/invoices.fields.gross'), 'data' => 'gross']),
            'vat' => new Column(['title' => __('models/invoices.fields.vat'), 'data' => 'vat']),
            'vat_amount' => new Column(['title' => __('models/invoices.fields.vat_amount'), 'data' => 'vat_amount']),
            'remarks' => new Column(['title' => __('models/invoices.fields.remarks'), 'data' => 'remarks']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'invoices_' . time();
    }
}
