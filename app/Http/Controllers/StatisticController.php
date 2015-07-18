<?php

namespace App\Http\Controllers;

use App\Field;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    public function index()
    {
        $fields   = Field::lists('name', 'id');

        return view('statistics.statistic')
            ->with('fields', $fields);
    }
}
