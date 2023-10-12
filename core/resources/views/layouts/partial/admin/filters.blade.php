<form method="get" id="filter_form">
    @php
        $perPageList=[10 , 25 , 50 , 75 , 100 ];
        $perPage=request()->get('per_page') ?? null;
        $searchKey=request()->get('search_key') ?? null;
    @endphp
    <div class="d-flex justify-content-between align-items-center mx-0 row">
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="DataTables_Table_0_length">
                <label>Show
                    <select name="per_page" id="per_page"
                            aria-controls="DataTables_Table_0"
                            class="form-select"
                    >
                        @foreach($perPageList as $perPageValue)
                            <option
                                {!! $perPage == $perPageValue ? "selected" : '' !!} value={{$perPageValue}}>{{$perPageValue}}</option>
                        @endforeach
                    </select> entries
                </label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div
                id="DataTables_Table_0_filter"
                class="dataTables_filter">
                <label>Search:
                    <input
                        value="{{ request()->get('search_key') }}"
                        id="search_key"
                        name="search_key"
                        type="search"
                        class="form-control"
                        placeholder=""
                        aria-controls="DataTables_Table_0">
                </label>
            </div>
        </div>
    </div>
</form>


@push('js')
    <script>
        $('#search_key').on('change', function () {
            $('#filter_form').submit();
        });
        $('#per_page').on('change', function () {
            $('#filter_form').submit();
        });
    </script>
@endpush
