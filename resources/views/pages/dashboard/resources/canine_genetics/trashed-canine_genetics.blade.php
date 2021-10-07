@extends('./layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row pb-0">
            <div class="btn-group btn-breadcrumb breadcrumb-info">
                <a href="{{route('dashboard')}}" class="btn btn-info visible-lg-block visible-md-block">Dashboard</a>
                <a href="#" class="btn btn-info visible-lg-block visible-md-block">Resources</a>
                <a href="{{route('showAllCanineGenetics',1)}}" disabled class="btn btn-info visible-lg-block visible-md-block">Canine Genetics</a>
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
                                        <h2>Trashed Canine <b>Genetics</b></h2>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <a href="{{route('deleteAllCanineGenetics')}}" class="gf-btn-dark">
                                            <i class="fas fa-plus"></i> <span>Clear Trash</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if(empty($Supplies))
                                <div class="row">
                                    <div class="container" style="text-align: center">
                                        <h2><b>No Canine Genetics Trashed</b></h2>
                                    </div>
                                </div>
                            @else
                                <table class="bd-content-table table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Breeder</th>
                                        <th>Logo</th>
                                        <th>Coupon Code</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Supplies as $supply)
                                        <tr>
                                            <td>{{$supply->title}}</td>
                                            <td>{{$supply->breeder->kennelName}}</td>
                                            <td><img src="{{ $supply->logo? asset_file_url($supply->logo) : '/images/notfound/gf-not-found.png'}}" alt="" width="60px"></td>
                                            <td>
                                                {{$supply->couponCode}}
                                            </td>
                                            <td>
                                                {{$supply->price->asString()}}
                                            </td>
                                            <td>
                                                @if($supply->status->getValue() == 'active')
                                                    <span style="color: #00a65a">Active</span>
                                                @else
                                                    <span style="color: red">Disabled</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#restoreListingModal{{$supply->slug}}" class="edit" data-toggle="modal"><i class="fas fa-pencil-alt"></i></a>
                                                <div id="restoreListingModal{{$supply->slug}}" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form>
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Recycle Listing</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Recycle this Record?</p>
                                                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{route('showTrashedCanineGenetics',1)}}" method="get">

                                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                    </form>

                                                                    <form action="{{route('recycleCanineGenetics', $supply->slug)}}" method="get">
                                                                        @csrf
                                                                        <input type="submit" class="btn btn-success" value="Recycle">
                                                                    </form>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#deleteListingModal{{$supply->slug}}" class="delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                                                <div id="deleteListingModal{{$supply->slug}}" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form>
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Permanently</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this record Permanently?</p>
                                                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{route('showTrashedCanineGenetics',1)}}" method="get">

                                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                    </form>

                                                                    <form action="{{route('deleteCanineGenetics', $supply->slug)}}" method="post">
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
                                    <div class="hint-text">Showing <b>{{count($Supplies)}}</b> out of <b>{{count($Supplies)}}</b> entries</div>
                                    <ul class="pagination">
                                        <li class="page-item {{$page == 1 ? 'disabled' : '' }}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/resources/breeder-supplies')}}/{{$page-1}}" class="page-link">Previous</a></li>

                                        @if(($total % 5) == 0)

                                            @for($i = 1; $i<=($total/5); $i++)
                                                <li class="page-item {{$page == $i ? 'active' : ''}}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/resources/breeder-supplies')}}/{{$i}}" class="page-link">{{$i}}</a></li>
                                            @endfor
                                        @else
                                            @for($i = 1; $i<=($total/5)+1; $i++)
                                                <li class="page-item {{$page == $i ? 'active' : ''}}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/resources/breeder-supplies')}}/{{$i}}" class="page-link">{{$i}}</a></li>
                                            @endfor
                                        @endif
                                        <li class="page-item {{$page >= $total/5 ? 'disabled' : '' }}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/resources/breeder-supplies')}}/{{$page+1}}" class="page-link">Next</a></li>
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
