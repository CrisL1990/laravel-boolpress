<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\NewContact;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($data,[
            'name'=> 'required',
            'email'=> 'required|email',
            'message'=> 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'errors'=>$validator->errors()
            ]); 

        }

        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        Mail::to('lucchetta.cris@gmail.com')->send(new NewContact($lead));

        return response()->json([
            'success'=>true
        ]);

        
    }
}
