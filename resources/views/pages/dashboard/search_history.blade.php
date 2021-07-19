@extends('./layouts.app')

@section('content')

    <div class="container-fluid">
        <h2 class="page-title text-center mb-5">Breader Dashboard</h2>

        <div class="breeder-dashboard-page-content">
            @include('components.breader-dashboard-menu-area')
            <div class="breader-dashboard-content p-3 mb-3 rounded">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Search History</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{route('clearAllSearchHistory')}}" class="btn btn-success btn-fbd">
                                            <i class="fas fa-trash-alt"></i> <span>Clear All</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if(count($savedSearch) > 0)
                                <table class="bd-content-table table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>DNA Color</th>
                                        <th>DNA Coat</th>
                                        <th>zip</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($savedSearch as $list)
                                        <tr>
                                            <td>{{ucfirst($list->type)}}</td>
                                            <td>{{$list->dnaColor}}</td>
                                            <td>{{$list->dnaCoat}}</td>
                                            <td>{{$list->zip}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>No Search History</p>
                                    </div>
                                </div>
                            @endif
                            <div class="clearfix">
                                <div class="hint-text">Showing <b>{{count($savedSearch)}}</b> out of <b>{{$total}}</b> entries</div>
                                <ul class="pagination">
                                    <li class="page-item {{$page == 1 ? 'disabled' : '' }}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-search')}}/{{$page-1}}" class="page-link">Previous</a></li>

                                    @if(($total % 5) == 0)

                                        @for($i = 1; $i<=($total/5); $i++)
                                            <li class="page-item {{$page == $i ? 'active' : ''}}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-search')}}/{{$i}}" class="page-link">{{$i}}</a></li>
                                        @endfor
                                    @else
                                        @for($i = 1; $i<=($total/5)+1; $i++)
                                            <li class="page-item {{$page == $i ? 'active' : ''}}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-search')}}/{{$i}}" class="page-link">{{$i}}</a></li>
                                        @endfor
                                    @endif
                                    <li class="page-item {{$page >= $total/5 ? 'disabled' : '' }}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-search')}}/{{$page+1}}" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <!-- @include('components.adds-area') -->
        </div>

    </div>
@endsection
