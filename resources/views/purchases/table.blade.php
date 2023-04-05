@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-hover table-bordered table-striped table-sm text-nowrap'],true) !!}

@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script>
        $(window).on('load', function() {
            $("div.table-filter").html(`
                <div class="row">
                    <div class="col-sm-12">
                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                        <div class="filter-group d-inline">
                            <label>Search By</label>
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

        function search(){
            if($('#daterange').val() != '' || $('#status').val() != '' )
                window.LaravelDataTables["dataTableBuilder"].draw(false);
        }
        function clearFilter(){
            $('#daterange').val('');
            $('#from_date').val('');
            $('#to_date').val('');

            window.LaravelDataTables["dataTableBuilder"].draw(false);
        }
    </script>
@endsection

@push('child-scripts')
    {{-- password popup --}}
    <script>
        function clearFormType(){
            $("input").removeClass('is-invalid');
            $(".invalid-feedback").text('');
            $('#type-form')[0].reset();
            $("#modal-type").modal('hide');
            // document.getElementById('submit').removeAttribute('disabled');
        }
    </script>
@endpush
