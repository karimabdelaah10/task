<!-- BEGIN: Vendor JS-->
<script src="/dashboard_assets/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="/dashboard_assets/js/toastr.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/dashboard_assets/js/app-menu.js"></script>
<script src="/dashboard_assets/js/app.js"></script>
<!-- END: Theme JS-->

@stack('js')
@stack('bottom-js')
<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
@if(
    !empty($toastr) && isset($toastr['type']) ||
    (session()->has('toastr') && !empty(session()->get('toastr'))) ||
     count($errors->all())
    )
    @include('layouts.partial.admin.toastr')
@endif

