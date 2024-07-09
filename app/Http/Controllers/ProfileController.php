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
use App\Models\State;
use App\Models\Township;
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
        $states = State::all();
        $immigrationStatusQuestions = Question::where('section', 'Immigration Status')->get();
        $healthQuestions = Question::where('section', 'Health')->get();
        $skillsQuestions = Question::where('section', 'Skills')->get();
        $generalQuestions = Question::where('section', 'General')->get();

        return view('candidate-form')
            ->with('civilStatuses', $civilStatuses)
            ->with('academicLevels', $academicLevels)
            ->with('englishLevels', $englishLevels)
            ->with('states', $states)
            ->with('immigrationStatusQuestions', $immigrationStatusQuestions)
            ->with('healthQuestions', $healthQuestions)
            ->with('skillsQuestions', $skillsQuestions)
            ->with('generalQuestions', $generalQuestions);
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
            'phone_number' => 'required',
            'secondary_phone_number' => 'required',
            'email' => 'required',
            'academic_level_id' => 'required',
            'state_id' => 'required',
            'township_id' => 'required',
            'english_level_id' => 'required',
            'children_live_with_me' => 'required',
            'children_dont_live_with_me' => 'required',
            'dui'  => 'required',
            'visa_type'  => 'required',
            'has_passport'  => 'required',
            'gender'  => 'required',
            'employment_status'  => 'required',
        ]);

        $age = Carbon::parse($request->date_of_birth)->age;

        $profile = Profile::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'date_of_birth' => $request->date_of_birth,
            'age' => $age,
            'phone_number' => $request->phone_number,
            'secondary_phone_number' => $request->secondary_phone_number,
            'email' => $request->email,
            'academic_level_id' => $request->academic_level_id,
            'state_id' => $request->state_id,
            'township_id' => $request->township_id,
            'english_level_id' => $request->english_level_id,
            'children_live_with_me' => $request->children_live_with_me,
            'children_dont_live_with_me' => $request->children_dont_live_with_me,
            'dui'  => $request->dui,
            'visa_type'  => $request->visa_type,
            'has_passport'  => $request->has_passport,
            'gender'  => $request->gender,
            'employment_status'  => $request->employment_status,
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
                'start_date_worked' => $request->input('start_date_worked.' . $i),
                'end_date_worked' => $request->input('end_date_worked.' . $i),
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
        $englishLevels = EnglishLevel::all();
        $academicLevels = AcademicLevel::all();

        if ($request->ajax()) {
            $data = Profile::with('workExperiences')->select('*');

            $data = Profile::with(['workExperiences' => function ($query) use ($request) {
                // Filtrar por posición en las experiencias laborales
                if ($request->get('position')) {
                    $query->where('position', 'like', '%' . $request->input('position') . '%');
                }
            }])->select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($query) use ($request) {
                    // Filtrar por tipo de visa
                    if ($request->get('visa_type')) {
                        $query->where('visa_type', $request->input('visa_type'));
                    }
                    // Filtrar por género
                    if ($request->get('gender')) {
                        $query->where('gender', $request->input('gender'));
                    }
                    // Filtrar por rango de edad
                    if ($request->get('min_age') && $request->get('max_age')) {
                        $query->whereBetween('age', [$request->input('min_age'), $request->input('max_age')]);
                    } elseif ($request->get('min_age')) {
                        $query->where('age', '>=', $request->input('min_age'));
                    } elseif ($request->get('max_age')) {
                        $query->where('age', '<=', $request->input('max_age'));
                    }
                    // Filtrar por nivel de inglés
                    if ($request->get('english_level_id')) {
                        $query->where('english_level_id', $request->input('english_level_id'));
                    }
                    // Filtrar por rango de fecha de creación
                    if ($request->get('start_date') && $request->get('end_date')) {
                        $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date'))->startOfDay();
                        $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date'))->endOfDay();
                        $query->whereBetween('created_at', [$startDate, $endDate]);
                    } elseif ($request->get('start_date')) {
                        $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date'))->startOfDay();
                        $query->where('created_at', '>=', $startDate);
                    } elseif ($request->get('end_date')) {
                        $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date'))->endOfDay();
                        $query->where('created_at', '<=', $endDate);
                    }
                    // Filtrar por nombre, DUI, número de teléfono o email
                    if ($request->filled('search')) {
                        $search = $request->input('search');
                        $query->where(function ($q) use ($search) {
                            $q->where('name', 'like', "%$search%")
                                ->orWhere('dui', 'like', "%$search%")
                                ->orWhere('phone_number', 'like', "%$search%")
                                ->orWhere('email', 'like', "%$search%");
                        });
                    }
                })
                ->addColumn('birthday', function ($data) {
                    return Carbon::parse($data->date_of_birth)->format('d-m-Y');
                })
                ->addColumn('createdAt', function ($data) {
                    return Carbon::parse($data->created_at)->format('d-m-Y H:i:s');
                })
                ->addColumn('showProfile', function ($data) {
                    return "<a href='" . url("admin/profiles", $data->id) . "'>Ver perfil</a>";
                })
                ->rawColumns(['showProfile', 'birthday', 'createdAt'])
                ->make(true);
        }

        return view('admin.profiles.index')
            ->with('profiles', $profiles)
            ->with('englishLevels', $englishLevels)
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

    public function checkingDUI($dui) {
        $dui = Profile::where('dui', $dui);

        if ($dui->count() > 0) {
            return response()->json([
                'status'=> 'success',
                'statusCode'=> 200
            ]);
        } else {
            return response()->json([
                'status'=> 'fail',
                'statusCode'=> 404
            ]);
        }
    }
}
