@extends('layouts.dashboard')
@push('title')
    {{ @$pageTitle ?? "Start Page" }}
@endpush
@push('top-css')
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/dataTables.bootstrap5.min.css">
@endpush
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="card-header border-bottom p-1">
                            <div class="head-label">
                                <h6 class="mb-0">{{  str(\App\Modules\BaseApp\Enums\BaseAppEnums::COUNTRY_MODULE_PREFIX)->upper() }}</h6>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex">
                                    <a class="dt-button buttons-collection btn btn-outline-secondary me-2"
                                       tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                       aria-haspopup="true">
                                        <span>
                                            <i data-feather='share'></i>
                                            Export</span>
                                    </a>
                                    <a class="dt-button create-new btn btn-primary" tabindex="0"
                                       aria-controls="DataTables_Table_0" type="button"
                                       href="{{route('countries.getCreate')}}">
                                        <span>
                                            <i data-feather='plus'></i>
                                            Add New Country</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @include('layouts.partial.admin.filters')

                        <table class="datatables-basic table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    Name En
                                </th>
                                <th>
                                    Name Ar
                                </th>
                                <th>
                                    Currency Code En
                                </th>
                                <th>
                                    Currency Code Ar
                                </th>
                                <th>
                                    Country Code
                                </th>
                                <th>
                                    Is Active
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $row)
                                <tr class="odd">
                                    <td tabindex="0" class="sorting_1">{{$row->id}}</td>
                                    <td tabindex="0" class="sorting_1">
                                        <div class="d-flex align-items-center">
                                            {{$row->translate('en')?->name ?? ''}}
                                        </div>
                                    </td>
                                    <td tabindex="0" class="sorting_1">
                                        <div class="d-flex align-items-center">
                                            {{$row->translate('ar')?->name ?? ''}}
                                        </div>
                                    </td>
                                    <td tabindex="0" class="sorting_1">
                                        <div class="d-flex align-items-center">
                                            {{$row->translate('en')?->currency_code ?? ''}}
                                        </div>
                                    </td>
                                    <td tabindex="0" class="sorting_1">
                                        <div class="d-flex align-items-center">
                                            {{$row->translate('ar')?->currency_code ?? ''}}
                                        </div>
                                    </td>
                                    <td tabindex="0" class="sorting_1">
                                        <div class="d-flex align-items-center">
                                            {{$row->country_code ?? ''}}
                                        </div>
                                    </td>
                                    <td>
                                        @if($row->is_active)
                                            <span class="badge badge-light-success">Active</span>
                                        @else
                                            <span class="badge badge-light-danger">In Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                    data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item"
                                                   href="{{route('countries.getEdit', $row->id)}}">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <form method="POST" action="{{route('countries.delete' , $row->id)}}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button class="dropdown-item"
                                                            onclick="return confirm('Are you sure?')"
                                                            data-confirm="{{trans('app.Are you sure you want to delete this item')}}?"
                                                            style="width: 100%;">
                                                        <i data-feather="trash" class="me-50"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$rows->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('bottom-js')
    <script src="/dashboard_assets/js/jquery.dataTables.min.js"></script>
@endpush
