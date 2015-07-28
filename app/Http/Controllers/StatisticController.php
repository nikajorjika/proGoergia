<?php

namespace App\Http\Controllers;

use App\Field;
use App\Region;
use App\SeekTraining;
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

    public function search_statistic($field_id)
    {
        $trainings      = SeekTraining::all();
        $training_array = array();
        foreach ($trainings as &$training) {
            foreach ($training->fields as $field) {
                if ($field->id == $field_id) {
                    $training->municipalities;
                    $training['region'] = Region::where('id', '=', $training->municipalities[0]->region_id)->get();
                    $training_array[] = $training;
                }
            }
        }

        $country_array    = array('quantity' => 0);
        $regions_array    = array();
        $regions_id_array = array();
        foreach ($training_array as $training) {
            $country_array['quantity'] += $training['quantity'];
            if (!in_array($training['region'][0]['id'], $regions_id_array)) {
                $regions_id_array[] = $training['region'][0]['id'];
                $regions_array[$training['region'][0]['id']] = array(
                    'name'     => $training['region'][0]['name'],
                    'quantity' => $training['quantity']
                );
            } else {
                $regions_array[$training['region'][0]['id']]['quantity'] += $training['quantity'];
            }
        }

        $municipalities_array    = array();
        $municipalities_id_array = array();
        foreach ($training_array as $training) {
            if (!in_array($training['municipalities'][0]['id'], $municipalities_id_array)) {
                $municipalities_id_array[] = $training['municipalities'][0]['id'];
                $municipalities_array[$training['municipalities'][0]['id']] = array(
                    'name'     => $training['municipalities'][0]['name'],
                    'quantity' => $training['quantity']
                );
            } else {
                $municipalities_array[$training['municipalities'][0]['id']]['quantity'] += $training['quantity'];
            }
        }

        return json_encode(['regions' => $regions_array, 'municipalities' => $municipalities_array, 'country' => $country_array]);
    }
}
