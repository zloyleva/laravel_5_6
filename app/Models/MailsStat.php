<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class MailsStat extends Model
{
    protected $fillable = [
        'user_id', 'type', 'hash', 'status_send_mail', 'status_open'
    ];

    /**
     * @param array $data
     * @param int $userId
     * @return bool
     */
    public function createMailWrite(array $data, int $userId){
        foreach ($data as $field => $item){
            $status = $this->create([
                'user_id'=>$userId,
                'type' => $field,
                'hash' => $item,
                'status_send_mail' => true,// todo: set status after checking send mail
                'status_open' => false,
            ]);
            if(!$status){
                return false;
            }
        }
        return true;
    }

    /**
     * @param Request $request
     */
    public function setOpenMail(Request $request){

        $this
            ->where('hash', $request->openLetter)
            ->where('status_send_mail', true)
            ->update(['status_open'=>true]);

        dd($request->openLetter);
    }
}
