<?php

namespace App\Http\Controllers;

use App\Domain\Entities\Enums\ListingsTypeEnum;
use App\Domain\Entities\Enums\UserRoleEnum;
use App\Domain\Entities\Listings;
use App\Domain\Entities\Litters;
use App\Domain\Entities\SavedListings;
use App\Domain\Entities\SavedLitters;
use App\Domain\Entities\Users;
use App\Domain\Services\Persistence\IListingsRepository;
use App\Domain\Services\Persistence\ILittersRepository;
use App\Domain\Services\Persistence\ISavedListingsRepository;
use App\Domain\Services\Persistence\ISavedLittersRepository;
use App\Domain\Services\Persistence\IUsersRepository;
use Dms\Common\Structure\Type\StringValueObject;
use Dms\Common\Structure\Web\EmailAddress;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\Enum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class SavedItemsController extends Controller
{
    public $listingsRepository;
    public $littersRepository;
    public $usersRepository;
    public $savedListingsRepository;
    public $savedLittersRepository;
    public $userRepository;

    public function __construct(IListingsRepository $listingsRepository,ILittersRepository $littersRepository, IUsersRepository $usersRepository, ISavedLittersRepository $savedLittersRepository, ISavedListingsRepository $savedListingsRepository)
    {
        $this->listingsRepository = $listingsRepository;
        $this->littersRepository = $littersRepository;
        $this->usersRepository = $usersRepository;
        $this->savedListingsRepository  = $savedListingsRepository;
        $this->savedLittersRepository  = $savedLittersRepository;
    }

    public function getAllListings(){
        return $this->savedListingsRepository->getAll();
    }
    public function getAllLitters(){
        return $this->savedLittersRepository->getAll();
    }

    public function addToFavouriteWithUserLogin(Request $request){
        $matchingUser = $this->usersRepository->matching(
                $this->usersRepository->criteria()->where(
                    Users::EMAIL, '=', new EmailAddress($request->input('email'))
                )
            )[0] ?? null;

        if(!($matchingUser)){
            return redirect()->back()->with('error', 'User does not exist.');
        }else{
            $hashed = $matchingUser->hashedPassword;
            if(password_verify($request->input('password'), $hashed)){
                Auth::login($matchingUser);
                $this->addOrRemoveToFavourite($request);
                return redirect()->back();
            }else{
                return redirect()->back()->with('error', 'Password does not match.');
            }

        }
    }

    public function addToFavouriteWithUserRegister(Request $request)
    {

        $matchingUser = $this->usersRepository->matching(
            $this->usersRepository->criteria()->where(
                Users::EMAIL, '=', new EmailAddress($request->input('email'))
            )
        );
        if(empty($matchingUser)){
            $customer = new Users();
            $customer->username = $request->get('username');
            $customer->role = new UserRoleEnum('customer');
            $customer->isActive = false;
            $customer->email = new EmailAddress($request->get('email'));
            $customer->hashedPassword = bcrypt($request->get('password'));
//            dd($customer);
            $this->usersRepository->save($customer);
            $this->addOrRemoveToFavourite($request);

            return redirect()->back();
        }else{
            return redirect()->back()->with('error', 'Customer already exists.');
        }
    }
    public function addOrRemoveToFavourite(Request $request)
    {
//        return response()->json(['success'=>"ADD"]);
        $slug = $request->get('slug');


        $email = $request->get('email');
        $type = $request->get('type');

        if ($type == 'litters'){

            $allSaved = $this->getAllLitters();
            $relatedSavedLitters= [];
//            return response()->json(['success'=>count($allSaved)]);
            foreach ($allSaved as $saved){
                if ($saved->litters->slug == $slug && $saved->customer->email->asString() == $email){
                    array_push($relatedSavedLitters, $saved);
                }
            }
//            return response()->json(['success'=>count($relatedSavedLitters)]);
            $litter = $this->littersRepository->matching(
                $this->littersRepository->criteria()
                    ->where(Litters::SLUG,'=',$slug)
            );
//            return response()->json(['success'=>$email]);
            $user = $this->usersRepository->matching(
                $this->usersRepository->criteria()
                    ->where(Users::EMAIL,'=',new EmailAddress($email))
            );
//            return response()->json(['success'=>count($user)]);
            if (count($relatedSavedLitters) > 0){
                $this->savedLittersRepository->removeMatching(
                    $this->savedLittersRepository->criteria()
                        ->where(SavedLitters::LITTERS,'=',$litter[0])
                        ->where(SavedLitters::CUSTOMER,'=',$user[0])
                );
                return response()->json(['success'=>'300']);
            }else{

                $savedLitters = new SavedLitters();
                $savedLitters->litters = $litter[0];
                $savedLitters->customer = $user[0];
                $savedLitters->trashed = false;

                $this->savedLittersRepository->save($savedLitters);
                return response()->json(['success'=>'200']);
            }

        }else{


            $allSaved = $this->getAllListings();
            $relatedSavedListings= [];

            foreach ($allSaved as $saved){
                if ($saved->listings->slug == $slug && $saved->customer->email->asString() == $email){
                    array_push($relatedSavedListings, $saved);
                }
            }

            $list = $this->listingsRepository->matching(
                $this->listingsRepository->criteria()
                    ->where(Listings::SLUG,'=',$slug)
            );
            $user = $this->usersRepository->matching(
                $this->usersRepository->criteria()
                    ->where(Users::EMAIL,'=',new EmailAddress($email))
            );
            if (count($relatedSavedListings) > 0){
                $this->savedListingsRepository->removeMatching(
                    $this->savedListingsRepository->criteria()
                        ->where(SavedListings::LISTINGS,'=',$list[0])
                        ->where(SavedListings::CUSTOMER,'=',$user[0])
                );
                return response()->json(['success'=>'300']);
            }else{

                $savedListings = new SavedListings();
                $savedListings->listings = $list[0];

                $savedListings->customer = $user[0];
                $savedListings->trashed = false;

                $this->savedListingsRepository->save($savedListings);
                return response()->json(['success'=>'200']);
            }


        }


    }

    public function savedStuds(){
        $savedListings = $this->savedListingsRepository->matching(
            $this->savedListingsRepository->criteria()
            ->where(SavedListings::CUSTOMER, '=', Auth::user())
            ->where(SavedListings::TRASHED, '=', false)
        );
        $savedStuds = [];
        foreach ($savedListings as $savedListing){
            if($savedListing->listings->type == new ListingsTypeEnum('stud')){
                array_push($savedStuds,$savedListing);
            }
        }
//        dd($savedStuds);
        return view('pages/dashboard/SavedItems/savedStuds/saved-studs', [
            'listings' => $savedStuds
        ]);
    }
    public function trashedSavedStuds(){
        $savedListings = $this->savedListingsRepository->matching(
            $this->savedListingsRepository->criteria()
                ->where(SavedListings::CUSTOMER, '=', Auth::user())
                ->where(SavedListings::TRASHED, '=', true)
        );
        $savedStuds = [];
        foreach ($savedListings as $savedListing){
            if($savedListing->listings->type == new ListingsTypeEnum('stud')){
                array_push($savedStuds,$savedListing);
            }
        }
//        dd($savedStuds);
        return view('pages/dashboard/SavedItems/savedStuds/recycle-saved-studs', [
            'listings' => $savedStuds
        ]);
    }
    public function softDeleteListing($slug){
        $savedListings = $this->getAllListings();
        foreach ($savedListings as $savedListing){
            if($savedListing->listings->slug == $slug){
                $targetListing = $savedListing;
            }
        }
        $targetListing->trashed = true;
        $this->savedListingsRepository->save($targetListing);

        return redirect()->back();
    }
    public function permanentlyDeleteListing($slug){
        $savedListings = $this->getAllListings();
        foreach ($savedListings as $savedListing){
            if($savedListing->listings->slug == $slug){
                $targetListing = $savedListing;
            }
        }
        $this->savedListingsRepository->remove($targetListing);

        return redirect()->back();
    }

    public function recycleTrashedSavedListing($slug){
        $savedListings = $this->getAllListings();
        foreach ($savedListings as $savedListing){
            if($savedListing->listings->slug == $slug){
                $targetListing = $savedListing;
            }
        }
        $targetListing->trashed = false;
        $this->savedListingsRepository->save($targetListing);

        return redirect()->back();
    }
    public function savedPuppy(){
        $savedListings = $this->savedListingsRepository->matching(
            $this->savedListingsRepository->criteria()
                ->where(SavedListings::CUSTOMER, '=', Auth::user())
                ->where(SavedListings::TRASHED, '=', false)
        );
        $savedPuppy = [];
        foreach ($savedListings as $savedListing){
            if($savedListing->listings->type == new ListingsTypeEnum('puppy')){
                array_push($savedPuppy,$savedListing);
            }
        }
//        dd($savedStuds);
        return view('pages/dashboard/SavedItems/savedPuppy/saved-puppy', [
            'listings' => $savedPuppy
        ]);
    }
    public function trashedSavedPuppy(){
        $savedListings = $this->savedListingsRepository->matching(
            $this->savedListingsRepository->criteria()
                ->where(SavedListings::CUSTOMER, '=', Auth::user())
                ->where(SavedListings::TRASHED, '=', true)
        );
        $savedStuds = [];
        foreach ($savedListings as $savedListing){
            if($savedListing->listings->type == new ListingsTypeEnum('puppy')){
                array_push($savedStuds,$savedListing);
            }
        }
//        dd($savedStuds);
        return view('pages/dashboard/SavedItems/savedPuppy/recycle-saved-puppy', [
            'listings' => $savedStuds
        ]);
    }
    public function savedLitters(){
        $savedLitters = $this->savedLittersRepository->matching(
            $this->savedLittersRepository->criteria()
                ->where(SavedLitters::CUSTOMER, '=', Auth::user())
                ->where(SavedLitters::TRASHED, '=', false)
        );
//        dd($savedLitters);
        return view('pages/dashboard/SavedItems/savedLitters/saved-litters', [
            'listings' => $savedLitters
        ]);
    }
    public function trashedSavedLitters(){

        $savedLitters = $this->savedLittersRepository->matching(
            $this->savedLittersRepository->criteria()
                ->where(SavedLitters::CUSTOMER, '=', Auth::user())
                ->where(SavedLitters::TRASHED, '=', true)
        );
        return view('pages/dashboard/SavedItems/savedLitters/recycle-saved-litters', [
            'listings' => $savedLitters
        ]);
    }
    public function softDeleteLitters($slug){
        $savedLitters = $this->getAllLitters();
        foreach ($savedLitters as $savedLitter){
            if($savedLitter->litters->slug == $slug){
                $targetListing = $savedLitter;
            }
        }
        $targetListing->trashed = true;
        $this->savedLittersRepository->save($targetListing);

        return redirect()->back();
    }
    public function recycleTrashedSavedLitters($slug){
        $savedLitters = $this->getAllLitters();
        foreach ($savedLitters as $savedLitter){
            if($savedLitter->litters->slug == $slug){
                $targetListing = $savedLitter;
            }
        }
        $targetListing->trashed = false;
        $this->savedLittersRepository->save($targetListing);

        return redirect()->back();
    }
    public function permanentlyDeleteLitters($slug){
        $savedLitters = $this->getAllLitters();
        foreach ($savedLitters as $savedLitter){
            if($savedLitter->litters->slug == $slug){
                $targetListing = $savedLitter;
            }
        }
        $this->savedLittersRepository->remove($targetListing);

        return redirect()->back();
    }
}
