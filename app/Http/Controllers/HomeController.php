<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpenEmailRequest;
use App\Mail\CheckOpenEmail;
use App\Models\MailsStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param MailsStat $mailsStat
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(MailsStat $mailsStat)
    {
        $user = Auth::user();

        $openLetter = $this->getHash('openLetter', $user->id, date('d-m-Y H-i-s'));
        $openLinkOne = $this->getHash('openLinkOne', $user->id, date('d-m-Y H-i-s'));
        $openLinkTwo = $this->getHash('openLinkTwo', $user->id, date('d-m-Y H-i-s'));

        $status = $mailsStat->createMailWrite([
            'letter'=>$openLetter,
            'link_1'=>$openLinkOne,
            'link_2'=>$openLinkTwo
        ], $user->id);

        if($status){
            // Todo add check sending mail
            Mail::to($user->email)
                ->send(new CheckOpenEmail($openLetter, $openLinkOne,$openLinkTwo));
//                ->queue(new QueueSendMail());
        }

        return view('home');
    }

    /**
     * @param Request $request
     * @param MailsStat $mailsStat
     * @return mixed
     *
     */
    public function openLetter(Request $request, MailsStat $mailsStat){

        if($this->isHasOpenHash($request)){
            $mailsStat->setOpenMail($request);
        }

        $image = base64_decode("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=");
        return response($image)
            ->header('Content-Type', 'image/png');
    }

    /**
     * @param string $str
     * @param int $userId
     * @param string $letterId
     * @return string
     */
    protected function getHash(string $str,int $userId, string $letterId){
        return md5($str.$userId.$letterId);
    }

    /**
     * @param $request
     * @return bool
     */
    protected function isHasOpenHash($request){
        return isset($request->openLetter) && strlen($request->openLetter) == 32;
    }
}
