<div class="row breadcrumbs-top">
    <div class="col-12">
        <h2 class="content-header-title float-start mb-0">{{ $moduleName ?? null }}</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                </li>
                @if(!empty($breadcrumb))
                    @foreach($breadcrumb as $breadcrumbLabel => $url)
                        @if($url)
                            <li class="breadcrumb-item"><a href="{{$url}}">{{$breadcrumbLabel}}</a></li>
                        @else
                            <li class="breadcrumb-item active">{{$breadcrumbLabel}}</li>
                        @endif

                    @endforeach
                @endif

            </ol>
        </div>
    </div>
</div>
