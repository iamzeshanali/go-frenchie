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
                                        <h2>Breeder <b>Supplies</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{route('showTrashedSupplies')}}" class="btn btn-success btn-fbd">
                                            <i class="fas fa-trash-alt"></i> <span>Recycle Listings</span>
                                        </a>
                                        <a href="{{route('addBreederSupplies')}}" class="btn btn-success btn-fbd">
                                            <i class="fas fa-plus"></i> <span>Add New Listing</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if(empty($Supplies))
                                <div class="row">
                                    <div class="container">
                                        <h2><b>No Supplies Exist</b></h2>
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
                                                <a href="{{route('showSingleBreederSupplies',$supply->slug)}}" class="view"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('editBreederSupplies',$supply->slug)}}" class="edit" data-toggle=""><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#deleteListingModal{{$supply->slug}}" class="delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                                                <div id="deleteListingModal{{$supply->slug}}" class="modal fade">
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

                                                                    <form action="{{route('trashBreederSupplies', $supply->slug)}}" method="get">
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
                                    <div class="hint-text">Showing <b>{{count($Supplies)}}</b> out of <b>{{$total}}</b> entries</div>
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
        <!-- @include('components.adds-area') -->
        </div>

    </div>
@endsection
