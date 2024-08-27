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
use DB;

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
            $query = DB::table('profiles')
                ->leftJoin('work_experiences', 'profiles.id', '=', 'work_experiences.profile_id')
                ->select([
                    'profiles.id',
                    'profiles.name',
                    'profiles.lastname',
                    'profiles.date_of_birth',
                    'profiles.dui',
                    'profiles.phone_number',
                    'profiles.email',
                    'profiles.visa_type',
                    'profiles.gender',
                    'profiles.age',
                    'profiles.english_level_id',
                    'profiles.created_at',
                    'work_experiences.position'
                ])
                ->orderBy('profiles.created_at', 'desc');

            // Apply filters
            if ($request->filled('position')) {
                $query->where('work_experiences.position', 'like', '%' . $request->input('position') . '%');
            }
            if ($request->filled('visa_type')) {
                $query->where('profiles.visa_type', $request->input('visa_type'));
            }
            if ($request->filled('gender')) {
                $query->where('profiles.gender', $request->input('gender'));
            }
            if ($request->filled('min_age') && $request->filled('max_age')) {
                $query->whereBetween('profiles.age', [$request->input('min_age'), $request->input('max_age')]);
            } elseif ($request->filled('min_age')) {
                $query->where('profiles.age', '>=', $request->input('min_age'));
            } elseif ($request->filled('max_age')) {
                $query->where('profiles.age', '<=', $request->input('max_age'));
            }
            if ($request->filled('english_level_id')) {
                $query->where('profiles.english_level_id', $request->input('english_level_id'));
            }
            if ($request->filled('start_date') && $request->filled('end_date')) {
                $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date'))->startOfDay();
                $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date'))->endOfDay();
                $query->whereBetween('profiles.created_at', [$startDate, $endDate]);
            } elseif ($request->filled('start_date')) {
                $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date'))->startOfDay();
                $query->where('profiles.created_at', '>=', $startDate);
            } elseif ($request->filled('end_date')) {
                $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date'))->endOfDay();
                $query->where('profiles.created_at', '<=', $endDate);
            }
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('profiles.name', 'like', "%$search%")
                        ->orWhere('profiles.dui', 'like', "%$search%")
                        ->orWhere('profiles.phone_number', 'like', "%$search%")
                        ->orWhere('profiles.email', 'like', "%$search%");
                });
            }

            $query->distinct();

            return datatables()->of($query)
                ->addColumn('birthday', function ($row) {
                    return Carbon::parse($row->date_of_birth)->format('d-m-Y');
                })
                ->addColumn('createdAt', function ($row) {
                    return Carbon::parse($row->created_at)->format('d-m-Y H:i:s');
                })
                ->addColumn('showProfile', function ($row) {
                    return "<a href='" . url("admin/profiles", $row->id) . "'>Ver perfil</a>";
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
            ->with('state')
            ->with('township')
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

    public function totalUsers() {
        // Calcular el rango de fechas
        $currentMonday = Carbon::now()->startOfWeek();
        $lastMonday = $currentMonday->copy()->subWeek();

        // Contar los usuarios registrados en el rango de fechas
        $totalMen = Profile::where('gender', 'Masculino')
                        ->whereBetween('created_at', [$lastMonday, $currentMonday])->count();

        $totalWomen = Profile::where('gender', 'Femenino')
                        ->whereBetween('created_at', [$lastMonday, $currentMonday])->count();

        $data = [
            'totalMen' => $totalMen,
            'totalWomen' => $totalWomen
        ];

        return response()->json([
            'data' => $data,
            'status'=> 'success',
            'statusCode'=> 200
        ]);
    }
}
