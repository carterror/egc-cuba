<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buy;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class BuysController extends Controller
{
    public function index()
    {
        $buys = Buy::with(['card'])->where('user_id', Auth::user()->id)->paginate(6);

        return view('buys.index', compact('buys'));
    }


    public function sms()
    {
//         AC1c34457a7bd2e56e4a21ed2817504243
// 49898f59f64d120e89a6c92ba2603422
// 5355016899
// 5352710704
        $sid = "AC1c34457a7bd2e56e4a21ed2817504243"; // Your Account SID from www.twilio.com/console
        $token = "49898f59f64d120e89a6c92ba2603422"; // Your Auth Token from www.twilio.com/console

        $client = new Client($sid, $token);
        $message = $client->messages->create(
        '+5352710704', // Text this number
        [
            'from' => '+18572144958', // From a valid Twilio number
            'body' => 'Hello from Twilio! Primeras pruebas Carlos Brayan sms a phone'
        ]
        );

        return $message->sid;
    }

}
