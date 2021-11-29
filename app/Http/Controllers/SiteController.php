<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('sites.welcome');
    }

    public function faqs()
    {
        return view('sites.faqs');
    }

    public function contactUs()
    {
        return view('sites.contact-us');
    }

    public function cart()
    {
        return view('sites.cart');
    }
}
