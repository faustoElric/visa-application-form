<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\CivilStatus;
use App\Models\AcademicLevel;
use App\Models\EnglishLevel;

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
}
