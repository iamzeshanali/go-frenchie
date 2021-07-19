<?php

namespace App\Http\Controllers\Mail;

use App\Domain\Entities\Listings;
use App\Domain\Services\Persistence\IListingsRepository;
use App\Http\Controllers\Controller;
use App\Mail\ContactBreeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public $listingsRepository;

    public function __construct(IListingsRepository $listingsRepository)
    {
        $this->listingsRepository = $listingsRepository;
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
//        dd($breederEmail);
//        'to' will be the breeder associated with this entity
        Mail::to($breederEmail)->send(new ContactBreeder($name,$email,$subject,$data,$listing));
        Mail::to('zeeshanalibenifshi@gmail.com')->send(new ContactBreeder($name,$email,$subject,$data,$listing));
//        Mail::send('layouts/mail',$data, function ($messages) use ($user){
//            $messages->to($user['to']);
//            $messages->subject('Listings Contact');
//        });

        return redirect()->back()->with('status','200');
    }
}
