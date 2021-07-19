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
                                        <h2>Saved <b>Studs</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{route('trashedSavedStuds')}}" class="btn btn-success btn-fbd">
                                            <i class="fas fa-trash-alt"></i> <span>Recycle Listing</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if(empty($listings))
                                <div class="row">
                                    <div class="col-sm-6">
                                        No Stud Exists
                                    </div>
                                </div>
                            @else
                                <table class="bd-content-table table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Breeder</th>
                                        <th>Sex</th>
                                        <th>Image</th>
                                        <th>Preference</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listings as $list)
                                        <tr>
                                            <td>{{$list->listings->title}}</td>
                                            <td>{{$list->listings->breeder->kennelName}}</td>
                                            <td>{{ucfirst($list->listings->sex->getValue())}}</td>
                                            <td><img src="{{asset_file_url($list->listings->photo1)}}" alt="" width="60px"></td>
                                            <td>
                                                @if($list->listings->isSponsored == 1)
                                                    <span style="color: #00a65a">Sponsored</span>
                                                @else
                                                    <span style="color: darkred">Standard</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($list->listings->status->getValue() == 'active')
                                                    <span style="color: #00a65a">Active</span>
                                                @else
                                                    <span style="color: red">Disabled</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#deleteListingModal{{$list->listings->getId()}}" class="delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                                                <div id="deleteListingModal{{$list->listings->getId()}}" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form>
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Listing</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete these Records?</p>
                                                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{route('dashboard')}}" method="get">

                                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                    </form>

                                                                    <form action="{{route('softDeleteListing', $list->listings->slug)}}" method="get">
                                                                        @csrf
                                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                                    </form>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <div class="hint-text">Showing <b>{{count($listings)}}</b> out of <b>{{$total}}</b> entries</div>
                                    <ul class="pagination">
                                        <li class="page-item {{$page == 1 ? 'disabled' : '' }}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-studs')}}/{{$page-1}}" class="page-link">Previous</a></li>

                                        @if(($total % 5) == 0)

                                            @for($i = 1; $i<=($total/5); $i++)
                                                <li class="page-item {{$page == $i ? 'active' : ''}}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-studs')}}/{{$i}}" class="page-link">{{$i}}</a></li>
                                            @endfor
                                        @else
                                            @for($i = 1; $i<=($total/5)+1; $i++)
                                                <li class="page-item {{$page == $i ? 'active' : ''}}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-studs')}}/{{$i}}" class="page-link">{{$i}}</a></li>
                                            @endfor
                                        @endif
                                        <li class="page-item {{$page >= $total/5 ? 'disabled' : '' }}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-studs')}}/{{$page+1}}" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>

            </div>
        <!-- @include('components.adds-area') -->
        </div>

    </div>
@endsection
