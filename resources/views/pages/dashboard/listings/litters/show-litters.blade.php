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
                                        <h2>Listings <b>Litters</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{route('showTrashedLitters')}}" class="btn btn-success btn-fbd">
                                            <i class="fas fa-trash-alt"></i> <span>Recycle Listing</span>
                                        </a>
                                        <a href="{{route('addLitter')}}" class="btn btn-success btn-fbd">
                                            <i class="fas fa-plus"></i> <span>Add New Listing</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if(empty($Puppies))
                                <div class="row">
                                    <div class="col-sm-6">
                                        No Puupy Exists
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
                                    </thead>
                                    <tbody>
                                    @foreach($Puppies as $puppy)
                                        <tr>
                                            <td>{{$puppy->title}}</td>
                                            <td>{{$puppy->breeder->kennelName}}</td>
                                            <td><img src="{{asset_file_url($puppy->photo1)}}" alt="" width="60px"></td>
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
                                                <a href="{{route('showSingleLitter',$puppy->slug)}}" class="view"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('editLitter',$puppy->slug)}}" class="edit" data-toggle=""><i class="fas fa-pencil-alt"></i></a>
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

                                                                    <form action="{{route('trashLitter', $puppy->slug)}}" method="get">
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
                                    <div class="hint-text">Showing <b>{{count($Puppies)}}</b> out of <b>{{count($Puppies)}}</b> entries</div>
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
