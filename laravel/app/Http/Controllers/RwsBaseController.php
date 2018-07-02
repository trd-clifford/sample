<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RwsBaseController extends Controller
{
    public function index() {
        $menu_index = request('menu');
        return view('rws.master', compact('menu_index'));
    }
}
