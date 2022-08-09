<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class faqController extends Controller
{
    public function showFaq()
    {
        return view('FAQ.faq');
    }
}
