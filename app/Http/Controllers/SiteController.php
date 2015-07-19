<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function about_project()
    {
        return view('site.about_project')
            ->with('about_active', 'active');
    }

    public function site_map()
    {
        return view('site.site_map')
            ->with('site_active', 'active');
    }

    public function contact()
    {
        return view('site.contact')
            ->with('contact_active', 'active');
    }
}
