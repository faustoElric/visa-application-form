<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Township;

class TownshipsController extends Controller
{
    public function townshipListByState($stateID) {

        $townships = Township::where("state_id", $stateID)->get();

        return response()->json($townships);
    }
}
