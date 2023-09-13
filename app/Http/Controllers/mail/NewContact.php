<?php

namespace App\Http\Controllers\mail;

use App\Http\Controllers\Controller;
use App\Mail\NewContact as MailNewContact;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;


class NewContact extends Controller
{
    public function email(Request $request)
    {
        $data = $request->all();
        $new_contact = new Contact();
        $new_contact->email = $data['email'];
        $new_contact->save();
        Mail::to("admin@example.com")->send(new MailNewContact($data['email'], $data['object'], $data['content']));
    }
}
