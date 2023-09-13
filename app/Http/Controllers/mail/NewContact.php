<?php

namespace App\Http\Controllers\mail;

use App\Http\Controllers\Controller;
use App\Mail\NewContact as MailNewContact;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewContact extends Controller
{
    public function email(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'object' => 'required|string',
            'content' => 'required|string',
        ], [
            'email.required' => 'L\'E-mail è obbligatoria',
            'email.email' => 'L\'E-mail inserita non è valida',
            'object.required' => 'L\' oggetto è obbligatorio',
            'content.required' => 'Il contenuto dell\'E-mail è obbligatorio',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $new_contact = new Contact();
        $new_contact->email = $data['email'];
        $new_contact->save();
        Mail::to($data['email'])->send(new MailNewContact($data['email'], $data['object'], $data['content']));
    }
}
