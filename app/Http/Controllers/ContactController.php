<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        $role = $this->getPermission("contact");
        return view('contacts.index',compact('contacts','role'));
    }


}
