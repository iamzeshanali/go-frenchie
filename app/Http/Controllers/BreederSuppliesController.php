<?php

namespace App\Http\Controllers;

use App\Domain\Entities\Breeder_Supplies;
use App\Domain\Entities\Enums\ListingsStatusEnum;
use App\Domain\Services\Persistence\IBreeder_SuppliesRepository;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Common\Structure\Money\Currency;
use Dms\Common\Structure\Money\Money;
use Dms\Common\Structure\Type\StringValueObject;
use Dms\Common\Structure\Web\Url;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\Enum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\DeclareDeclare;
use function PHPUnit\Framework\isNull;

class BreederSuppliesController extends Controller
{
    public $breeder_SuppliesRepository;

    public function __construct(IBreeder_SuppliesRepository $breeder_SuppliesRepository)
    {
        $this->breeder_SuppliesRepository = $breeder_SuppliesRepository;
    }

    public function getBreederSupplies()
    {
        return $this->breeder_SuppliesRepository->getAll();
    }

    public function showAllBreederSupplies(Request $request)
    {
        $page = $request->page;
        $totalBreederSupplies = $this->breeder_SuppliesRepository->matching(
            $this->breeder_SuppliesRepository->criteria()
                ->where(Breeder_Supplies::TRASHED, '=', false)
                ->orderByAsc(Breeder_Supplies::ID)
        );
       $breederSupplies = $this->breeder_SuppliesRepository->matching(
           $this->breeder_SuppliesRepository->criteria()
               ->where(Breeder_Supplies::TRASHED, '=', false)
               ->orderByAsc(Breeder_Supplies::ID)
               ->skip(((int) $page - 1) * 5)->limit(5)
       );
//       dd($breederSupplies);
        return view('pages/dashboard/resources/breeder_supplies/show-breeder_supplies', [
            'Supplies' => $breederSupplies,
            'total'=>count($totalBreederSupplies),
            'page'=>$page
        ]);
    }

    public function showSingleBreederSupplies($slug)
    {
        $singleBreederSupplies = $this->breeder_SuppliesRepository->matching(
            $this->breeder_SuppliesRepository->criteria()
                ->where(Breeder_Supplies::SLUG,'=',$slug)
                ->orderByAsc(Breeder_Supplies::ID)
        );
        if(empty($singleBreederSupplies)){}
        else{
           dd($singleBreederSupplies);
        }
        return $this->breeder_SuppliesRepository;
    }

    public function createBreederSupplies(Request $request)
    {

        $breederSupplies = new Breeder_Supplies();

        $breederSupplies->breeder = Auth::user();
        $breederSupplies->title = $request->get('title');
        $breederSupplies->decription = $request->get('description');
        $breederSupplies->slug = str_replace(' ','-', strtolower($breederSupplies->title));

        $file1 =$request->file('logo');
        if ($file1 == null){
            $fullPath1 = $request->get('logo_name');
//            dd($fullPath1);
            $fullPath1 = substr_replace($fullPath1, 'public/app/BreederResourcesLogo', 44, 6);
//            dd($myPath);
        }else{
            $fullPath1 = $file1->move(public_path('app/BreederResourcesLogo'), $file1->getClientOriginalName())->getRealPath();
        }
        $breederSupplies->logo = new Image($fullPath1);
//        dd($breederSupplies->logo);
        $breederSupplies->decription = $request->get('description');
        $breederSupplies->websiteUrl = new Url($request->get('web_url'));
        $breederSupplies->couponCode = $request->get('coupon');
        $breederSupplies->price = new Money(($request->get('price')*100), new Currency('USD'));
        $breederSupplies->status = new ListingsStatusEnum('inactive');
        $breederSupplies->trashed = false;

        $singleBreederSupplies = $this->breeder_SuppliesRepository->matching(
            $this->breeder_SuppliesRepository->criteria()
                ->where(Breeder_Supplies::SLUG,'=',$breederSupplies->slug)
        );

        if(empty($singleBreederSupplies)){
            $this->breeder_SuppliesRepository->save($breederSupplies);
            return redirect()->route('showAllBreederSupplies',1);
        }else{
            return redirect()->back()->with('message', 'The resource with this title already exists');
        }

    }

    public function editBreederSupplies($slug)
    {
        $singleBreederSupplies = $this->breeder_SuppliesRepository->matching(
            $this->breeder_SuppliesRepository->criteria()
                ->where(Breeder_Supplies::SLUG,'=',$slug)
                ->orderByAsc(Breeder_Supplies::ID)
        )[0];
//        dd($singleBreederSupplies);
        if(empty($singleBreederSupplies)){

        }else{
            return view('pages/dashboard/resources/breeder_supplies/create-or-update-breeder_supplies', [
                'supply' => $singleBreederSupplies
            ]);
        }

        return $this->breeder_SuppliesRepository;
    }

    public function updateBreederSupplies(Request $request)
    {

        $singleBreederSupplies = $this->breeder_SuppliesRepository->matching(
            $this->breeder_SuppliesRepository->criteria()
                ->where(Breeder_Supplies::SLUG,'=',$request->get('slug'))
                ->orderByAsc(Breeder_Supplies::ID)
        )[0];
        if(empty($singleBreederSupplies)){

        }else{

            $singleBreederSupplies->breeder = Auth::user();
            $singleBreederSupplies->title = $request->get('title');
            $singleBreederSupplies->decription = $request->get('description');
            $singleBreederSupplies->slug = str_replace(' ','-', strtolower($singleBreederSupplies->title));

            $file1 =$request->file('logo');
            if ($file1 == null){
                $fullPath1 = $request->get('logo_name');
                $fullPath1 = substr_replace($fullPath1, 'public/app/BreederResourcesLogo', 44, 6);
            }else{
                $fullPath1 = $file1->move(public_path('app/BreederResourcesLogo'), $file1->getClientOriginalName())->getRealPath();
            }
            $singleBreederSupplies->logo = new Image($fullPath1);
            $singleBreederSupplies->decription = $request->get('description');
            $singleBreederSupplies->websiteUrl = new Url($request->get('web_url'));
            $singleBreederSupplies->couponCode = $request->get('coupon');
            $singleBreederSupplies->price = new Money(($request->get('price')*100), new Currency('USD'));
            $singleBreederSupplies->status = new ListingsStatusEnum('inactive');
            $singleBreederSupplies->trashed = false;


            if($singleBreederSupplies->slug == $request->get('slug'))
            {
                $this->breeder_SuppliesRepository->save($singleBreederSupplies);
                return redirect()->route('showAllBreederSupplies',1);
            }else{
                $matchedBreederSupplies = $this->breeder_SuppliesRepository->matching(
                    $this->breeder_SuppliesRepository->criteria()
                        ->where(Breeder_Supplies::SLUG,'=',$singleBreederSupplies->slug)
                );
                if(empty($matchedBreederSupplies)){

                    $this->breeder_SuppliesRepository->save($singleBreederSupplies);
                    return redirect()->route('showAllBreederSupplies',1);
                }else{
                    return redirect()->back()->with('message', 'The resource with this title already exists');
                }
            }

        }

        return $this->breeder_SuppliesRepository;
    }

    public function trashBreederSupplies($slug)
    {
        $singleBreederSupplies = $this->breeder_SuppliesRepository->matching(
            $this->breeder_SuppliesRepository->criteria()
                ->where(Breeder_Supplies::SLUG,'=',$slug)
        );
        if(empty($singleBreederSupplies)){

        }else{
            $singleBreederSupplies[0]->trashed = true;
            $this->breeder_SuppliesRepository->save($singleBreederSupplies[0]);
            return redirect()->back();
        }
    }

    public function showTrashedSupplies()
    {
        $breederSupplies = $this->breeder_SuppliesRepository->matching(
            $this->breeder_SuppliesRepository->criteria()
                ->where(Breeder_Supplies::TRASHED, '=', true)
                ->orderByAsc(Breeder_Supplies::ID)
        );
//       dd($breederSupplies);
        return view('pages/dashboard/resources/breeder_supplies/trashed-breeder-supplies', [
            'Supplies' => $breederSupplies,
        ]);
    }

    public function recycleBreederSupplies($slug)
    {
        $singleBreederSupplies = $this->breeder_SuppliesRepository->matching(
            $this->breeder_SuppliesRepository->criteria()
                ->where(Breeder_Supplies::SLUG,'=',$slug)
        );
        if(empty($singleBreederSupplies)){

        }else{
            $singleBreederSupplies[0]->trashed = false;
            $this->breeder_SuppliesRepository->save($singleBreederSupplies[0]);
            return redirect()->back();
        }
    }


    public function deleteBreederSupplies($slug)
    {
        $singleBreederSupplies = $this->breeder_SuppliesRepository->matching(
            $this->breeder_SuppliesRepository->criteria()
                ->where(Breeder_Supplies::SLUG,'=',$slug)
        );
        if(empty($singleBreederSupplies)){

        }else{
            $this->breeder_SuppliesRepository->remove($singleBreederSupplies[0]);
            return redirect()->back();
        }
    }

    public function deleteAllBreederSupplies()
    {

        $trashedBreederSupplies = $this->breeder_SuppliesRepository->matching(
            $this->breeder_SuppliesRepository->criteria()
                ->where(Breeder_Supplies::TRASHED,'=',true)
        );
//        dd($trashedBreederSupplies);
        if(empty($trashedBreederSupplies)){

        }else{
            $this->breeder_SuppliesRepository->removeAll($trashedBreederSupplies);
            return redirect()->back();
        }
    }
}
