<?php

namespace App\Http\Controllers;

use App\Depoister;
use Illuminate\Http\Request;

class DepoisterController extends Controller
{
    public function index()
    {
        $depoisters = Depoister::paginate(20);
        $role = $this->getPermission("depoister");
        return view('depoisters.index',compact('depoisters','role'));
    }
}
