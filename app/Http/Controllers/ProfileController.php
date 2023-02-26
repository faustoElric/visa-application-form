<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\CivilStatus;
use App\Models\AcademicLevel;
use App\Models\EnglishLevel;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Academic Degreemes list
     */
    public function profileForm()
    {
        $civilStatuses = CivilStatus::all();
        $academicLevels = AcademicLevel::all();
        $englishLevels = EnglishLevel::all();

        return view('candidate-form')
            ->with('civilStatuses', $civilStatuses)
            ->with('academicLevels', $academicLevels)
            ->with('englishLevels', $englishLevels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'date_of_birth' => 'required',
            'civil_status_id' => 'required',
            'academic_level_id' => 'required',
            'desired_job' => 'required',
            'city' => 'required',
            'state' => 'required',
            'english_listening_level_id' => 'required',
            'english_speaking_level_id' => 'required',
            'children_live_with_me' => 'required',
            'children_dont_live_with_me' => 'required',
        ]);

        $age = Carbon::parse($request->date_of_birth)->age;

        Profile::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'date_of_birth' => $request->date_of_birth,
            'age' => $age,
            'civil_status_id' => $request->civil_status_id,
            'academic_level_id' => $request->academic_level_id,
            'desired_job' => $request->desired_job,
            'city' => $request->city,
            'state' => $request->state,
            'english_listening_level_id' => $request->english_listening_level_id,
            'english_speaking_level_id' => $request->english_speaking_level_id,
            'children_live_with_me' => $request->children_live_with_me,
            'children_dont_live_with_me' => $request->children_dont_live_with_me,
        ]);

        return redirect()->route('candidate-form')
                        ->with('success','Información registrada con éxito.');
    }
}
