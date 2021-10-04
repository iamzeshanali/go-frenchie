@extends('./layouts.app')

@section('content')

<div class="container-fluid">
{{--    <h2 class="page-title text-center my-5">Breader Dashboard</h2>--}}

    <div class="gf-dashboard-page-content row align-items-start">
        @include('components.gf-dashboard-menu-area')
        @include('components.gf-dashboard-content')

    </div>

</div>
@endsection
