@extends('./layouts.app')

@section('content')

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
                                        <h2>Listings <b>Studs</b></h2>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <a href="{{route('showTrashedStuds',1)}}" class="gf-btn-light">
                                            <i class="fas fa-trash-alt"></i> <span>Recycle Studs</span>
                                        </a>
                                        <a href="{{route('addStud')}}" class="gf-btn-dark">
                                            <i class="fas fa-plus"></i> <span>Add New Stud</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if(empty($Puppies))
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
                                        <th>Kennel</th>
                                        <th>Image</th>
                                        <th>Preference</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>`
                                    <tbody>
                                    @foreach($Puppies as $puppy)
                                        <?php /*dd($puppy);*/?>
                                        <tr>
                                            <td>{{$puppy->title}}</td>
                                            <td>{{$puppy->breeder->kennelName}} , {{$puppy->breeder->city}} , {{$puppy->breeder->zip}}</td>

                                            <td><img src="{{ $puppy->photo1 ? asset_file_url($puppy->photo1) : '/images/notfound/gf-not-found.png'}}" alt="" width="60px"></td>

                                            <td>
                                                @if($puppy->isSponsored == 1)
                                                    <span style="color: #00a65a">Sponsored</span>
                                                @else
                                                    <span style="color: darkred">Standard</span>
                                                @endif
                                                @if($puppy->isFeatured == 1)
                                                    |<span style="color: #FFC107">  Featured</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($puppy->status->getValue() == 'active')
                                                    <span style="color: #00a65a">Approved</span>
                                                @else
                                                    <span style="color: red">Under Review</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('showSingleStud',$puppy->slug)}}" class="view"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('editStud',$puppy->slug)}}" class="edit" data-toggle=""><i class="fas fa-pencil-alt"></i></a>
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

                                                                    <form action="{{route('trashListing', $puppy->slug)}}" method="get">
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
                                <div class="gf-dashboard-table-footer d-flex justify-content-between align-items-center clearfix">
                                    <div class="hint-text">Showing <b>{{count($Puppies)}}</b> out of <b>{{$total}}</b> entries</div>
                                    <ul class="pagination">
                                        <li class="page-item {{$page == 1 ? 'disabled' : '' }}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/puppies')}}/{{$page-1}}" class="page-link">Previous</a></li>

                                        @if(($total % 5) == 0)

                                            @for($i = 1; $i<=($total/5); $i++)
                                                <li class="page-item {{$page == $i ? 'active' : ''}}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/puppies')}}/{{$i}}" class="page-link">{{$i}}</a></li>
                                            @endfor
                                        @else
                                            @for($i = 1; $i<=($total/5)+1; $i++)
                                                <li class="page-item {{$page == $i ? 'active' : ''}}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/puppies')}}/{{$i}}" class="page-link">{{$i}}</a></li>
                                            @endfor
                                        @endif
                                        <li class="page-item {{$page >= $total/5 ? 'disabled' : '' }}"><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/puppies')}}/{{$page+1}}" class="page-link">Next</a></li>
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
