<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Support\Facades\App;

class GetController extends Controller
{
    public function get_municipalities_by_id($id)
    {
        $region = Region::find($id);
        $municipalities = $region->get_municipalities;
        return $municipalities;
    }
}
