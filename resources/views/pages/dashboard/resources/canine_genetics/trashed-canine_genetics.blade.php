@extends('./layouts.app')

@section('content')

    <div class="container-fluid">
        <h2 class="page-title text-center mb-5">Breader Dashboard</h2>

        <div class="breeder-dashboard-page-content">
            @include('components.gf-dashboard-menu-area')
            <div class="breader-dashboard-content p-3 mb-3 rounded">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Canine <b>Genetics</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{route('deleteAllCanineGenetics')}}" class="btn btn-success btn-fbd">
                                            <i class="fas fa-trash-alt"></i> <span>Clear Trash</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if(empty($Supplies))
                                <div class="row">
                                    <div class="container" style="text-align: center">
                                        <img src="/images/placeholder.gif" id="preview-image" class="img-thumbnail my-3" width="350px">
                                        <h2><b>No Canine Genetics Exist</b></h2>
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
                                        <td><img src="{{asset_file_url($supply->logo)}}" alt="" width="60px"></td>
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
                                                                <form action="{{route('showTrashedCanineGenetics')}}" method="get">

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
                                                                <form action="{{route('showTrashedCanineGenetics')}}" method="get">

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
                            <div class="clearfix">
                                <div class="hint-text">Showing <b>{{count($Supplies)}}</b> out of <b>{{count($Supplies)}}</b> entries</div>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a href="#">Previous</a></li>
                                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
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
