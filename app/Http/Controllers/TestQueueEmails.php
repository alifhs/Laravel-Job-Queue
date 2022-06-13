<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\TestSendEmail;

class TestQueueEmails extends Controller
{
    //

    public function sendTestEmails()
    {
        // $emailJobs = new TestSendEmail(1);
        // $this->dispatch($emailJobs);
        // TestSendEmail::dispatch(1);
        $arr = ['hello' => 'world', 'mouse' => 'keyboard'];
        dispatch(new TestSendEmail($arr))->onQueue('emails')->delay(now()->addMinutes(1));
    }
}
