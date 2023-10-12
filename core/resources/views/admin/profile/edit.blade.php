@extends('layouts.dashboard')
@push('title')
    {{ @$pageTitle ?? " " }}
@endpush
@push('css')
    <style>
        .form-check {
            display: inline-block !important;
            margin: 0 30px 0 0 !important;
        }

        fieldset {
            border: 1px solid #e2e2e2;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
@endpush
@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form
                            class="form"
                            action="{{ route('profile.postUpdate') }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="row">
                                <!-- header section -->
                                <div class="d-flex">
                                    <a href="#" class="me-25">
                                        <img
                                            src="{{image($row->profile_picture , 'large')}}"
                                            id="account-upload-img"
                                            class="uploadedAvatar rounded me-50"
                                            alt="profile image"
                                            height="100"
                                            width="100"/>
                                    </a>
                                    <!-- upload and reset button -->
                                    <div class="d-flex align-items-end mt-75 ms-1">
                                        <div>
                                            <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                            <input type="file" name="profile_picture" id="account-upload" hidden accept="image/*"/>
                                            <button type="button" id="account-reset"
                                                    class="btn btn-sm btn-outline-secondary mb-75">Reset
                                            </button>
                                            <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                            <p class="mb-0">Allowed size :2M</p>
                                        </div>
                                    </div>
                                    <!--/ upload and reset button -->
                                </div>
                                <!--/ header section -->
                                <div class="row  mt-2 pt-50">
                                    @include('admin.profile.form' , ['row' => $row])
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success"> {{ trans('app.Update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="/dashboard_assets/js/select2.full.min.js"></script>
    <script src="/dashboard_assets/js/form-select2.min.js"></script>
@endpush
