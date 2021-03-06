<?php

namespace App\Http\Controllers;

use App\Decleration;
use App\Editable;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function getAdminarea()
    {
        if (!Auth::user() || Auth::user() -> role == 100)
        {
            Redirect::to('/')->send();
        }

        $declerations = Decleration::all();

        return view('admin.admin_area',[
            'declerations' => $declerations,
        ]);
    }

    public function getViewmore($id)
    {
        if (!Auth::user() || Auth::user() -> role == 100)
        {
            Redirect::to('/')->send();
        }

        $decleration = Decleration::findOrNew($id);
        $editables   = $decleration -> editables -> lists('field_name') -> toArray();

        return view('admin.view_more',[
            'decleration' => $decleration,
            'editables'   => $editables,
        ]);
    }

    public function getEditable($decleration_id, $field_name)
    {
        if (!Auth::user() || Auth::user() -> role == 100)
        {
            Redirect::to('/')->send();
        }

        $editable = Editable::checkIfEditable($decleration_id, $field_name);

        if ($editable)
        {
            Editable::deleteEditable($decleration_id, $field_name);
        }
        else
        {
            Editable::create(
                [
                    'decleration_id' => $decleration_id,
                    'field_name'     => $field_name,
                ]
            );
        }

        return Redirect::Back();
    }
}
