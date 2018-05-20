<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckOpenEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $openLetter;
    protected $openLinkOne;
    protected $openLinkTwo;

    /**
     * CheckOpenEmail constructor.
     * @param string $openLetter
     * @param string $openLinkOne
     * @param string $openLinkTwo
     */
    public function __construct(string $openLetter, string $openLinkOne, string $openLinkTwo)
    {
        $this->openLetter = $openLetter;
        $this->openLinkOne = $openLinkOne;
        $this->openLinkTwo = $openLinkTwo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('check_open_email',[
            'openLetter'=>$this->openLetter,
            'openLinkOne'=>$this->openLinkOne,
            'openLinkTwo'=>$this->openLinkTwo,
        ]);
    }
}
