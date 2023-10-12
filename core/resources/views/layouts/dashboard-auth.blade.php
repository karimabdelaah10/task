<!DOCTYPE html>
<html
    class="loading semi-dark-layout"
    lang="{{ app()->getLocale() }}"
    data-layout="semi-dark-layout"
    data-textdirection="ltr"
>
<!-- BEGIN: Head-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <title> {{ env('APP_NAME') ?? null }}  @stack('title') </title>

    <link rel="apple-touch-icon" href="/dashboard_assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/dashboard_assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/form-validation.css">
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/authentication.css">
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/ext-component-toastr.min.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/dashboard_assets/css/style.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="blank-page">


@yield('content')

<!-- BEGIN: Vendor JS-->
<script src="/dashboard_assets/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="/dashboard_assets/js/jquery.validate.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/dashboard_assets/js/app-menu.js"></script>
<script src="/dashboard_assets/js/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="/dashboard_assets/js/auth-login.js"></script>
<!-- END: Page JS-->

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
</body>
<!-- END: Body-->

</html>
