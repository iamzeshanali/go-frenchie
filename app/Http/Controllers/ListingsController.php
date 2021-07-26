<?php

namespace App\Http\Controllers;

use App\Domain\Entities\Enums\AgoutiEnum;
use App\Domain\Entities\Enums\BlueEnum;
use App\Domain\Entities\Enums\BrindleEnum;
use App\Domain\Entities\Enums\ChocolateEnum;
use App\Domain\Entities\Enums\E_mcirEnum;
use App\Domain\Entities\Enums\FluffyEnum;
use App\Domain\Entities\Enums\IntensityEnum;
use App\Domain\Entities\Enums\ListingsSexEnum;
use App\Domain\Entities\Enums\ListingsStatusEnum;
use App\Domain\Entities\Enums\ListingsTypeEnum;
use App\Domain\Entities\Enums\MerleEnum;
use App\Domain\Entities\Enums\PiedEnum;
use App\Domain\Entities\Enums\TestableChocolateEnum;
use App\Domain\Entities\Listings;
use App\Domain\Entities\SavedSearch;
use App\Domain\Services\Persistence\IListingsRepository;
use App\Domain\Services\Persistence\ISavedSearchRepository;
use Dms\Common\Structure\DateTime\Date;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\Enum;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Jorenvh\Share\Share;
use Jorenvh\Share\ShareFacade;


class ListingsController extends Controller
{

    public $listingsRepository;
    public $savedSearchRepository;

    public $token = '3QRH1yb6zYyiwCEizx4Wv4tdqNhWAmU0aq8M5w7SwPgdvEAWCbmXrI4aV3KNaNG2';

    public function __construct(IListingsRepository $listingsRepository, ISavedSearchRepository $savedSearchRepository)
    {
        $this->listingsRepository = $listingsRepository;
        $this->savedSearchRepository = $savedSearchRepository;
    }

    public function showAllSavedSearchedPuppy()
    {
        $savedSearch = $this->savedSearchRepository->matching(
            $this->savedSearchRepository->criteria()
            ->where(SavedSearch::USER, '=', Auth::user())
            ->where(SavedSearch::TYPE, '=', 'puppy')
        );
        return $savedSearch;
    }
    public function showAllSavedSearchedStuds()
    {
        $savedSearch = $this->savedSearchRepository->matching(
            $this->savedSearchRepository->criteria()
                ->where(SavedSearch::USER, '=', Auth::user())
                ->where(SavedSearch::TYPE, '=', 'stud')
        );
        return $savedSearch;
    }


    /**
     * Displays all the PUPPIES.
     *
     * @return \Illuminate\Http\Response
     */

    public function showPuppies()
    {
        $sponsoredPuppies = [];
        $standardPuppies = [];
        $user = Auth::user();


        $shareComponent = ShareFacade::page(
            URL::current(),
            'The French BullDog',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();

        $allPuppies = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::TYPE,'=',new ListingsTypeEnum('puppy'))
                ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                ->orderByAsc(Listings::ID)
                ->limit(5)
        );


        foreach ($allPuppies as $fp) {
            if($fp->isSponsored){
                array_push($sponsoredPuppies,$fp);
            }else{
                array_push($standardPuppies,$fp);
            }
        }

        $dataIds = [];
        foreach ($allPuppies as $list){
            array_push($dataIds, $list->getId());
        }
        if(Session::has('ids')){
            Session::forget('ids');
            Session::put('ids',$dataIds);
        }else{
            Session::put('ids',$dataIds);
        }

        return view('pages/puppy_listing', [
            'sponsoredPuppies' => $sponsoredPuppies,
            'standardPuppies' => $standardPuppies,
            'data' => null,
            'dataIds' => $dataIds,
            'matched' => false,
            'shareComponent' => $shareComponent,
            'page'=>1
        ]);
    }

    /**
     * Displays all the STUDS.
     *
     * @return \Illuminate\Http\Response
     */

    public function showStuds()
    {
        $sponsoredPuppies = [];
        $standardPuppies = [];
        $user = Auth::user();
        $shareComponent = ShareFacade::page(
            URL::current(),
            'The French BullDog',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();
        $allStuds = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::TYPE,'=',new ListingsTypeEnum('stud'))
                ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                ->orderByAsc(Listings::ID)
        );

        foreach ($allStuds as $st) {
            if($st->isSponsored){
                array_push($sponsoredPuppies,$st);
            }else{
                array_push($standardPuppies,$st);
            }
        }

        $dataIds = [];
        foreach ($allStuds as $list){
            array_push($dataIds, $list->getId());
        }
        if(Session::has('ids')){
            Session::forget('ids');
            Session::put('ids',$dataIds);
        }else{
            Session::put('ids',$dataIds);
        }

        return view('pages/stud_listing', [
            'sponsoredPuppies' => $sponsoredPuppies,
            'standardPuppies' => $standardPuppies,
            'data' => null,
            'dataIds' => $dataIds,
            'matched' => false
        ]);
    }

    /**
     * Displays all the PUPPIES in Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPuppiesInDashboard(Request $request)
    {
        $page = !empty($request['page']) ? (int)$request['page'] : 1;
//        dd($page);
        $totalPuppies = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::BREEDER,'=',Auth::user())
                ->where(Listings::TYPE,'=',new ListingsTypeEnum('puppy'))
                ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                ->where(Listings::TRASHED,'=',false)
        );
        $Puppies = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::BREEDER,'=',Auth::user())
                ->where(Listings::TYPE,'=',new ListingsTypeEnum('puppy'))
                ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                ->where(Listings::TRASHED,'=',false)
                ->orderByAsc(Listings::ID)
                ->skip(((int) $page - 1) * 5)->limit(5)
        );
//        dd($Puppies);
        return view('pages/dashboard/listings/puppies/show-puppies', [
            'Puppies' => $Puppies,
            'total'=>count($totalPuppies),
            'page'=>$page
        ]);
    }

    /**
     * Displays all the STUDS in Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStudsInDashboard(Request $request)
    {
        $page = $request->page;
        $totalStuds = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::BREEDER,'=',Auth::user())
                ->where(Listings::TYPE,'=',new ListingsTypeEnum('stud'))
                ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                ->where(Listings::TRASHED,'=',false)
        );
        $Studs = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::BREEDER,'=',Auth::user())
                ->where(Listings::TYPE,'=',new ListingsTypeEnum('stud'))
                ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                ->where(Listings::TRASHED,'=',false)
                ->orderByAsc(Listings::ID)
                ->skip(((int) $page - 1) * 5)->limit(5)
        );
//        dd($Puppies);
        return view('pages/dashboard/listings/studs/show-studs', [
            'Puppies' => $Studs,
            'total'=>count($totalStuds),
            'page'=>$page
        ]);
    }


    public function searchDNACoat(Request $request)
    {
        $dnaColor = $request->get('dnaColor');
//        return response()->json(['success'=>$request->get('dnaColor')]);
        $coatValues = [];
        switch ($dnaColor) {
            case "Blue":
                $blueEnumValues = \App\Domain\Entities\Enums\BlueEnum::getAll();
                $coatValues = $blueEnumValues;
                break;
            case "Chocolate":
                $chocolateEnumValues = \App\Domain\Entities\Enums\ChocolateEnum::getAll();
                $coatValues = $chocolateEnumValues;
                break;
            case "Testable_Chocolate":
                $testableChocolateEnumValues = \App\Domain\Entities\Enums\TestableChocolateEnum::getAll();
                $coatValues = $testableChocolateEnumValues;
                break;
            case "Fluffy":
                $fluffyEnumValues = \App\Domain\Entities\Enums\FluffyEnum::getAll();
                $coatValues = $fluffyEnumValues;
                break;
            case "Intensity":
                $intensityEnumValues = \App\Domain\Entities\Enums\IntensityEnum::getAll();
                $coatValues = $intensityEnumValues;
                break;
            case "Pied":
                $piedEnumValues = \App\Domain\Entities\Enums\PiedEnum::getAll();
                $coatValues = $piedEnumValues;
                break;
            case "Merle":
                $merleEnumValues = \App\Domain\Entities\Enums\MerleEnum::getAll();
                $coatValues = $merleEnumValues;
                break;
            case "Brindle":
                $brindleEnumValues = \App\Domain\Entities\Enums\BrindleEnum::getAll();
                $coatValues = $brindleEnumValues;
                break;
        }

        $coatData = view('pages/coat-data')
            ->with(
                compact('coatValues')
            )->render();
//
        $matched = false;
//        return response()->json(['success'=>count($sponsoredPuppies)]);
        return response()->json(['success'=>'200','html'=>$coatData]);

    }

    /**
     * Displays Single Puppy based on the unique slug.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSinglePuppy($slug){

        $singlePuppy = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::SLUG,'=',$slug)
                ->orderByAsc(Listings::ID)
        );

//        dd($singlePuppy);
        if(empty($singlePuppy)){

        }else{
            return view('pages/single-listing', [
               'puppy' => $singlePuppy[0]
            ]);
        }
    }

    /**
     * Displays Single Puppy based on the unique slug.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSingleStud($slug){

        $singlePuppy = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::SLUG,'=',$slug)
                ->orderByAsc(Listings::ID)
        );

//        dd($singlePuppy);
        if(empty($singlePuppy)){

        }else{
            return view('pages/single-listing', [
                'puppy' => $singlePuppy[0]
            ]);
        }
    }

    /**
     * Edit Single PUPPY based on the unique slug.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPuppy($slug){
        $singlePuppy = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::SLUG,'=',$slug)
                ->orderByAsc(Listings::ID)
        )[0];
        if(empty($singlePuppy)){

        }else{
//            dd($singlePuppy);
            return view('pages/dashboard/listings/puppies/add-puppies', [
                'puppy' => $singlePuppy
            ]);
        }
    }

    /**
     * Displays Single STUD based on the unique slug.
     *
     * @return \Illuminate\Http\Response
     */
    public function editStud($slug){
        $singlePuppy = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::SLUG,'=',$slug)
                ->orderByAsc(Listings::ID)
        )[0];
        if(empty($singlePuppy)){

        }else{
//            dd($singlePuppy);
            return view('pages/dashboard/listings/studs/add-studs', [
                'puppy' => $singlePuppy
            ]);
        }
    }

    /**
     * Create new Listings.
     *
     * @return \Illuminate\Http\Response
     */
    public function createListings(Request $request){


//        dd($request->all());
        $puppy = new Listings();
        $puppy->breeder = Auth::user();
        $puppy->title = $request->get('title');
        $title = str_replace(' ','-', strtolower($puppy->title));
        $allListings = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::TITLE,'=', $request->get('title'))
                ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                ->orderByAsc(Listings::ID)
        );
        if(count($allListings) > 0) {
            $puppy->slug = $title . '-' . count($allListings);
        }else{
            $puppy->slug = $title;
        }
        $puppy->decription = $request->get('listing-description');
        $puppy->type = new ListingsTypeEnum( $request->get('type'));
        $puppy->status = new ListingsStatusEnum('inactive');
//        dd((bool)$request->sponsored);
        $puppy->isSponsored = (bool)$request->sponsored;
        $puppy->sex = new ListingsSexEnum($request->get('listing-sex'));
        $date = explode('-', $request->get('dob'));
        $puppy->dob = new Date($date[0], $date[1], $date[2]);
        $puppy->trashed = (bool)"0";

        $file1 =$request->file('photo1');
        $fullPath1 = $file1->move(public_path('app/listings'), $file1->getClientOriginalName())->getRealPath();
        $puppy->photo1 = new Image($fullPath1);

        $file2 =$request->file('photo2');
        $fullPath2 = $file2->move(public_path('app/listings'), $file2->getClientOriginalName())->getRealPath();
        $puppy->photo2 = new Image($fullPath2);

        $file3 =$request->file('photo3');
        $fullPath3 = $file3->move(public_path('app/listings'), $file3->getClientOriginalName())->getRealPath();
        $puppy->photo3 = new Image($fullPath3);

        $file4 =$request->file('photo4');
        $fullPath4 = $file4->move(public_path('app/listings'), $file4->getClientOriginalName())->getRealPath();
        $puppy->photo4 = new Image($fullPath4);

        $file5 =$request->file('photo5');
        $fullPath5 = $file5->move(public_path('app/listings'), $file5->getClientOriginalName())->getRealPath();
        $puppy->photo5 = new Image($fullPath5);

//        dd($request->get('listing-blue'));
        if ($request->get('listing-blue') == 'none'){
            $puppy->blue = null;
        }else{
            $puppy->blue = new BlueEnum($request->get('listing-blue'));
        }

        if ($request->get('listing-choclote') == 'none'){
            $puppy->blue = null;
        }else{
            $puppy->chocolate = new ChocolateEnum($request->get('listing-choclote'));
        }

        if ($request->get('listing-agoutie') == 'none'){
            $puppy->blue = null;
        }else{
            $puppy->agouti = new AgoutiEnum($request->get('listing-agoutie'));
        }

        if ($request->get('listing-testable') == 'none'){
            $puppy->blue = null;
        }else{
            $puppy->testableChocolate = new TestableChocolateEnum($request->get('listing-testable'));
        }

        if ($request->get('listing-fluffy') == 'none'){
            $puppy->blue = null;
        }else{
            $puppy->fluffy = new FluffyEnum($request->get('listing-fluffy'));
        }

        if ($request->get('listing-emcir') == 'none'){
            $puppy->blue = null;
        }else{
            $puppy->eMcir = new E_mcirEnum($request->get('listing-emcir'));
        }

        if ($request->get('listing-intensity') == 'none'){
            $puppy->blue = null;
        }else{
            $puppy->intensity = new IntensityEnum($request->get('listing-intensity'));
        }

        if ($request->get('listing-pied') == 'none'){
            $puppy->blue = null;
        }else{
            $puppy->pied = new PiedEnum($request->get('listing-pied'));
        }

        if ($request->get('listing-brindle') == 'none'){
            $puppy->blue = null;
        }else{
            $puppy->brindle = new BrindleEnum($request->get('listing-brindle'));
        }

        if ($request->get('listing-merle') == 'none'){
            $puppy->blue = null;
        }else{
            $puppy->merle = new MerleEnum($request->get('listing-merle'));
        }

//        dd($puppy);
        $this->listingsRepository->save($puppy);
        if ($request->get('type') == 'stud'){
            return redirect()->route('showAllStuds',1);
        }
        else{
            return redirect()->route('showAllPuppies',1);
        }

    }

    /**
     * Update the Listing based on the unique slug.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateListings(Request $request){
//        dd($request->get('id'));
        $singleListing = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()->where(
                Listings::ID, '=', (int)$request->get('id')
            )
        );

        if(empty($singleListing)){
            return redirect()->back()->with('message', 'No Such Listing Exist');
        }else{

            $singleListing[0]->breeder = Auth::user();
            $singleListing[0]->title = $request->get('title');
            $singleListing[0]->decription = $request->get('listing-description');
//            dd((bool)$request->input('sponsored'));
            $singleListing[0]->isSponsored = (bool)$request->sponsored;
            $singleListing[0]->sex = new ListingsSexEnum($request->get('listing-sex'));
            $date = explode('-', $request->get('dob'));
            $singleListing[0]->dob = new Date($date[0], $date[1], $date[2]);


            $file1 =$request->file('photo1');
            if ($file1 == null){
                $fullPath1 = $request->get('photo1_name');
                $fullPath1 = substr_replace($fullPath1, 'public/app/listings', 44, 6);
            }else{
                $fullPath1 = $file1->move(public_path('app/listings'), $file1->getClientOriginalName())->getRealPath();
            }
            $singleListing[0]->photo1 = new Image($fullPath1);

            $file2 =$request->file('photo2');
            if ($file2 == null){
                $fullPath2 = $request->get('photo2_name');
                $fullPath2 = substr_replace($fullPath2, 'public/app/listings', 44, 6);
            }else{
                $fullPath2 = $file2->move(public_path('app/listings'), $file2->getClientOriginalName())->getRealPath();
            }
            $singleListing[0]->photo2 = new Image($fullPath2);

            $file3 =$request->file('photo3');
            if ($file3 == null){
                $fullPath3 = $request->get('photo3_name');
                $fullPath3 = substr_replace($fullPath3, 'public/app/listings', 44, 6);
            }else{
                $fullPath3 = $file3->move(public_path('app/listings'), $file3->getClientOriginalName())->getRealPath();
            }
            $singleListing[0]->photo3 = new Image($fullPath3);


            $file4 =$request->file('photo4');
            if ($file4 == null){
                $fullPath4 = $request->get('photo4_name');
                $fullPath4 = substr_replace($fullPath4, 'public/app/listings', 44, 6);
            }else{
                $fullPath4 = $file4->move(public_path('app/listings'), $file4->getClientOriginalName())->getRealPath();
            }
            $singleListing[0]->photo4 = new Image($fullPath4);

            $file5 =$request->file('photo5');
            if ($file5 == null){
                $fullPath5 = $request->get('photo5_name');
                $fullPath5 = substr_replace($fullPath5, 'public/app/listings', 44, 6);
            }else{
                $fullPath5 = $file5->move(public_path('app/listings'), $file5->getClientOriginalName())->getRealPath();
            }
            $singleListing[0]->photo5 = new Image($fullPath5);

            if ($request->get('listing-blue') == 'none'){
                $singleListing[0]->blue = null;
            }else{
                $singleListing[0]->blue = new BlueEnum($request->get('listing-blue'));
            }

            if ($request->get('listing-choclote') == 'none'){
                $singleListing[0]->blue = null;
            }else{
                $singleListing[0]->chocolate = new ChocolateEnum($request->get('listing-choclote'));
            }

            if ($request->get('listing-agoutie') == 'none'){
                $singleListing[0]->blue = null;
            }else{
                $singleListing[0]->agouti = new AgoutiEnum($request->get('listing-agoutie'));
            }

            if ($request->get('listing-testable') == 'none'){
                $singleListing[0]->blue = null;
            }else{
                $singleListing[0]->testableChocolate = new TestableChocolateEnum($request->get('listing-testable'));
            }

            if ($request->get('listing-fluffy') == 'none'){
                $singleListing[0]->blue = null;
            }else{
                $singleListing[0]->fluffy = new FluffyEnum($request->get('listing-fluffy'));
            }

            if ($request->get('listing-emcir') == 'none'){
                $singleListing[0]->blue = null;
            }else{
                $singleListing[0]->eMcir = new E_mcirEnum($request->get('listing-emcir'));
            }

            if ($request->get('listing-intensity') == 'none'){
                $singleListing[0]->blue = null;
            }else{
                $singleListing[0]->intensity = new IntensityEnum($request->get('listing-intensity'));
            }

            if ($request->get('listing-pied') == 'none'){
                $singleListing[0]->blue = null;
            }else{
                $singleListing[0]->pied = new PiedEnum($request->get('listing-pied'));
            }

            if ($request->get('listing-brindle') == 'none'){
                $singleListing[0]->blue = null;
            }else{
                $singleListing[0]->brindle = new BrindleEnum($request->get('listing-brindle'));
            }

            if ($request->get('listing-merle') == 'none'){
                $singleListing[0]->blue = null;
            }else{
                $singleListing[0]->merle = new MerleEnum($request->get('listing-merle'));
            }
//            dd($singleListing[0]);
            $this->listingsRepository->save($singleListing[0]);
            if ($request->get('type') == 'stud'){
                return redirect()->route('showAllStuds');
            }
            else{
                return redirect()->route('showAllPuppies');
            }
        }
    }

    /**
     * Display the searched listings.
     *
     * @return Listings
     */

    public function findListings(Request $request){
        $type = $request->get('type');
        $requestType = $request->get('requestType');
        $dnaColor = $request->get('dnaColor');
        $dnaCoat = $request->get('dnaCoat');
        $zipCode = $request->get('zip');
        $responseType = 'radius.json';
        $distance = '10';
        $unit = 'km';

        $kennels = app('App\Http\Controllers\GeoLocationController')->findKennels($this->token, $responseType, $zipCode, $distance, $unit);
//        dd($kennels);

        if(Auth::user()){
            if (isset($kennels)){
                $previousSavedSearch = $this->savedSearchRepository->matching(
                    $this->savedSearchRepository->criteria()
                        ->where(SavedSearch::USER, '=', Auth::user())
                );
                if (count($previousSavedSearch) > 4){
                    $this->savedSearchRepository->remove($previousSavedSearch[0]);
                }
                $savedSearch = new SavedSearch();
                $savedSearch->user = Auth::user();
                $savedSearch->dnaColor = $dnaColor;
                $savedSearch->dnaCoat = $dnaCoat;
                $savedSearch->zip = $zipCode;
                $savedSearch->type = $type;

                $this->savedSearchRepository->save($savedSearch);
            }
        }


        $allPuppies = [];
        $allListings = [];
        $finalPuppies = [];
        $standardPuppies = [];
        $sponsoredPuppies = [];

        if($type == 'all'){
            foreach ($kennels as $key=>$breeder){

                $allListings = $this->listingsRepository->matching(

                    $this->listingsRepository->criteria()
                        ->where(Listings::BREEDER,'=',$breeder[0])
                        ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                        ->orderByAsc(Listings::ID)
                );
                foreach ($allListings as $listing){
                    array_push($allPuppies, $listing);
                }

            }
        }else{
            foreach ($kennels as $key=>$breeder){

                $allListings = $this->listingsRepository->matching(

                    $this->listingsRepository->criteria()
                        ->where(Listings::BREEDER,'=',$breeder[0])
                        ->where(Listings::TYPE,'=',new ListingsTypeEnum($type))
                        ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                        ->orderByAsc(Listings::ID)
                );
                foreach ($allListings as $listing){
                    array_push($allPuppies, $listing);
                }

            }
        }



//        dd($allPuppies);
        $blueDNAMatch = false;
        switch ($dnaColor) {
            case "Blue":
                foreach ($allPuppies as $puppy){
                    if ($puppy->blue == null){

                    }else{
                        if($dnaCoat == $puppy->blue->getValue()){
                                array_push($finalPuppies,$puppy);
                        }
                    }

                }
                break;
            case "Chocolate":
                foreach ($allPuppies as $puppy){
                    if ($puppy->chocolate == null){

                    }else{
                        if($dnaCoat == $puppy->chocolate->getValue()){
                            array_push($finalPuppies,$puppy);
                        }
                    }

                }
                break;
            case "Testable_Chocolate":
                foreach ($allPuppies as $puppy){
                    if ($puppy->testableChocolate == null){

                    }else{
                        if($dnaCoat == $puppy->testableChocolate->getValue()){
                            array_push($finalPuppies,$puppy);
                        }
                    }
                }
                break;
            case "Fluffy":
                foreach ($allPuppies as $puppy){
                    if ($puppy->fluffy == null){

                    }else{
                        if($dnaCoat == $puppy->fluffy->getValue()){
                            array_push($finalPuppies,$puppy);
                        }
                    }

                }
                break;
            case "Intensity":
                foreach ($allPuppies as $puppy){
                    if ($puppy->intensity == null){

                    }else{
                        if($dnaCoat == $puppy->intensity->getValue()){
                            array_push($finalPuppies,$puppy);
                        }
                    }

                }
                break;
            case "Pied":
                foreach ($allPuppies as $puppy){
                    if ($puppy->pied == null){

                    }else{
                        if($dnaCoat == $puppy->pied->getValue()){
                            array_push($finalPuppies,$puppy);
                        }
                    }

                }
                break;
            case "Merle":
                if($dnaCoat == 'no'){
                    foreach ($allPuppies as $puppy){
                        if($puppy->merle == null){

                        }else{
                            if($puppy->merle->getValue() == $dnaCoat){
                                array_push($finalPuppies,$puppy);
                            }
                        }

                    }
                }else{
                    foreach ($allPuppies as $puppy){
                        array_push($finalPuppies,$puppy);
                    }
                }
                break;
            case "Brindle":
                if($dnaCoat == 'no'){
                    foreach ($allPuppies as $puppy){
                        if($puppy->brindle == null){

                        }else{
                            if($puppy->brindle->getValue() == $dnaCoat){
                                array_push($finalPuppies,$puppy);
                            }
                        }

                    }
                }else{
                    foreach ($allPuppies as $puppy){
                        array_push($finalPuppies,$puppy);
                    }
                }
                break;

        }
//            dd($finalPuppies);
        foreach ($finalPuppies as $fp) {
            if($fp->isSponsored){
                array_push($sponsoredPuppies,$fp);
            }else{
                array_push($standardPuppies,$fp);
            }
        }
        $dataIds = [];
        foreach ($allPuppies as $list){
            array_push($dataIds, $list->getId());
        }
        if(Session::has('ids')){
            Session::forget('ids');
            Session::put('ids',$dataIds);
        }else{
            Session::put('ids',$dataIds);
        }
        $data=  [
            'distance'=>$distance,
            'zip' => $zipCode,
            'dnaColor' => $dnaColor,
            'dnaCoat' => $dnaCoat,
            'allListings' => $allPuppies
        ];
        $shareComponent = ShareFacade::page(
            URL::current(),
            'The French BullDog',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();
//        dd($data['allListings']);
        if($type == 'all'){
            return view('pages/results-listings', [
                'sponsoredPuppies' => $sponsoredPuppies,
                'standardPuppies' => $standardPuppies,
                'data' => $data,
                'matched' => false,
                'shareComponent' => $shareComponent
            ]);

        }elseif($type == 'puppy'){
            if($requestType == 'ajax'){
                $data = null;
                $html = view('pages/puppy-listing-data')->with(compact('sponsoredPuppies','standardPuppies', 'data'))->render();
                return response()->json(['success'=>'Form is successfully submitted!', 'html'=>$html]);
            }else{
                return view('pages/puppy_listing', [
                    'sponsoredPuppies' => $sponsoredPuppies,
                    'standardPuppies' => $standardPuppies,
                    'data' => $data,
                    'matched' => false,
                    'shareComponent' => $shareComponent
                ]);
            }
        }elseif($type == 'stud'){
            if($requestType == 'ajax'){
                $data = null;
                $html = view('pages/puppy-listing-data')->with(compact('sponsoredPuppies','standardPuppies', 'data'))->render();
                return response()->json(['success'=>'Form is successfully submitted!', 'html'=>$html]);
            }else {
                return view('pages/stud_listing', [
                    'sponsoredPuppies' => $sponsoredPuppies,
                    'standardPuppies' => $standardPuppies,
                    'data' => $data,
                    'matched' => false,
                    'shareComponent' => $shareComponent
                ]);
            }

        }


    }
    /**
     * Display the searched  on the basis of zip.
     *
     * @return Listings
     */
    public function filterByZip(Request $request){
        $type = $request->get('type');
        $responseType = 'radius.json';
        $zipCode = $request->get('zip');
        $distance = $request->get('distance');
        $unit = 'mile';

        $kennels = app('App\Http\Controllers\GeoLocationController')->findKennels($this->token, $responseType, $zipCode, $distance, $unit);

        $allListings = [];

        if($type == 'all'){
            foreach ($kennels as $key=>$breeder){
                $allListings = $this->listingsRepository->matching(

                    $this->listingsRepository->criteria()
                        ->where(Listings::BREEDER,'=',$breeder[0])
                        ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                        ->orderByAsc(Listings::ID)
                );
            }
        }else{
            foreach ($kennels as $key=>$breeder){
                $allListings = $this->listingsRepository->matching(

                    $this->listingsRepository->criteria()
                        ->where(Listings::BREEDER,'=',$breeder[0])
                        ->where(Listings::TYPE,'=',new ListingsTypeEnum($request->get('type')))
                        ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                        ->orderByAsc(Listings::ID)
                );
            }

        }

//        return response()->json(['success'=>count($allListings)]);

        $afterFilters = $this->filterByAttributes($allListings, $request);
//        return response()->json(['success'=>count($afterFilters)]);
        $dataIds = [];
        foreach ($allListings as $list){
            array_push($dataIds, $list->getId());
        }
        Session::put('ids',$dataIds);
        $sponsoredPuppies = [];
        $standardPuppies = [];
        foreach ($afterFilters as $af) {
            if($af->isSponsored){
                array_push($sponsoredPuppies,$af);
            }else{
                array_push($standardPuppies,$af);
            }
        }

//        return response()->json(['success'=>$afterFilters[0]->isSponsored]);

        $data = null;
        $html = view('pages/puppy-listing-data')->with(compact('sponsoredPuppies','standardPuppies', 'data'))->render();
        return response()->json(['success'=>'Form is successfully submitted!', 'html'=>$html]);

    }
    /**
     * Filter Listings based on Zip Code and Display the filtered listings.
     *
     * @return Listings
     */
    public function filterByRadius(Request $request){
        $type = $request->get('type');
        $responseType = 'radius.json';
        $distance = $request->get('radius');
        $zipCode = $request->get('zip');
        $unit = 'mile';

        $kennels = app('App\Http\Controllers\GeoLocationController')->findKennels($this->token, $responseType, $zipCode, $distance, $unit);

        $allListings = [];

        if($type == 'all'){
            foreach ($kennels as $key=>$breeder){
                $allListings = $this->listingsRepository->matching(

                    $this->listingsRepository->criteria()
                        ->where(Listings::BREEDER,'=',$breeder[0])
                        ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                        ->orderByAsc(Listings::ID)
                );
            }
        }else{
            foreach ($kennels as $key=>$breeder){
                $allListings = $this->listingsRepository->matching(

                    $this->listingsRepository->criteria()
                        ->where(Listings::BREEDER,'=',$breeder[0])
                        ->where(Listings::TYPE,'=',new ListingsTypeEnum($request->get('type')))
                        ->where(Listings::STATUS,'=',new ListingsStatusEnum('active'))
                        ->orderByAsc(Listings::ID)
                );
            }

        }
//        return response()->json(['success'=>count($allListings)]);

        $afterFilters = $this->filterByAttributes($allListings, $request);
//        return response()->json(['success'=>count($afterFilters)]);
        $dataIds = [];
        foreach ($allListings as $list){
            array_push($dataIds, $list->getId());
        }
        Session::put('ids',$dataIds);
        $sponsoredPuppies = [];
        $standardPuppies = [];
        foreach ($afterFilters as $af) {
            if($af->isSponsored){
                array_push($sponsoredPuppies,$af);
            }else{
                array_push($standardPuppies,$af);
            }
        }

//        return response()->json(['success'=>$afterFilters[0]->isSponsored]);

        $data = null;
        $html = view('pages/puppy-listing-data')->with(compact('sponsoredPuppies','standardPuppies', 'data'))->render();
        return response()->json(['success'=>'Form is successfully submitted!', 'html'=>$html]);

    }

    /**
     * Filter Listings based on the given DNA Attributes and return the filtered listings.
     *
     * @return Listings
     */
    public function filterByAttributes($listingsData, $request){

        $blue = $request->get('blue');
        $chocolate = $request->get('chocolate');
        $testable = $request->get('testable');
        $fluffy = $request->get('fluffy');
        $intensity = $request->get('intensity');
        $pied = $request->get('pied');
        $merle = $request->get('merle');
        $brindle = $request->get('brindle');
        $agouti = $request->get('agouti');
        $emcir = $request->get('emcir');
        $results = $listingsData;


        $afterFilters = [];
        if(!empty($blue)){
            $afterFilters = $this->innerResult('blue',$blue,$results);

            if(!empty($chocolate)){
                $afterFilters = $this->innerResult('chocolate',$chocolate,$afterFilters);
            }
            if(!empty($testable)){
                $afterFilters = $this->innerResult('testable',$testable,$afterFilters);
            }
            if(!empty($fluffy)){
                $afterFilters = $this->innerResult('fluffy',$fluffy,$afterFilters);
            }
            if(!empty($intensity)){
                $afterFilters = $this->innerResult('intensity',$intensity,$afterFilters);
            }
            if(!empty($pied)){
                $afterFilters = $this->innerResult('pied',$pied,$afterFilters);
            }
            if(!empty($merle)){
                $afterFilters = $this->innerResult('merle',$merle,$afterFilters);
            }
            if(!empty($brindle)){
                $afterFilters = $this->innerResult('brindle',$brindle,$afterFilters);
            }
            return $afterFilters;
        }

        elseif (!empty($chocolate)){
            $afterFilters = $this->innerResult('chocolate',$chocolate,$results);
            if(!empty($testable)){
                $afterFilters = $this->innerResult('testable',$testable,$afterFilters);
            }
            if(!empty($fluffy)){
                $afterFilters = $this->innerResult('fluffy',$fluffy,$afterFilters);
            }
            if(!empty($intensity)){
                $afterFilters = $this->innerResult('intensity',$intensity,$afterFilters);
            }
            if(!empty($pied)){
                $afterFilters = $this->innerResult('pied',$pied,$afterFilters);
            }
            if(!empty($merle)){
                $afterFilters = $this->innerResult('merle',$merle,$afterFilters);
            }
            if(!empty($brindle)){
                $afterFilters = $this->innerResult('brindle',$brindle,$afterFilters);
            }
            return $afterFilters;
        }elseif (!empty($testable)){
            $afterFilters = $this->innerResult('testable',$testable,$results);
            if(!empty($fluffy)){
                $afterFilters = $this->innerResult('fluffy',$fluffy,$afterFilters);
            }
            if(!empty($intensity)){
                $afterFilters = $this->innerResult('intensity',$intensity,$afterFilters);
            }
            if(!empty($pied)){
                $afterFilters = $this->innerResult('pied',$pied,$afterFilters);
            }
            if(!empty($merle)){
                $afterFilters = $this->innerResult('merle',$merle,$afterFilters);
            }
            if(!empty($brindle)){
                $afterFilters = $this->innerResult('brindle',$brindle,$afterFilters);
            }
            return $afterFilters;
        }elseif (!empty($fluffy)){
            $afterFilters = $this->innerResult('fluffy',$fluffy,$results);
            if(!empty($intensity)){
                $afterFilters = $this->innerResult('intensity',$intensity,$afterFilters);
            }
            if(!empty($pied)){
                $afterFilters = $this->innerResult('pied',$pied,$afterFilters);
            }
            if(!empty($merle)){
                $afterFilters = $this->innerResult('merle',$merle,$afterFilters);
            }
            if(!empty($brindle)){
                $afterFilters = $this->innerResult('brindle',$brindle,$afterFilters);
            }
            return $afterFilters;
        }elseif (!empty($intensity)){
            $afterFilters = $this->innerResult('intensity',$intensity,$results);
            if(!empty($pied)){
                $afterFilters = $this->innerResult('pied',$pied,$afterFilters);
            }
            if(!empty($merle)){
                $afterFilters = $this->innerResult('merle',$merle,$afterFilters);
            }
            if(!empty($brindle)){
                $afterFilters = $this->innerResult('brindle',$brindle,$afterFilters);
            }
            return $afterFilters;
        }elseif (!empty($pied)){
            $afterFilters = $this->innerResult('pied',$pied,$results);
            if(!empty($merle)){
                $afterFilters = $this->innerResult('merle',$merle,$afterFilters);
            }
            if(!empty($brindle)){
                $afterFilters = $this->innerResult('brindle',$brindle,$afterFilters);
            }
            return $afterFilters;
        }elseif (!empty($merle)){
            $afterFilters = $this->innerResult('merle',$merle,$results);
            if(!empty($brindle)){
                $afterFilters = $this->innerResult('brindle',$brindle,$afterFilters);
            }
            return $afterFilters;
        }
        elseif (!empty($brindle)){
            $afterFilters = $this->innerResult('brindle',$brindle,$results);
            return $afterFilters;
        }else{
            return $results;
        }

    }

    /**
     * It takes the filter Parameters and return the filtered listings.
     *
     * @return Listings
     */
    public function innerResult(String $name, $color, $data){
        $finalValue = [];
        switch ($name){
            case 'blue':
                foreach ($color as $value)
                {
                    foreach ($data as $list)
                    {
                        if(!empty($list->blue)){
                            if($value == ($list->blue->getValue())){
                                array_push($finalValue,$list);
                            }
                        }
                    }
                }
                break;
            case 'chocolate':
                foreach ($color as $value)
                {
                    foreach ($data as $list)
                    {
                        if(!empty($list->chocolate)){
                            if($value == ($list->chocolate->getValue())){
                                array_push($finalValue,$list);
                            }
                        }
                    }
                }
                break;
            case 'testable':
                foreach ($color as $value)
                {
                    foreach ($data as $list)
                    {
                        if(!empty($list->testableChocolate)){
                            if($value == ($list->testableChocolate->getValue())){
                                array_push($finalValue,$list);
                            }
                        }
                    }
                }
                break;
            case 'fluffy':
                foreach ($color as $value)
                {
                    foreach ($data as $list)
                    {
                        if(!empty($list->fluffy)){
                            if($value == ($list->fluffy->getValue())){
                                array_push($finalValue,$list);
                            }
                        }
                    }
                }
                break;
            case 'intensity':
                foreach ($color as $value)
                {
                    foreach ($data as $list)
                    {
                        if(!empty($list->intensity)){
                            if($value == ($list->intensity->getValue())){
                                array_push($finalValue,$list);
                            }
                        }
                    }
                }
                break;
            case 'pied':
                foreach ($color as $value)
                {
                    foreach ($data as $list)
                    {
                        if(!empty($list->pied)){
                            if($value == ($list->pied->getValue())){
                                array_push($finalValue,$list);
                            }
                        }
                    }
                }
                break;
            case 'merle':
                foreach ($color as $value)
                {
                    if($value == 'no'){
                        $finalValue = [];
                        foreach ($data as $list)
                        {
                            if(!empty($list->merle)){
                                if($value == ($list->merle->getValue())){
                                    array_push($finalValue,$list);
                                }
                            }
                        }
                    }else {
                        $finalValue = [];
                        $finalValue = $data;
                    }
                }
                break;
            case 'brindle':
                foreach ($color as $value)
                {
                    if($value == 'no'){
                        foreach ($data as $list)
                        {
                            if(!empty($list->brindle)){
                                if($value == ($list->brindle->getValue())){
                                    array_push($finalValue,$list);
                                }
                            }
                        }
                    }else {
                        $finalValue = [];
                        $finalValue = $data;
                    }
                }
                break;
        }
        return $finalValue;

    }

    /**
     * Filter Listings and Displays listings.
     *
     * @return Listings
     */
    public function filterPuppies(Request $request){

        $resultListingsIds = Session::get('ids');
//        return response()->json(['success'=>count($resultListingsIds)]);
        $results = [];
        foreach ($resultListingsIds as $ids){
            $temp = $this->listingsRepository->tryGet((int)$ids);
            array_push($results,$temp);
        }
//        return response()->json(['success'=>count($results)]);
//        return response()->json(['success'=>$results[4]->title]);
        $afterFilters = [];
        $afterFilters = $this->filterByAttributes($results,$request);
//        return response()->json(['success'=>count($afterFilters)]);
        $sponsoredPuppies = [];
        $standardPuppies = [];

        foreach ($afterFilters as $af) {
            if($af->isSponsored){
                array_push($sponsoredPuppies,$af);
            }else{
                array_push($standardPuppies,$af);
            }
        }

//        return response()->json(['success'=>$afterFilters[0]->isSponsored]);

        $data = null;
        $blue = $request->get('blue');
        $chocolate = $request->get('chocolate');
        $testable = $request->get('testable');
        $fluffy = $request->get('fluffy');
        $intensity = $request->get('intensity');
        $pied = $request->get('pied');
        $merle = $request->get('merle');
        $brindle = $request->get('brindle');
//        return response()->json(['success'=>count($sponsoredPuppies)]);
        $recentSearch = view('pages/recent-search-data')
            ->with(
            compact('blue','chocolate','testable','fluffy','intensity','pied','merle','brindle')
            )->render();
//        return response()->json(['success'=>count($sponsoredPuppies)]);
        $matched = false;
        $html = view('pages/puppy-listing-data')->with(compact('sponsoredPuppies','standardPuppies', 'data','matched'))->render();
//        return response()->json(['success'=>count($sponsoredPuppies)]);
        return response()->json(['success'=>'Form is successfully submitted!', 'html'=>$html, 'recentSearch'=>$recentSearch]);
    }



    /**
     * It Soft Deletes the provided listing.
     *
     * @return Listings
     */
    public function trashListings($slug)
    {
        $singleListing = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::SLUG,'=',$slug)
        );

        if(empty($singleListing)){

        }else{
            $singleListing[0]->trashed = true;
            $this->listingsRepository->save($singleListing[0]);
            return redirect()->back();
        }
    }

    /**
     * It shows all the Soft Deleted PUPPIES.
     *
     * @return Listings
     */
    public function showTrashedPuppies()
    {
//        dd("JKSFHJDFG");
        $Puppies = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::TRASHED,'=',true)
                ->where(Listings::TYPE,'=',new ListingsTypeEnum('puppy'))
                ->orderByAsc(Listings::ID)
        );
        return view('pages/dashboard/listings/puppies/recycle-puppies', [
            'Puppies' => $Puppies,
        ]);

    }

    /**
     * It shows all the Soft Deleted STUDS.
     *
     * @return Listings
     */
    public function showTrashedStuds()
    {
        $Puppies = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::TRASHED,'=',true)
                ->where(Listings::TYPE,'=',new ListingsTypeEnum('stud'))
                ->orderByAsc(Listings::ID)
        );
        return view('pages/dashboard/listings/studs/recycle-studs', [
            'Puppies' => $Puppies,
        ]);
    }
    /**
     * It recycles all the Soft Deleted Puppies to Normal Puppies.
     *
     * @return Listings
     */
    public function recycleTrashedListings($slug)
    {
        $singleListing = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::SLUG,'=',$slug)
        );
        if(empty($singleListing)){

        }else{
            $singleListing[0]->trashed = false;
            $this->listingsRepository->save($singleListing[0]);
            return redirect()->back();
        }

    }

    /**
     * It permanently delete the provided Listings.
     *
     * @return Listings
     */
    public function deleteListings($slug)
    {
        $singleListing = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::SLUG,'=',$slug)
        );
        if(empty($singleListing)){

        }else{
            $this->listingsRepository->remove($singleListing[0]);
            return redirect()->back();
        }

    }

    /**
     * It permanently delete all the soft Deleted Listings.
     *
     * @return Listings
     */
    public function deleteAllListings()
    {
        $Listings = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::TRASHED,'=',true)
        );
        if(empty($singleListing)){

        }else{
            $this->listingsRepository->removeAll($Listings);
            return redirect()->back();
        }

    }

}