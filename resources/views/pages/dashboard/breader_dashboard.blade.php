@extends('./layouts.app')

@section('content')

<div class="container-fluid">
    <h2 class="page-title text-center my-5">Breader Dashboard</h2>

    <div class="breeder-dashboard-page-content">
        @include('components.breader-dashboard-menu-area')
        @include('components.breader-dashboard-content')
        <!-- @include('components.adds-area') -->
    </div>

</div>
@endsection
