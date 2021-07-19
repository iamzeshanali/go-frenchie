<div class="breader-dashboard-menu-area p-3 mb-3 rounded">
    <div class="bd-menu-user-panel">
        <div class="text-center">
            @if(empty(Auth::user()->profileImage))
            <img src="images/user.png" alt="" width="60px" height="60px">
            @else
            <img src="{{asset_file_url(Auth::user()->profileImage)}}" alt="" width="60px" height="60px">
            @endif
        </div>

        <div class="p-1 text-center">
            <span class="bd-menu-user-panel-user">{{ Auth::user()->username }}</span>
            <p class="bd-menu-user-panel-email">{{ Auth::user()->email->asString() }}</p>
        </div>
    </div>
    <div class="my-4">
        <!-- <div class="bd-menu-listings mb-3">
            <i class="fas fa-th-list"></i> <a href="#"> LISTINGS</a>
        </div>
        <div class="bd-menu-resources mb-3">
            <i class="fas fa-dog"></i><a href="#"> RESOURCES</a>
        </div>
        <div class="bd-menu-litters mb-3">
            <i class="fas fa-paw"></i><a href="#"> LITTERS</a>
        </div> -->

        <div id="accordion">
            <div class="card border-0 pb-2">
                <div class="card-header p-0 bg-white border-0" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-collapse p-0 d-block collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-th-list"></i> &emsp;  LISTINGS
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <ul>
                            <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/studs')}}/1">Studs</a></li>
                            <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/puppies')}}/1">Puppies</a></li>
                            <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/litters')}}/1">Litters</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @if(\Illuminate\Support\Facades\Auth::user()->role == new \App\Domain\Entities\Enums\UserRoleEnum('breeder'))
            <div class="card border-0 pb-2">
                <div class="card-header p-0 bg-white border-0" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-collapse p-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-dog"></i> &emsp;  RESOURCES
                        </button>
                    </h5>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <ul>
                            <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/resources/breeder-supplies')}}/1">Breeder Supplies</a></li>
                            <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/resources/canine-genetics')}}/1">Cannie Genetics</a></li>
                            <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/resources/canine-nutrition')}}/1">Cannie Nutrition</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            <div class="card border-0 pb-2">
                <div class="card-header p-0 bg-white border-0" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-collapse p-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <i class="fas fa-paw"></i> &emsp;  Saved Items
                        </button>
                    </h5>
                </div>

                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <ul>
                            <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-studs')}}/1">Saved Studs</a></li>
                            <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-puppy')}}/1">Saved Puppies</a></li>
                            <li><a href="{{\Illuminate\Support\Facades\URL::to('dashboard/saved-litters')}}/1">Saved Litters</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card border-0 pb-2">
                <div class="card-header p-0 bg-white border-0" id="headingThree">
                    <h5 class="mb-0">
                        <button onclick="window.location = '{{\Illuminate\Support\Facades\URL::to('dashboard/saved-search')}}/1'" class="btn btn-collapse p-0 collapsed" aria-expanded="false">
                            <i class="fas fa-history"></i> &emsp;  Search History
                        </button>
                    </h5>
                </div>
            </div>
        </div>


    </div>
</div>
