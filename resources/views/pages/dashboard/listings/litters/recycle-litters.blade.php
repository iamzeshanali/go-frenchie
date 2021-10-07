@extends('./layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row pb-0">
            <div class="btn-group btn-breadcrumb breadcrumb-info">
                <a href="{{route('dashboard')}}" class="btn btn-info visible-lg-block visible-md-block">Dashboard</a>
                <a href="#" class="btn btn-info visible-lg-block visible-md-block">Listings</a>
                <a href="{{route('showAllLitters',1)}}" disabled class="btn btn-info visible-lg-block visible-md-block">Litters</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="gf-dashboard-page-content row align-items-start">
            @include('components.gf-dashboard-menu-area')
            <div class="breader-dashboard-content col-xl-10 col-lg-9">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Trashed <b>Litters</b></h2>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <a href="{{route('deleteAllLitters')}}" class="gf-btn-dark">
                                            <i class="fas fa-plus"></i> <span>Clear Trash</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if(empty($Puppies))
                                <div class="row">
                                    <div class="col-sm-6">
                                        No Listing Exists
                                    </div>
                                </div>
                            @else
                                <table class="bd-content-table table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Breeder</th>
                                        <th>Image</th>
                                        <th>Preference</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>`
                                    <tbody>
                                    @foreach($Puppies as $puppy)
                                        <tr>
                                            <td>{{$puppy->title}}</td>
                                            <td>{{$puppy->breeder->kennelName}}</td>
                                            <td><img src="{{ $puppy->photo1 ? asset_file_url($puppy->photo1) : '/images/notfound/gf-not-found.png'}}" alt="" width="60px"></td>
                                            <td>
                                                @if($puppy->isSponsored == 1)
                                                    <span style="color: #00a65a">Sponsored</span>
                                                @else
                                                    <span style="color: darkred">Standard</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($puppy->status->getValue() == 'active')
                                                    <span style="color: #00a65a">Active</span>
                                                @else
                                                    <span style="color: red">Disabled</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#recycleListingModal{{$puppy->getId()}}" class="edit" data-toggle="modal"><i class="fas fa-pencil-alt"></i></a>
                                                <div id="recycleListingModal{{$puppy->getId()}}" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form>
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Listing</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to recycle these Records?</p>
                                                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{route('dashboard')}}" method="get">

                                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                    </form>

                                                                    <form action="{{route('recycleLitters', $puppy->slug)}}" method="get">
                                                                        @csrf
                                                                        <input type="submit" class="btn btn-success" value="Recycle">
                                                                    </form>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#deleteListingModal{{$puppy->getId()}}" class="delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                                                <div id="deleteListingModal{{$puppy->getId()}}" class="modal fade">
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

                                                                    <form action="{{route('deleteLitter', $puppy->slug)}}" method="post">
                                                                        @csrf
                                                                        @method('delete')
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
                                <div class="gf-dashboard-table-footer d-flex justify-content-between align-items-center clearfix">
                                    <div class="hint-text">Showing <b>{{count($Puppies)}}</b> out of <b>{{$total}}</b> entries</div>
                                    <ul class="pagination">
                                        <li class="page-item {{$page == 1 ? 'disabled' : '' }}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/trashed-puppies')}}/{{$page-1}}" class="page-link">Previous</a></li>

                                        @if(($total % 5) == 0)

                                            @for($i = 1; $i<=($total/5); $i++)
                                                <li class="page-item {{$page == $i ? 'active' : ''}}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/trashed-puppies')}}/{{$i}}" class="page-link">{{$i}}</a></li>
                                            @endfor
                                        @else
                                            @for($i = 1; $i<=($total/5)+1; $i++)
                                                <li class="page-item {{$page == $i ? 'active' : ''}}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/trashed-puppies')}}/{{$i}}" class="page-link">{{$i}}</a></li>
                                            @endfor
                                        @endif
                                        <li class="page-item {{$page >= $total/5 ? 'disabled' : '' }}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/trashed-puppies')}}/{{$page+1}}" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
