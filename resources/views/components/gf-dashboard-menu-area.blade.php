<div class="gf-dashboard-menu-area py-3 col-xl-2 col-lg-3 ">
    <div class="gf-dashboard-menu-user-panel">
        <div class="gf-user-info text-center">
                <a href="">
                    <img class="rounded-circle" src="{{ Auth::user()->profileImage ? asset_file_url(Auth::user()->profileImage) : '/images/user.png'}}" alt="" width="275" height="275">
                    <div class="my-3">
                        <h6>Welcome, {{ Auth::user()->firstName }} {{Auth::user()->lastName}}</h6>
                    </div>
                </a>
        </div>
    </div>

    <div id="accordion" class="mt-4">
        <div class="card bg-transparent border-0 pb-2">
            <div class="card-header p-0 bg-transparent border-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-collapse p-0 d-block collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-th-list"></i> &emsp;  LISTINGS
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <a href="{{\Illuminate\Support\Facades\URL::to('dashboard/studs')}}/1"><i class="fas fa-paw mr-3"></i> <span>Studs</span></a><br>
                    <a href="{{\Illuminate\Support\Facades\URL::to('dashboard/puppies')}}/1"><i class="fas fa-paw mr-3"></i> <span>Puppies</span></a><br>
                    <a href="{{\Illuminate\Support\Facades\URL::to('dashboard/litters')}}/1"><i class="fas fa-paw mr-3"></i> <span>Litters</span></a>

                </div>
            </div>
        </div>
        @if(\Illuminate\Support\Facades\Auth::user()->role == new \App\Domain\Entities\Enums\UserRoleEnum('breeder'))
            <div class="card bg-transparent border-0 pb-2">
                <div class="card-header p-0 bg-transparent border-0" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-collapse p-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-dog"></i> &emsp;  RESOURCES
                        </button>
                    </h5>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <a href="{{\Illuminate\Support\Facades\URL::to('dashboard/resources/breeder-supplies')}}/1"><i class="fas fa-paw mr-3"></i> <span>Breeder Supplies</span></a><br>
                        <a href="{{\Illuminate\Support\Facades\URL::to('dashboard/resources/canine-genetics')}}/1"><i class="fas fa-paw mr-3"></i> <span>Cannie Genetics</span></a><br>
                        <a href="{{\Illuminate\Support\Facades\URL::to('dashboard/resources/canine-nutrition')}}/1"><i class="fas fa-paw mr-3"></i> <span>Cannie Nutrition</span></a>

                    </div>
                </div>
            </div>
        @endif
        <div class="card bg-transparent border-0 pb-2">
            <div class="card-header p-0 bg-transparent border-0" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-collapse p-0 link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <i class="fas fa-paw"></i> &emsp;  Saved Items
                    </button>
                </h5>
            </div>

{{--            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">--}}
{{--                <div class="card-body">--}}
{{--                    <ul>--}}
{{--                        <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-studs')}}/1">Saved Studs</a></li>--}}
{{--                        <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-puppy')}}/1">Saved Puppies</a></li>--}}
{{--                        <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-litters')}}/1">Saved Litters</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="card bg-transparent border-0 pb-2">
            <div class="card-header p-0 bg-transparent border-0" id="headingThree">
                <h5 class="mb-0">
                    <button onclick="window.location = '{{\Illuminate\Support\Facades\URL::to('dashboard/saved-search')}}/1'" class="btn btn-collapse p-0 link" aria-expanded="false">
                        <i class="fas fa-history"></i> &emsp;  Search History
                    </button>
                </h5>
            </div>
        </div>
    </div>
</div>
