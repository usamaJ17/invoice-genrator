<?php

namespace App\DataTables;

use App\Models\Invoice;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
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
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'invoices.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Invoice $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Invoice $model)
    {
        return $model->newQuery()->orderBy('invoice_no','desc');
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
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
            'created_at' => new Column(['title' => __('models/invoices.fields.date'), 'data' => 'created_at']),
            'invoice_no' => new Column(['title' => __('models/invoices.fields.no'), 'data' => 'invoice_no']),
            'name' => new Column(['title' => __('models/invoices.fields.name'), 'data' => 'customer']),
            'type' => new Column(['title' => __('models/invoices.fields.type'), 'data' => 'type','searchable' => false]),
            'authorized' => new Column(['title' => __('models/invoices.fields.authorized'), 'data' => 'authorized','searchable' => false]),
            'phone' => new Column(['title' => __('models/invoices.fields.phone'), 'data' => 'phone','searchable' => false]),
            'lpo' => new Column(['title' => __('models/invoices.fields.lpo'), 'data' => 'lpo','searchable' => false]),
            'payment' => new Column(['title' => __('models/invoices.fields.payment'), 'data' => 'payment','searchable' => false]),
            'gross' => new Column(['title' => __('models/invoices.fields.gross'), 'data' => 'gross','searchable' => false]),
            'vat' => new Column(['title' => __('models/invoices.fields.vat'), 'data' => 'vat','searchable' => false]),
            'vat_amount' => new Column(['title' => __('models/invoices.fields.vat_amount'), 'data' => 'vat_amount','searchable' => false]),
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
