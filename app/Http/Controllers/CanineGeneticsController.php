<?php

namespace App\Http\Controllers;

use App\Domain\Entities\Breeder_Supplies;
use App\Domain\Entities\Canine_Genetics;
use App\Domain\Entities\Enums\ListingsStatusEnum;
use App\Domain\Services\Persistence\IBreeder_SuppliesRepository;
use App\Domain\Services\Persistence\ICanine_GeneticsRepository;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Common\Structure\Money\Currency;
use Dms\Common\Structure\Money\Money;
use Dms\Common\Structure\Type\StringValueObject;
use Dms\Common\Structure\Web\Html;
use Dms\Common\Structure\Web\Url;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\Enum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanineGeneticsController extends Controller
{
    public $canine_geneticsRepository;

    public function __construct(ICanine_GeneticsRepository $canine_geneticsRepository)
    {
        $this->canine_geneticsRepository = $canine_geneticsRepository;
    }

    public function getCanineGenetics()
    {
        return $this->canine_geneticsRepository->getAll();
    }
    public function getallCurrentBreederCanineGenetics()
    {
        $canineGenetics = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::BREEDER, '=', Auth::user())
        );
        return count($canineGenetics);
    }
    public function getCurrentBreederCanineGenetics()
    {
        $canineGenetics = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::BREEDER, '=', Auth::user())
                ->where(Canine_Genetics::TRASHED, '=', false)
        );
        return $canineGenetics;
    }

    public function showAllListings(Request $request)
    {
        $page = $request->page;
        $totalListings = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::TRASHED, '=', false)
                ->where(Canine_Genetics::BREEDER, '=', Auth::user())
        );
        $Listings = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::TRASHED, '=', false)
                ->where(Canine_Genetics::BREEDER, '=', Auth::user())
                ->orderByAsc(Canine_Genetics::ID)
                ->skip(((int) $page - 1) * 5)->limit(5)
        );
//       dd($Listings);
        return view('pages/dashboard/resources/canine_genetics/show-canine_genetics', [
            'Supplies' => $Listings,
            'total'=>count($totalListings),
            'page'=>$page
        ]);
    }

    public function showSingleListings($slug)
    {
        $singleListings = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::SLUG,'=',$slug)
                ->orderByAsc(Canine_Genetics::ID)
        )[0];
        if(empty($singleListings)){}
        else{
            dd($singleListings);
        }
        return $this->canine_geneticsRepository;
    }

    public function createListings(Request $request)
    {

        $Listings = new Canine_Genetics();

        $Listings->breeder = Auth::user();
        $Listings->title = $request->get('title');
        $Listings->decription =  new Html($request->get('description'));
        $Listings->slug = str_replace(' ','-', strtolower($Listings->title));

        $file1 =$request->file('logo');

        if ($request->file('logo')){
            $file1 =$request->file('logo');
            $fullPath1 = $file1->move(public_path('app/CanineGenetics'), $file1->getClientOriginalName())->getRealPath();
            $Listings->logo = new Image($fullPath1);
        }else{
            $Listings->logo = null;
        }
        $Listings->websiteUrl = new Url($request->get('web_url'));
        $Listings->couponCode = $request->get('coupon');
        $Listings->price = new Money(($request->get('price')*100), new Currency('USD'));
        $Listings->status = new ListingsStatusEnum('inactive');
        $Listings->trashed = false;

        $singleListings = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::SLUG,'=',$Listings->slug)
        );

        if(empty($singleListings)){
            $this->canine_geneticsRepository->save($Listings);
            return redirect()->route('showAllCanineGenetics',1);
        }else{
            return redirect()->back()->with('message', 'The resource with this title already exists');
        }

    }

    public function editListings($slug)
    {
        $singleListings = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::SLUG,'=',$slug)
                ->orderByAsc(Canine_Genetics::ID)
        )[0];
//        dd($singleListings);
        if(empty($singleListings)){

        }else{
            return view('pages/dashboard/resources/canine_genetics/create-or-update-canine_genetics', [
                'supply' => $singleListings
            ]);
        }

        return $this->canine_geneticsRepository;
    }

    public function updateListings(Request $request)
    {

        $singleListings = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::SLUG,'=',$request->get('slug'))
                ->orderByAsc(Canine_Genetics::ID)
        )[0];
        if(empty($singleListings)){

        }else{

            $singleListings->breeder = Auth::user();
            $singleListings->title = $request->get('title');
            $singleListings->decription =  new Html($request->get('description'));
            $singleListings->slug = str_replace(' ','-', strtolower($singleListings->title));

            $file1 =$request->file('logo');
            if ($file1 == null){
                if ($request->get('photo1_name')){
                    $fullPath1 = $request->get('photo1_name');
                    $fullPath1 = substr_replace($fullPath1, 'public/app/CanineGenetics', 44, 6);
                    $singleListings->logo = new Image($fullPath1);
                }else{
                    $singleListings->logo = null;
                }
            }else{
                $fullPath1 = $file1->move(public_path('app/CanineGenetics'), $file1->getClientOriginalName())->getRealPath();
                $singleListings->logo = new Image($fullPath1);
            }
            $singleListings->websiteUrl = new Url($request->get('web_url'));
            $singleListings->couponCode = $request->get('coupon');
            $singleListings->price = new Money(($request->get('price')*100), new Currency('USD'));
            $singleListings->status = new ListingsStatusEnum('inactive');
            $singleListings->trashed = false;


            if($singleListings->slug == $request->get('slug'))
            {
                $this->canine_geneticsRepository->save($singleListings);
                return redirect()->route('showAllCanineGenetics',1);
            }else{
                $matchedListings = $this->canine_geneticsRepository->matching(
                    $this->canine_geneticsRepository->criteria()
                        ->where(Canine_Genetics::SLUG,'=',$singleListings->slug)
                );
                if(empty($matchedListings)){

                    $this->canine_geneticsRepository->save($singleListings);
                    return redirect()->route('showAllCanineGenetics',1);
                }else{
                    return redirect()->back()->with('message', 'The resource with this title already exists');
                }
            }

        }

        return $this->canine_geneticsRepository;
    }

    public function trashListings($slug)
    {
        $singleListings = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::SLUG,'=',$slug)
        );
        if(empty($singleListings)){

        }else{
            $singleListings[0]->trashed = true;
            $this->canine_geneticsRepository->save($singleListings[0]);
            return redirect()->back();
        }
    }


    public function showTrashedListings(Request $request)
    {
        $page = $request->page;
        $allTrashedCanineGenetics = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::TRASHED, '=', true)
                ->where(Canine_Genetics::BREEDER, '=', Auth::user())
        );
        $Listings = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::TRASHED, '=', true)
                ->where(Canine_Genetics::BREEDER, '=', Auth::user())
                ->orderByAsc(Canine_Genetics::ID)
                ->skip(((int) $page - 1) * 5)->limit(5)
        );

        return view('pages/dashboard/resources/canine_genetics/trashed-canine_genetics', [
            'Supplies' => $Listings,
            'total' => count($allTrashedCanineGenetics),
            'page'=>$page
        ]);
    }

    public function recycleListings($slug)
    {
        $singleListings = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::SLUG,'=',$slug)
        );
        if(empty($singleListings)){

        }else{
            $singleListings[0]->trashed = false;
            $this->canine_geneticsRepository->save($singleListings[0]);
            return redirect()->back();
        }
    }


    public function deleteListings($slug)
    {
        $singleListings = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::SLUG,'=',$slug)
        );
        if(empty($singleListings)){

        }else{
            $this->canine_geneticsRepository->remove($singleListings[0]);
            return redirect()->back();
        }
    }

    public function deleteAllListings()
    {

        $trashedListings = $this->canine_geneticsRepository->matching(
            $this->canine_geneticsRepository->criteria()
                ->where(Canine_Genetics::TRASHED,'=',true)
        );
//        dd($trashedListings);
        if(empty($trashedListings)){

        }else{
            $this->canine_geneticsRepository->removeAll($trashedListings);
            return redirect()->back();
        }
    }
}
