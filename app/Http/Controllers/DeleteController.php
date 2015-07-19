<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SeekTraining;
use App\Training;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function delete_seek($id)
    {
        if(Auth::User()->role == 2){
            $training = SeekTraining::find($id);
            if($training == null){
                return redirect('/');
            }else{
                $training->delete();
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }

    public function delete_announcement($id)
    {
        if(Auth::User()->role == 1){
            $training = Training::find($id);
            if($training == null){
                return redirect('/');
            }else{
                $training->delete();
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }
}
