<?php

namespace App\DataTables;

use App\Models\Purchase;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PurchaseDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addIndexColumn()->addColumn('action', 'purchases.datatables_actions')
        ->addColumn('date', function($query) {
            return $query->date;
        })
        ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Purchase $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Purchase $model)
    {
        // return $model->newQuery()->orderBy('Purchase_no','desc');
        $model = $model->newQuery();

        if(request('from_date') && request('to_date'))
        $model->whereDate('date', '>=', request('from_date'))
            ->whereDate('date', '<=', request('to_date'));
        return $model->orderBy('purchase_no','desc');

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
                'url'=> url('/purchase') ,
                'data'=> 'function(d){
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
            'purchase_no' => new Column(['title' => __('models/purchases.fields.no'), 'data' => 'purchase_no']),
            'date' => new Column(['title' => __('models/purchases.fields.date'), 'data' => 'date']),
            'sup_name' => new Column(['title' => __('models/purchases.fields.sup_name'), 'data' => 'sup_name']),
            'sup_invoice' => new Column(['title' => __('models/purchases.fields.sup_invoice'), 'data' => 'sup_invoice']),
            'sup_trn' => new Column(['title' => __('models/purchases.fields.sup_trn'), 'data' => 'sup_trn','searchable' => false]),
            'gross' => new Column(['title' => __('models/purchases.fields.gross'), 'data' => 'gross','searchable' => false]),
            'vat' => new Column(['title' => __('models/purchases.fields.vat'), 'data' => 'vat','searchable' => false]),
            'vat_amount' => new Column(['title' => __('models/purchases.fields.vat_amount'), 'data' => 'vat_amount','searchable' => false]),
            'remarks' => new Column(['title' => __('models/purchases.fields.remarks'), 'data' => 'remarks','searchable' => false]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Purchases_' . time();
    }
}
