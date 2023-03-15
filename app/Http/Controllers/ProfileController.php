<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\CivilStatus;
use App\Models\AcademicLevel;
use App\Models\EnglishLevel;
use App\Models\Education;
use App\Models\WorkExperience;
use App\Models\Question;
use App\Models\Answer;
use Carbon\Carbon;
use DataTables;
use Yajra\DataTables\CollectionDataTable;

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
        $immigrationStatusQuestions = Question::where('section', 'Immigration Status')->get();
        $healthQuestions = Question::where('section', 'Health')->get();
        $skillsQuestions = Question::where('section', 'Skills')->get();

        return view('candidate-form')
            ->with('civilStatuses', $civilStatuses)
            ->with('academicLevels', $academicLevels)
            ->with('englishLevels', $englishLevels)
            ->with('immigrationStatusQuestions', $immigrationStatusQuestions)
            ->with('healthQuestions', $healthQuestions)
            ->with('skillsQuestions', $skillsQuestions);
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
            'phone_number' => 'required',
            'email' => 'required',
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

        $profile = Profile::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'date_of_birth' => $request->date_of_birth,
            'age' => $age,
            'civil_status_id' => $request->civil_status_id,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'academic_level_id' => $request->academic_level_id,
            'desired_job' => $request->desired_job,
            'city' => $request->city,
            'state' => $request->state,
            'english_listening_level_id' => $request->english_listening_level_id,
            'english_speaking_level_id' => $request->english_speaking_level_id,
            'children_live_with_me' => $request->children_live_with_me,
            'children_dont_live_with_me' => $request->children_dont_live_with_me,
        ]);

        foreach ($request->input('school_names', []) as $i => $school_name) {
            Education::create([
                'profile_id' => $profile->id,
                'school_name' => $school_name,
                'year' => $request->input('years.' . $i),
                'area' => $request->input('areas.' . $i),
                'status' => $request->input('statuses.' . $i),
                'education_level_id' => $request->input('education_level_ids.' . $i),
            ]);
        }

        foreach ($request->input('positions', []) as $i => $position) {
            WorkExperience::create([
                'profile_id' => $profile->id,
                'position' => $position,
                'time_worked' => $request->input('times_worked.' . $i),
                'date_worked' => $request->input('dates_worked.' . $i),
                'company' => $request->input('companies.' . $i),
                'activity' => $request->input('activities.' . $i),
                'tool_used' => $request->input('tools_used.' . $i),
            ]);
        }

        foreach ($request->input('question_ids', []) as $i => $question) {
            Answer::create([
                'profile_id' => $profile->id,
                'question_id' => $question,
                'answer' => $request->input('answers.' . $i),
            ]);
        }

        return redirect()->route('candidate-form')
                        ->with('success','Información registrada con éxito.');
    }

    /**
     * Candidates list
     */
    public function index(Request $request)
    {
        $profiles = Profile::all();
        $civilStatuses = CivilStatus::all();
        $academicLevels = AcademicLevel::all();

        if ($request->ajax()) {

            $data = Profile::select('*');

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('civil_status_id')) {
                            $instance->where('civil_status_id', $request->get('civil_status_id'));
                        }
                        if ($request->get('academic_level_id')) {
                            $instance->where('academic_level_id', $request->get('academic_level_id'));
                        }
                        if ($request->get('start_date') && $request->get('end_date')) {
                            $instance->whereBetween('date_of_birth', [$request->get('start_date'), $request->get('end_date')]);
                        }
                        if ($request->get('start_date'))  {
                            $instance->whereBetween('date_of_birth', [$request->get('start_date'), Carbon::now()->format('Y-m-d')]);
                        }
                        if ($request->get('end_date'))  {
                            $instance->whereBetween('date_of_birth', ['1900-01-01', $request->get('end_date')]);
                        }
                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('name', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%");
                            });
                        }
                    })
                    ->addColumn('birthday', function ($data) {
                        return Carbon::createFromFormat('Y-m-d', $data->date_of_birth)->format('d-m-Y');
                    })
                    ->addColumn('createdAt', function ($data) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y H:i:s');
                    })
                    ->addColumn('showProfile', function ($data) {
                        return "<a href='" . url("admin/profiles", $data->id) ."'>Ver perfil</a>";
                    })

                    ->rawColumns(['showProfile', 'birthday', 'createdAt'])
                    ->make(true);
        }

        return view('admin.profiles.index')
            ->with('profiles', $profiles)
            ->with('civilStatuses', $civilStatuses)
            ->with('academicLevels', $academicLevels);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::where('id', $id)
                    ->with('civilStatus')
                    ->with('academicLevel')
                    ->with('englishLevel')
                    ->with('educations')
                    ->with('workExperiences')
                    ->with('answers')
                    ->first();

        return view('admin.profiles.show', compact('profile'));
    }
}
