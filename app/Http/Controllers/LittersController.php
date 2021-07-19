<?php

namespace App\Http\Controllers;

use App\Domain\Entities\Enums\ListingsStatusEnum;
use App\Domain\Entities\Listings;
use App\Domain\Entities\Litters;
use App\Domain\Services\Persistence\ILittersRepository;
use Dms\Common\Structure\DateTime\Date;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Core\Model\Object\Enum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LittersController extends Controller
{
    public $littersRepository;

    public function __construct(ILittersRepository $littersRepository)
    {
        $this->littersRepository = $littersRepository;
    }

    public function showLitters()
    {
        $sponsoredLitters = [];
        $standardLitters = [];
        $Litters= $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::STATUS,'=',new ListingsStatusEnum('active'))
                ->where(Litters::TRASHED,'=',false)
                ->orderByAsc(Listings::ID)
                ->limit(5)
        );
        foreach ($Litters as $fl) {
            if($fl->isSponsored){
                array_push($sponsoredLitters,$fl);
            }else{
                array_push($standardLitters,$fl);
            }
        }

//        dd($Litters);
        return view('pages/litter-listing', [
            'sponsoredLitters' => $sponsoredLitters,
            'standardLitters' => $standardLitters,
            'matched'=>false
        ]);
    }

    public function showLittersInDashboard(Request $request)
    {
        $page = $request->page;
        $totalLitters= $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::BREEDER,'=',Auth::user())
                ->where(Litters::STATUS,'=',new ListingsStatusEnum('active'))
                ->where(Litters::TRASHED,'=',false)
        );
        $Litters= $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::BREEDER,'=',Auth::user())
                ->where(Litters::STATUS,'=',new ListingsStatusEnum('active'))
                ->where(Litters::TRASHED,'=',false)
                ->orderByAsc(Listings::ID)
                ->skip(((int) $page - 1) * 1)->limit(1)
        );
//        dd($Puppies);
        return view('pages/dashboard/listings/litters/show-litters', [
            'Puppies' => $Litters,
            'total'=>count($totalLitters),
            'page'=>$page
        ]);
    }
    public function showSingleLitter($slug){

        $singleLitter = $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Listings::SLUG,'=',$slug)
                ->orderByAsc(Listings::ID)
        );

//        dd($singlePuppy);
        if(empty($singleLitter)){

        }else{
            return view('pages/single-litter', [
                'litter' => $singleLitter[0]
            ]);
        }
    }

    public function createLitter(Request $request)
    {
        $litter = new Litters();

        $litter->breeder = Auth::user();
        $litter->title = $request->get('title');
        $litter->slug = str_replace(' ','-', strtolower($litter->title));
        $litter->decription = $request->get('listing-description');
        $litter->status = new ListingsStatusEnum('inactive');
//        dd((bool)$request->sponsored);
        $litter->isSponsored = (bool)$request->sponsored;
        $date = explode('-', $request->get('dob'));
        $litter->expectedDob = new Date($date[0], $date[1], $date[2]);
        $litter->dam = $request->get('dam');
        $litter->sire = $request->get('sire');
        $litter->trashed = (bool)"0";

        $file1 =$request->file('photo1');
        $fullPath1 = $file1->move(public_path('app/litters'), $file1->getClientOriginalName())->getRealPath();
        $litter->photo1 = new Image($fullPath1);

        $file2 =$request->file('photo2');
        $fullPath2 = $file2->move(public_path('app/litters'), $file2->getClientOriginalName())->getRealPath();
        $litter->photo2 = new Image($fullPath2);

        $file3 =$request->file('photo3');
        $fullPath3 = $file3->move(public_path('app/litters'), $file3->getClientOriginalName())->getRealPath();
        $litter->photo3 = new Image($fullPath3);

        $file4 =$request->file('photo4');
        $fullPath4 = $file4->move(public_path('app/litters'), $file4->getClientOriginalName())->getRealPath();
        $litter->photo4 = new Image($fullPath4);

        $file5 =$request->file('photo5');
        $fullPath5 = $file5->move(public_path('app/litters'), $file5->getClientOriginalName())->getRealPath();
        $litter->photo5 = new Image($fullPath5);

        $this->littersRepository->save($litter);

        return redirect()->route('showAllLitters',1);
    }

    public function editLitter($slug)
    {
        $singleLitter = $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::SLUG,'=',$slug)
                ->orderByAsc(Litters::ID)
        );

        if(empty($singleLitter)){

        }else{
//            dd($singlePuppy);
            return view('pages/dashboard/listings/litters/add-litters', [
                'litter' => $singleLitter[0]
            ]);
        }
    }

    public function updateLitter(Request $request)
    {
        $singleLitter = $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::ID, '=', (int)$request->get('id'))
                ->orderByAsc(Litters::ID)
        );
        if (empty($singleLitter)) {
            return redirect()->back()->with('message', 'No Such Listing Exist');
        } else {

            $singleLitter[0]->title = $request->get('title');
            $singleLitter[0]->decription = $request->get('listing-description');
//            dd((bool)$request->input('sponsored'));
            $singleLitter[0]->isSponsored = (bool)$request->sponsored;
            $date = explode('-', $request->get('dob'));
            $singleLitter[0]->expectedDob = new Date($date[0], $date[1], $date[2]);


            $file1 = $request->file('photo1');
            if ($file1 == null) {
                $fullPath1 = $request->get('photo1_name');
                $fullPath1 = substr_replace($fullPath1, 'public/app/litters', 44, 6);
            } else {
                $fullPath1 = $file1->move(public_path('app/litters'), $file1->getClientOriginalName())->getRealPath();
            }
            $singleLitter[0]->photo1 = new Image($fullPath1);

            $file2 = $request->file('photo2');
            if ($file2 == null) {
                $fullPath2 = $request->get('photo2_name');
                $fullPath2 = substr_replace($fullPath2, 'public/app/litters', 44, 6);
            } else {
                $fullPath2 = $file2->move(public_path('app/litters'), $file2->getClientOriginalName())->getRealPath();
            }
            $singleLitter[0]->photo2 = new Image($fullPath2);

            $file3 = $request->file('photo3');
            if ($file3 == null) {
                $fullPath3 = $request->get('photo3_name');
                $fullPath3 = substr_replace($fullPath3, 'public/app/litters', 44, 6);
            } else {
                $fullPath3 = $file3->move(public_path('app/litters'), $file3->getClientOriginalName())->getRealPath();
            }
            $singleLitter[0]->photo3 = new Image($fullPath3);


            $file4 = $request->file('photo4');
            if ($file4 == null) {
                $fullPath4 = $request->get('photo4_name');
                $fullPath4 = substr_replace($fullPath4, 'public/app/litters', 44, 6);
            } else {
                $fullPath4 = $file4->move(public_path('app/litters'), $file4->getClientOriginalName())->getRealPath();
            }
            $singleLitter[0]->photo4 = new Image($fullPath4);

            $file5 = $request->file('photo5');
            if ($file5 == null) {
                $fullPath5 = $request->get('photo5_name');
                $fullPath5 = substr_replace($fullPath5, 'public/app/litters', 44, 6);
            } else {
                $fullPath5 = $file5->move(public_path('app/litters'), $file5->getClientOriginalName())->getRealPath();
            }
            $singleLitter[0]->photo5 = new Image($fullPath5);

//            dd($singleLitter[0]);
            $this->littersRepository->save($singleLitter[0]);
            return redirect()->route('showAllLitters');
        }
    }

    public function trashLitter($slug)
        {
            $singleListing = $this->littersRepository->matching(
                $this->littersRepository->criteria()
                    ->where(Litters::SLUG,'=',$slug)
            );

            if(empty($singleListing)){

            }else{
                $singleListing[0]->trashed = true;
                $this->littersRepository->save($singleListing[0]);
                return redirect()->back();
            }
        }

    public function showTrashedLitters()
    {
        $Puppies = $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::TRASHED,'=',true)
                ->orderByAsc(Litters::ID)
        );
        return view('pages/dashboard/listings/litters/recycle-litters', [
            'Puppies' => $Puppies,
        ]);

    }

    public function recycleLitters($slug)
    {
        $singleListing = $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::SLUG,'=',$slug)
        );
        if(empty($singleListing)){

        }else{
            $singleListing[0]->trashed = false;
            $this->littersRepository->save($singleListing[0]);
            return redirect()->back();
        }

    }

    public function deleteLitter($slug)
    {
        $singleListing = $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::SLUG,'=',$slug)
        );
        if(empty($singleListing)){

        }else{
            $this->littersRepository->remove($singleListing[0]);
            return redirect()->back();
        }

    }

    public function deleteAllLitters()
    {
        $Listings = $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::TRASHED,'=',true)
        );
        if(empty($singleListing)){

        }else{
            $this->littersRepository->removeAll($Listings);
            return redirect()->back();
        }

    }


}
