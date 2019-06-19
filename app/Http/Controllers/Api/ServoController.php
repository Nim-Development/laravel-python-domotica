<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServoResource;

use Illuminate\Http\Request;
use App\Servo;

class ServoController extends Controller
{
       // Return all servo statuses
       public function get_servos()
       {
            return ServoResource::collection( Servo::all() );
       }
   
       public function servo($action, $id, $rotate = null)
       {
           // check if servo exits
           if((int)$id > Servo::count()){
               return response()->json(['error' => 'Servo:('. $id .') does not exist']);
           }
   
           $resp = \PythonDomotics::servo($action,$id, $rotate);
           // execute servo command (via package?)
           // & handle raspberry/python response
           if(!$resp){
               //handle error
               dd('ERROR');
           }
   
           // change servo status in database
           $servo = Servo::find($id);
               $servo->status = $resp->servo_rotation;
           $servo->save();
   
           // return API response (status on or off?)
           return new ServoResource([
               'action' => $action,
               'servo_status' => (int)$servo->status,
               'servo' => $id,
               'user' => 1,
           ]);
       }
}
