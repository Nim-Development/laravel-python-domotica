<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Relay;
use App\Http\Resources\RelaysResource;

class RelayController extends Controller
{
    // Return all relay statuses
    public function get_relays()
    {
        $relays = Relay::all();
            // return a api response as a API resource
            return RelaysResource::collection($relays);
    }

    // Switch relay
    /*
    * $action = switch, test
    * $sid = relay_id
    */
    public function relay($action,$sid)
    {
        // check if relay exits
        if((int)$sid > Relay::count()){
            return response()->json(['error' => 'Relay:('. $sid .') does not exist']);
        }

        $resp = \PythonDomotics::relay($action,$sid);
        // execute relay command (via package?)
        // & handle raspberry/python response
        if(!$resp){
            //handle error
            dd('ERROR');
        }

        // change relay status in database
        $relay = Relay::find($sid);
            $relay->status = $resp->relay_status;
        $relay->save();

        // return API response (status on or off?)
        return new RelaysResource([
            'action' => $action,
            'relay_status' => (int)$relay->status,
            'relay' => $sid,
            'user' => 1,
        ]);
    }
}
