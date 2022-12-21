@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-hover table-bordered table-striped table-sm text-nowrap'],true) !!}

@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script>
        var invoice_types = @json(config('enum.invoice_type'));
        var options='';
        Object.entries(invoice_types).forEach(inv => {
            options +=`<option value="${inv[1]}">${inv[1]}</option>`;
        });
        $(window).on('load', function() {
            $("div.table-filter").html(`
                <div class="row">
                    <div class="col-sm-12">
                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                        <div class="filter-group d-inline">
                            <label>Search By</label>
                            <select id="invoice_type" class="form-control" onchange="setSearchType(this)" name="invoice_type">
                                <option></option>
                                ${options}
                            </select>
                        </div>
                        <div class="filter-group" >
                            <input type="text" class="form-control" id="daterange" name="daterange">
                            <input type="hidden" id="from_date" name="from_date">
                            <input type="hidden" id="to_date" name="to_date">
                        </div>
                        <div class="filter-group d-inline">
                            <label></label>
                            <button type="button" onclick="search()" class="btn btn-primary" >Search </button>
                            <button type="button" onclick="clearFilter()" class="btn btn-danger" >Clear </button>
                        </div>
                    </div>
                </div>`
            );
            //Date range picker with time picker
            $('#daterange').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });

            $('#daterange').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
                $('#from_date').val(picker.startDate.format('YYYY-MM-DD'));
                $('#to_date').val(picker.endDate.format('YYYY-MM-DD'));
            });

            $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
                $('#datepicker').val('');
                $('#from_date').val('');
                $('#to_date').val('');
            });
        });

        function setSearchType(sel){
            if(typeof sel.value !== ''){
                $('#invoice_type').val(sel.value);
            }
            else{
                $('#invoice_type').attr('value',null);
            }
        }
        function search(){
            if($('#daterange').val() != '' || $('#status').val() != '' )
                window.LaravelDataTables["dataTableBuilder"].draw(false);
        }
        function clearFilter(){
            $('#daterange').val('');
            $('#from_date').val('');
            $('#to_date').val('');
            $('#invoice_type').val('');

            // Search Type filter
            document.getElementById('invoice_type').selectedIndex = 0;

            window.LaravelDataTables["dataTableBuilder"].draw(false);
        }
    </script>
@endsection


