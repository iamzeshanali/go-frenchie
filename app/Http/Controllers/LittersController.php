<?php

namespace App\Http\Controllers;

use App\Domain\Entities\Enums\ListingsStatusEnum;
use App\Domain\Entities\Listings;
use App\Domain\Entities\Litters;
use App\Domain\Services\Persistence\ILittersRepository;
use Dms\Common\Structure\DateTime\Date;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Common\Structure\Type\StringValueObject;
use Dms\Common\Structure\Web\Html;
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


    public function allLittersofCurrentUser()
    {
        $Litters= $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::BREEDER,'=',Auth::user())
        );
        return count($Litters);
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
//        dd($Litters);
        foreach ($Litters as $fl) {
            if($fl->isSponsored){
                array_push($sponsoredLitters,$fl);
            }else{
                array_push($standardLitters,$fl);
            }
        }

//        dd($standardLitters);
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
                ->where(Litters::TRASHED,'=',false)
        );
        $Litters= $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::BREEDER,'=',Auth::user())
                ->where(Litters::TRASHED,'=',false)
                ->orderByAsc(Listings::ID)
                ->skip(((int) $page - 1) * 5)->limit(5)
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
        $litter->description = new Html($request->get('listing-description'));
        $litter->status = new ListingsStatusEnum('inactive');
//        dd((bool)$request->sponsored);
        $litter->isSponsored = (bool)$request->sponsored;
        $litter->isFeatured = (bool)$request->featured;
        $date = explode('-', $request->get('dob'));
        $litter->expectedDob = new Date($date[0], $date[1], $date[2]);
        $litter->dam = $request->get('dam');
        $litter->sire = $request->get('sire');
        $litter->trashed = (bool)"0";

        if($request->file('photo1')){
            $file1 =$request->file('photo1');
            $fullPath1 = $file1->move(public_path('app/litters'), $file1->getClientOriginalName())->getRealPath();
            $litter->photo1 = new Image($fullPath1);
        }else{
            $litter->photo1 = null;
        }

        if($request->file('photo2')){
            $file1 =$request->file('photo2');
            $fullPath1 = $file1->move(public_path('app/litters'), $file1->getClientOriginalName())->getRealPath();
            $litter->photo2 = new Image($fullPath1);
        }else{
            $litter->photo2 = null;
        }

        if($request->file('photo3')){
            $file1 =$request->file('photo3');
            $fullPath1 = $file1->move(public_path('app/litters'), $file1->getClientOriginalName())->getRealPath();
            $litter->photo3 = new Image($fullPath1);
        }else{
            $litter->photo3 = null;
        }

        if($request->file('photo4')){
            $file1 =$request->file('photo4');
            $fullPath1 = $file1->move(public_path('app/litters'), $file1->getClientOriginalName())->getRealPath();
            $litter->photo4 = new Image($fullPath1);
        }else{
            $litter->photo4 = null;
        }
        if($request->file('photo5')){
            $file1 =$request->file('photo5');
            $fullPath1 = $file1->move(public_path('app/litters'), $file1->getClientOriginalName())->getRealPath();
            $litter->photo5 = new Image($fullPath1);
        }else{
            $litter->photo5 = null;
        }


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
            $singleLitter[0]->description = new Html($request->get('listing-description'));
//            dd((bool)$request->input('sponsored'));
            $singleLitter[0]->isSponsored = (bool)$request->sponsored;
            $singleLitter[0]->isFeatured = (bool)$request->featured;
            $date = explode('-', $request->get('dob'));
            $singleLitter[0]->expectedDob = new Date($date[0], $date[1], $date[2]);

            $file1 =$request->file('photo1');
            if ($file1 == null){
                if ($request->get('photo1_name')){
                    $fullPath1 = $request->get('photo1_name');

                    $name = explode('/',$fullPath1);
                    $temp = $name[count($name)-2];
                    $name[count($name)-2] = $temp.'/app/litters';
                    $fullPath1 = implode('/',$name);

                    $singleLitter[0]->photo1 = new Image($fullPath1);
                }else{
                    $singleLitter[0]->photo1 = null;
                }
            }else{
                $fullPath1 = $file1->move(public_path('app/litters'), $file1->getClientOriginalName())->getRealPath();
                $singleLitter[0]->photo1 = new Image($fullPath1);
//                dd($fullPath1);
            }

            $file2 =$request->file('photo2');
            if ($file2 == null){
                if ($request->get('photo2_name')) {
                    $fullPath2 = $request->get('photo2_name');

                    $name = explode('/',$fullPath2);
                    $temp = $name[count($name)-2];
                    $name[count($name)-2] = $temp.'/app/litters';
                    $fullPath2 = implode('/',$name);

                    $singleLitter[0]->photo2 = new Image($fullPath2);
                }else{
                    $singleLitter[0]->photo2 = null;
                }
            }else{
                $fullPath2 = $file2->move(public_path('app/litters'), $file2->getClientOriginalName())->getRealPath();
                $singleLitter[0]->photo2 = new Image($fullPath2);
            }

            $file3 =$request->file('photo3');
            if ($file3 == null){
                if ($request->get('photo3_name')) {
                    $fullPath3 = $request->get('photo3_name');

                    $name = explode('/',$fullPath3);
                    $temp = $name[count($name)-2];
                    $name[count($name)-2] = $temp.'/app/litters';
                    $fullPath3 = implode('/',$name);

                    $singleLitter[0]->photo3 = new Image($fullPath3);
                }else{
                    $singleLitter[0]->photo3 = null;
                }
            }else{
                $fullPath3 = $file3->move(public_path('app/litters'), $file3->getClientOriginalName())->getRealPath();
                $singleLitter[0]->photo3 = new Image($fullPath3);
            }

            $file4 =$request->file('photo4');
            if ($file4 == null){
                if ($request->get('photo4_name')) {
                    $fullPath4 = $request->get('photo4_name');

                    $name = explode('/',$fullPath4);
                    $temp = $name[count($name)-2];
                    $name[count($name)-2] = $temp.'/app/litters';
                    $fullPath4 = implode('/',$name);

                    $singleLitter[0]->photo4 = new Image($fullPath4);
                }else{
                    $singleLitter[0]->photo4 = null;
                }
            }else{
                $fullPath4 = $file4->move(public_path('app/litters'), $file4->getClientOriginalName())->getRealPath();
                $singleLitter[0]->photo4 = new Image($fullPath4);
            }

            $file5 =$request->file('photo5');
            if ($file5 == null){
                if ($request->get('photo5_name')) {
                    $fullPath5 = $request->get('photo5_name');

                    $name = explode('/',$fullPath5);
                    $temp = $name[count($name)-2];
                    $name[count($name)-2] = $temp.'/app/litters';
                    $fullPath5 = implode('/',$name);

                    $singleLitter[0]->photo5 = new Image($fullPath5);
                }else{
                    $singleLitter[0]->photo5 = null;
                }
            }else{
                $fullPath5 = $file5->move(public_path('app/litters'), $file5->getClientOriginalName())->getRealPath();
                $singleLitter[0]->photo5 = new Image($fullPath5);
            }
//            dd($singleLitter[0]);
            $this->littersRepository->save($singleLitter[0]);
            return redirect()->route('showAllLitters',1);
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

    public function showTrashedLitters(Request $request)
    {
        $page = $request->page;
        $totalTrashedPuppies = $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::TRASHED,'=',true)
                ->where(Litters::BREEDER,'=',Auth::user())
        );
        $Puppies = $this->littersRepository->matching(
            $this->littersRepository->criteria()
                ->where(Litters::TRASHED,'=',true)
                ->where(Litters::BREEDER,'=',Auth::user())
                ->orderByAsc(Litters::ID)
                ->skip(((int) $page - 1) * 5)->limit(5)
        );
        return view('pages/dashboard/listings/litters/recycle-litters', [
            'Puppies' => $Puppies,
            'total' => count($totalTrashedPuppies),
            'page'=> $page
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
        if(empty($Listings)){

        }else{
            $this->littersRepository->removeAll($Listings);
            return redirect()->back();
        }

    }


}
