<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SopGeneratorController extends Controller
{
    public function show() {
        return view('navigation.SOP_Generator.index');
    }
}
