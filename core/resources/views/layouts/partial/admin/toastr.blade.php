<script src="/dashboard_assets/js/toastr.min.js"></script>
<script src="/dashboard_assets/js/ext-component-toastr.min.js"></script>
<script>
    toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }

</script>
@if(isset($toastr) || (session()->has('toastr') && $toastr = session()->get('toastr')))
    @switch($toastr['type'])
        @case('success')
            <script>
                toastr.success('{{$toastr['message']}}', '{{$toastr['title']}}')
            </script>
            @break
        @case('error')
            <script>
                toastr.error('{{$toastr['message']}}', '{{$toastr['title']}}')
            </script>
            @break
        @case('warning')
            <script>
                toastr.warning('{{$toastr['message']}}', '{{$toastr['title']}}')
            </script>
            @break
        @case('info')
            <script>
                toastr.info('{{$toastr['message']}}', '{{$toastr['title']}}')
            </script>
            @break
    @endswitch
@elseif(count($errors->all()))
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{$error}}")
        </script>
    @endforeach

@endif

