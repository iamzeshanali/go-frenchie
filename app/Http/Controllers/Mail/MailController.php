<?php

namespace App\Http\Controllers\Mail;

use App\Domain\Entities\Listings;
use App\Domain\Services\Persistence\IListingsRepository;
use App\Http\Controllers\Controller;
use App\Mail\ContactBreeder;
use Dms\Common\Structure\Web\EmailAddress;
use Dms\Core\Auth\IAdminRepository;
use Dms\Web\Laravel\Auth\LocalAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public $listingsRepository;
    public $admin;

    public function __construct(IListingsRepository $listingsRepository, IAdminRepository $admin)
    {
        $this->listingsRepository = $listingsRepository;
        $this->admin = $admin;
    }
    /**
     * send Emails
     */
    public function sendMailCustomerContactBreeder(Request $request)
    {
        $id = $request->get('listing');
        $listing = $this->listingsRepository->matching(
            $this->listingsRepository->criteria()
                ->where(Listings::ID,'=',(int)$id)
        )[0];

        $name = $request->get('name');
        $email = $request->get('email');
        $subject = $request->get('subject');
        $data = array(
            'message' => $request->message
        );
        $breederEmail = $listing->breeder->email->asString();

        $emailUsers = [];
        $admins = $this->admin->getAll();
        foreach ($admins as $user){
            if(in_array(1,$user->getRoleIds()->getAll()) == true){
                array_push($emailUsers,$user);
            }

        }
//        'to' will be the breeder associated with this entity
        Mail::to($breederEmail)->send(new ContactBreeder($name,$email,$subject,$data,$listing));
        foreach($emailUsers as $emailUser){
            $emailArray = (array)($emailUser);
            $emailname = (array)$emailArray["\x00Dms\Core\Model\Object\TypedObject\x00properties"]["emailAddress"];
            $email = $emailname["\x00Dms\Core\Model\Object\TypedObject\x00properties"]["string"];
            Mail::to($email)->send(new ContactBreeder($name,$email,$subject,$data,$listing));
        }


        return redirect()->back()->with('status','200');
    }
}
