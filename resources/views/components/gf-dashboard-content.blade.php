<div class="gf-dashboard-content col-xl-10 col-lg-9">
    <div class="container-fluid p-0">
        <div class="row pt-lg-0">
            <?php
            $allListings = app(\App\Http\Controllers\ListingsController::class)->allListingsofCurrentUser();
            $totalPuppies = 0;
            $totalStuds = 0;
            foreach ($allListings as $listing){
                if($listing->type->getValue() == 'puppy'){
                    $totalPuppies++;
                }elseif ($listing->type->getValue() == 'stud'){
                    $totalStuds++;
                }
            }

            $countofAllLitters = app(\App\Http\Controllers\LittersController::class)->allLittersofCurrentUser();

            $countofAllBreederResources = app(\App\Http\Controllers\BreederSuppliesController::class)->getallCurrentBreederResources();
            $countofAllCanineGenetics = app(\App\Http\Controllers\CanineGeneticsController::class)->getallCurrentBreederCanineGenetics();
            $countofAllCanineNutrition = app(\App\Http\Controllers\CanineNutritionController::class)->getallCurrentBreederCanineNutrition();
            $totalResources = $countofAllBreederResources+$countofAllCanineGenetics+$countofAllCanineNutrition;
            ?>

            <div class="col-md-3 p-0 px-md-1 py-1">
                <div class="gf-breeder-db-main-card first">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-6">
                            <p>{{$totalPuppies}}</p>
                            <span>Puppies</span>
                        </div>

                        <div class="col-6 gf-breeder-db-main-card-icon d-flex justify-content-center">
                            <i class="fas fa-dog"></i>
                        </div>
                    </div>
                    <div class="gf-breeder-db-card-bottom text-center">
                        <a href="{{\Illuminate\Support\Facades\URL::to('dashboard/puppies')}}/1">More Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 p-0 px-md-1 py-1">
                <div class="gf-breeder-db-main-card second">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-6">
                            <p>{{$countofAllLitters}}</p>
                            <span>Litters</span>
                        </div>

                        <div class="col-6 gf-breeder-db-main-card-icon d-flex justify-content-center">
                            <i class="fas fa-paw"></i>
                        </div>
                    </div>
                    <div class="gf-breeder-db-card-bottom text-center">
                        <a href="{{\Illuminate\Support\Facades\URL::to('dashboard/litters')}}/1">More Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 p-0 px-md-1 py-1">
                <div class="gf-breeder-db-main-card third">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-6">
                            <p>{{$totalStuds}}</p>
                            <span>Studs</span>
                        </div>

                        <div class="col-6 gf-breeder-db-main-card-icon d-flex justify-content-center">
                            <i class="fas fa-bone"></i>
                        </div>
                    </div>
                    <div class="gf-breeder-db-card-bottom text-center">
                        <a href="{{\Illuminate\Support\Facades\URL::to('dashboard/studs')}}/1">More Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 p-0 px-md-1 py-1">
                <div class="gf-breeder-db-main-card fourth">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-6">
                            <p>{{$totalResources}}</p>
                            <span>Resources</span>
                        </div>

                        <div class="col-6 gf-breeder-db-main-card-icon d-flex justify-content-center">
                            <i class="fas fa-hat-wizard"></i>
                        </div>
                    </div>
                    <div class="gf-breeder-db-card-bottom text-center">
                        <a href="{{\Illuminate\Support\Facades\URL::to('dashboard/resources/breeder-supplies')}}/1">More Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row pt-lg-0">
            @if(empty($allListings))

            @else
                <table class="bd-content-table table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Kennel</th>
                        <th>Sex</th>
                        <th>Image</th>
                        <th>Preference</th>
                        <th>Status</th>
                    </tr>
                    </thead>`
                    <tbody>
                    @foreach($allListings as $puppy)
                        <tr>
                            <td>{{$puppy->title}}</td>
                            <td>{{$puppy->breeder->kennelName}} , {{$puppy->breeder->city}} , {{$puppy->breeder->zip}}</td>
                            <td>{{ucfirst($puppy->sex->getValue())}}</td>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>


</div>
