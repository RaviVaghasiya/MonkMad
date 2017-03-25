<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\ClientInfo;

use Mail;

use Event;

use App\Events\SendMail;

use App\Mail\MyTestMail;	

use Nexmo\Laravel\Facade\Nexmo;

class ContactController extends Controller
{ 
	/*
	* Insert client information detail function.
	* @param  \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/

    public function insertData(Request $request){
       
      $this->validate($request,[
        'name' => 'required|min:4|max:35',
        'email' => 'required|email|unique:users',
        'contact' => 'required|min:10|max:12',
        'location'  => 'required|Alpha',
]);
           $ClientInfo = new ClientInfo;

           $ClientInfo->name = $request->name;
           $ClientInfo->email = $request->email;
           $ClientInfo->mobile_number = $request->contact;
           $ClientInfo->location = $request->location;
           $ClientInfo->requirement = $request->requirement;
           $clientId = $ClientInfo->save();

           if($clientId){
           	$ClientInfo->viewTemplate = "emails.adminmail";
           	//return $ClientInfo;
           }

           $addClient = $ClientInfo;
           //dd($addClient);

           //Event fired for Admin send mail...
           if($addClient){
           	Event::fire(new SendMail($addClient));
           }
           

          // SMS Send For Client Contact number...
		   Nexmo::message()->send([
			    'to' => $request->contact,
			    'from' => '9624593163',
			    'text' => 'Using the instance to send a message.'
		   ]);

		   // Send mail for client...
           $data = array('name'=>$request->name,'email'=>$request->email);

           Mail::send('emails.mailview', $data, function ($massage) use ($data){
	           $massage->to($data['email'] , $data['name'])->subject('MonkMad.Pvt.Ltd');

	           $massage->from('vaghasiyaravi247@gmail.com','Monk Mad');
 			});

           $request->session()->flash('alert-success','Your Detail Successfully Accept...' );
           return redirect()->intended('/');

   }
} 
