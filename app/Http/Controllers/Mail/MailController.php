<?php

namespace App\Http\Controllers\Mail;

use App\Domain\Entities\EmailLogs;
use App\Domain\Entities\Listings;
use App\Domain\Services\Persistence\IEmailLogsRepository;
use App\Domain\Services\Persistence\IListingsRepository;
use App\Http\Controllers\Controller;
use App\Mail\ContactBreeder;
use App\Mail\ContactUs;
use Carbon\Carbon;
use DateInterval;
use DateTimeInterface;
use DateTimeZone;
use Dms\Common\Structure\DateTime\Date;
use Dms\Common\Structure\DateTime\DateTime;
use Dms\Common\Structure\DateTime\TimezonedDateTime;
use Dms\Common\Structure\Type\StringValueObject;
use Dms\Common\Structure\Web\EmailAddress;
use Dms\Common\Structure\Web\Html;
use Dms\Core\Auth\IAdminRepository;
use Dms\Core\Model\Object\Entity;
use Dms\Web\Laravel\Auth\LocalAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public $listingsRepository;
    public $admin;
    public $emailLogsRepository;

    public function __construct(IListingsRepository $listingsRepository, IAdminRepository $admin, IEmailLogsRepository $emailLogsRepository)
    {
        $this->listingsRepository = $listingsRepository;
        $this->admin = $admin;
        $this->emailLogsRepository = $emailLogsRepository;
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
        $from = $request->get('email');
        $subject = $request->get('subject');
        $data = array(
            'message' => $request->message
        );
        $breederEmail = $listing->breeder->email->asString();

        $emailUsers = [];
        $admins = $this->admin->getAll();
//        dd($admins);
        foreach ($admins as $user){
            if(in_array(1,$user->getRoleIds()->getAll()) == true){
                array_push($emailUsers,$user);
            }

        }
//        dd($emailUsers);
//        'to' will be the breeder associated with this entity
//        Mail::to($breederEmail)->send(new ContactBreeder($name,$email,$subject,$data,$listing));
        $sentEmails = '';
        foreach($emailUsers as $emailUser){
            $emailArray = (array)($emailUser);
            $emailname = (array)$emailArray["\x00Dms\Core\Model\Object\TypedObject\x00properties"]["emailAddress"];
            $email = $emailname["\x00Dms\Core\Model\Object\TypedObject\x00properties"]["string"];
            Mail::to($email)->send(new ContactBreeder($name,$from,$subject,$data,$listing));
            $sentEmails= $sentEmails.''.$email.',';
        }

        date_default_timezone_set("Asia/Karachi");
        $date = date("Y-m-d H:i:s e");
//        dd($date);


        $newEmail = new EmailLogs();
        $newEmail->name = $name;
        $newEmail->from = new EmailAddress($email);
        $newEmail->to = new Html($sentEmails);
        $newEmail->subject = $subject;
        $newEmail->message = new Html($request->message);
        $OtherData = (string)$listing->getId();
        $newEmail->otherData = new Html($OtherData);
        $newEmail->sentTime = $date;

        $this->emailLogsRepository->save($newEmail);

        return redirect()->back()->with('status','200');
    }
    public function sendContactUsMail(Request $request)
    {

        $name = $request->get('name');
        $from = $request->get('email');
        $data = array(
            'message' => $request->message
        );

        $emailUsers = [];
        $admins = $this->admin->getAll();
        foreach ($admins as $user){
            if(in_array(1,$user->getRoleIds()->getAll()) == true){
                array_push($emailUsers,$user);
            }

        }
        $sentEmails = '';
//        dd($name);
//        'to' will be the breeder associated with this entity
//        Mail::to($emailUsers)->send(new ContactUs($name,$email,$data));
        foreach($emailUsers as $emailUser){
            $emailArray = (array)($emailUser);
            $emailname = (array)$emailArray["\x00Dms\Core\Model\Object\TypedObject\x00properties"]["emailAddress"];
            $email = $emailname["\x00Dms\Core\Model\Object\TypedObject\x00properties"]["string"];
//            dd($email);
            Mail::to($email)->send(new ContactUs($name,$from,$data));
            $sentEmails= $sentEmails.''.$email.',';
        }
        date_default_timezone_set("Asia/Karachi");
        $date = date("Y-m-d H:i:s e");
        $newEmail = new EmailLogs();
        $newEmail->name = $name;
        $newEmail->from = new EmailAddress($from);
        $newEmail->to = new Html($sentEmails);
        $newEmail->subject = 'Contact Us by '.$name;
        $newEmail->message = new Html($request->message);
        $OtherData = '';
        $newEmail->otherData = new Html($OtherData);
        $newEmail->sentTime = $date;

        $this->emailLogsRepository->save($newEmail);

        return redirect()->back()->with('status','200');
    }
}
