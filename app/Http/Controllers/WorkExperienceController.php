<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkExperience;

class WorkExperienceController extends Controller
{
    public function destroyWorkExperienceByID($workExperienceID) {

        $workExperience = WorkExperience::where("id", $workExperienceID)->delete();

        return response()->json("status", 200);
    }
}
