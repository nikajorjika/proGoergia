<?php

namespace App\Http\Controllers;

use App\Decleration;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function getAdminarea()
    {
        $declerations = Decleration::all();

        return view('admin.admin_area',[
            'declerations' => $declerations,
        ]);
    }
    public function getViewmore($id)
    {
        $decleration = Decleration::findOrNew($id);

        return view('admin.view_more',[
            'decleration' => $decleration,
        ]);
    }
}
