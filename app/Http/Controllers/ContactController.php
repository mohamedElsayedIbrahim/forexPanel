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
        $conatcs = Contact::all();
        $role = $this->getPermission("contact");
        return view('contacts.index',compact('conatcs','role'));
    }


}
