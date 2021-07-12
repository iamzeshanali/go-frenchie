<?php

namespace App\Http\Controllers;

use App\Domain\Entities\Canine_Nutrition;
use App\Domain\Entities\Enums\ListingsStatusEnum;
use App\Domain\Services\Persistence\ICanine_NutritionRepository;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Common\Structure\Money\Currency;
use Dms\Common\Structure\Money\Money;
use Dms\Common\Structure\Web\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanineNutritionController extends Controller
{
    public $canine_nutritionRepository;

    public function __construct(ICanine_NutritionRepository $canine_nutritionRepository)
    {
        $this->canine_nutritionRepository = $canine_nutritionRepository;
    }

    public function getCanineNutrition()
    {
        return $this->canine_nutritionRepository->getAll();
    }

    public function showAllListings()
    {
        $page = 0;
        $Listings = $this->canine_nutritionRepository->matching(
            $this->canine_nutritionRepository->criteria()
                ->where(Canine_Nutrition::TRASHED, '=', false)
                ->orderByAsc(Canine_Nutrition::ID)
        );
//       dd($Listings);
        return view('pages/dashboard/resources/canine_nutrition/show-canine_nutrition', [
            'Supplies' => $Listings,
            'page' => $page
        ]);
    }

    public function showSingleListings($slug)
    {
        $singleListings = $this->canine_nutritionRepository->matching(
            $this->canine_nutritionRepository->criteria()
                ->where(Canine_Nutrition::SLUG,'=',$slug)
                ->orderByAsc(Canine_Nutrition::ID)
        )[0];
        if(empty($singleListings)){}
        else{
            dd($singleListings);
        }
        return $this->canine_nutritionRepository;
    }

    public function createListings(Request $request)
    {

        $Listings = new Canine_Nutrition();

        $Listings->breeder = Auth::user();
        $Listings->title = $request->get('title');
        $Listings->decription = $request->get('description');
        $Listings->slug = str_replace(' ','-', strtolower($Listings->title));

        $file1 =$request->file('logo');
        if ($file1 == null){
            $fullPath1 = $request->get('logo_name');
//            dd($fullPath1);
            $fullPath1 = substr_replace($fullPath1, 'public/app/BreederResourcesLogo', 44, 6);
//            dd($myPath);
        }else{
            $fullPath1 = $file1->move(public_path('app/BreederResourcesLogo'), $file1->getClientOriginalName())->getRealPath();
        }
        $Listings->logo = new Image($fullPath1);
//        dd($Listings->logo);
        $Listings->decription = $request->get('description');
        $Listings->websiteUrl = new Url($request->get('web_url'));
        $Listings->couponCode = $request->get('coupon');
        $Listings->price = new Money(($request->get('price')*100), new Currency('USD'));
        $Listings->status = new ListingsStatusEnum('inactive');
        $Listings->trashed = false;

        $singleListings = $this->canine_nutritionRepository->matching(
            $this->canine_nutritionRepository->criteria()
                ->where(Canine_Nutrition::SLUG,'=',$Listings->slug)
        );

        if(empty($singleListings)){
            $this->canine_nutritionRepository->save($Listings);
            return redirect()->route('showAllCanineNutrition');
        }else{
            return redirect()->back()->with('message', 'The resource with this title already exists');
        }

    }

    public function editListings($slug)
    {
        $singleListings = $this->canine_nutritionRepository->matching(
            $this->canine_nutritionRepository->criteria()
                ->where(Canine_Nutrition::SLUG,'=',$slug)
                ->orderByAsc(Canine_Nutrition::ID)
        )[0];
//        dd($singleListings);
        if(empty($singleListings)){

        }else{
            return view('pages/dashboard/resources/canine_nutrition/create-or-update-canine_nutrition', [
                'supply' => $singleListings
            ]);
        }

        return $this->canine_nutritionRepository;
    }

    public function updateListings(Request $request)
    {

        $singleListings = $this->canine_nutritionRepository->matching(
            $this->canine_nutritionRepository->criteria()
                ->where(Canine_Nutrition::SLUG,'=',$request->get('slug'))
                ->orderByAsc(Canine_Nutrition::ID)
        )[0];
        if(empty($singleListings)){

        }else{

            $singleListings->breeder = Auth::user();
            $singleListings->title = $request->get('title');
            $singleListings->decription = $request->get('description');
            $singleListings->slug = str_replace(' ','-', strtolower($singleListings->title));

            $file1 =$request->file('logo');
            if ($file1 == null){
                $fullPath1 = $request->get('logo_name');
                $fullPath1 = substr_replace($fullPath1, 'public/app/BreederResourcesLogo', 44, 6);
            }else{
                $fullPath1 = $file1->move(public_path('app/BreederResourcesLogo'), $file1->getClientOriginalName())->getRealPath();
            }
            $singleListings->logo = new Image($fullPath1);
            $singleListings->websiteUrl = new Url($request->get('web_url'));
            $singleListings->couponCode = $request->get('coupon');
            $singleListings->price = new Money(($request->get('price')*100), new Currency('USD'));
            $singleListings->status = new ListingsStatusEnum('inactive');
            $singleListings->trashed = false;


            if($singleListings->slug == $request->get('slug'))
            {
                $this->canine_nutritionRepository->save($singleListings);
                return redirect()->route('showAllCanineNutrition');
            }else{
                $matchedListings = $this->canine_nutritionRepository->matching(
                    $this->canine_nutritionRepository->criteria()
                        ->where(Canine_Nutrition::SLUG,'=',$singleListings->slug)
                );
                if(empty($matchedListings)){

                    $this->canine_nutritionRepository->save($singleListings);
                    return redirect()->route('showAllCanineNutrition');
                }else{
                    dd("HOIOFIGDG");
                    return redirect()->back()->with('message', 'The resource with this title already exists');
                }
            }

        }

        return $this->canine_nutritionRepository;
    }

    public function trashListings($slug)
    {
        $singleListings = $this->canine_nutritionRepository->matching(
            $this->canine_nutritionRepository->criteria()
                ->where(Canine_Nutrition::SLUG,'=',$slug)
        );
        if(empty($singleListings)){

        }else{
            $singleListings[0]->trashed = true;
            $this->canine_nutritionRepository->save($singleListings[0]);
            return redirect()->back();
        }
    }

    public function showTrashedListings()
    {
        $Listings = $this->canine_nutritionRepository->matching(
            $this->canine_nutritionRepository->criteria()
                ->where(Canine_Nutrition::TRASHED, '=', true)
                ->orderByAsc(Canine_Nutrition::ID)
        );
//       dd($Listings);
        return view('pages/dashboard/resources/canine_nutrition/trashed-canine_nutrition', [
            'Supplies' => $Listings,
        ]);
    }

    public function recycleListings($slug)
    {
        $singleListings = $this->canine_nutritionRepository->matching(
            $this->canine_nutritionRepository->criteria()
                ->where(Canine_Nutrition::SLUG,'=',$slug)
        );
        if(empty($singleListings)){

        }else{
            $singleListings[0]->trashed = false;
            $this->canine_nutritionRepository->save($singleListings[0]);
            return redirect()->back();
        }
    }


    public function deleteListings($slug)
    {
        $singleListings = $this->canine_nutritionRepository->matching(
            $this->canine_nutritionRepository->criteria()
                ->where(Canine_Nutrition::SLUG,'=',$slug)
        );
        if(empty($singleListings)){

        }else{
            $this->canine_nutritionRepository->remove($singleListings[0]);
            return redirect()->back();
        }
    }

    public function deleteAllListings()
    {

        $trashedListings = $this->canine_nutritionRepository->matching(
            $this->canine_nutritionRepository->criteria()
                ->where(Canine_Nutrition::TRASHED,'=',true)
        );
//        dd($trashedListings);
        if(empty($trashedListings)){

        }else{
            $this->canine_nutritionRepository->removeAll($trashedListings);
            return redirect()->back();
        }
    }
}
