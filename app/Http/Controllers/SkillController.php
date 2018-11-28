<?php
// php artisan make:migration create_skill_table --create=skill
// php artisan migrate
// php artisan make:controller SkillsetController --resource --model=Skill
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Skill;
use App\Skillset;

class SkillController extends Controller
{
    protected $skills = [
        'Code' => 'fa-code',
        'Platform' => 'fa-cubes',
        'Design' => 'fa-paint-brush',
        'Library' => 'fa-gear',
        'Framework' => 'fa-gears',
        'Tool' => 'fa-wrench',
        'Server' => 'fa-server',
        'Database' => 'fa-database',
        'System' => 'fa-bolt'
    ];

    public function __construct()
    {
        $this->middleware('auth')->except('index');
        $this->middleware('copyright');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $skills = Skill::orderBy('name')->get();
        return view('pages.skills.index', [
            'copyright' => $request->get('copyright'),
            'skills' => $skills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Auth::check() && Auth::user()->email === 'mail@shawnparsons.ca') {
            $skillsets = Skillset::all();
            return view('pages.skills.create', [
                'copyright' => $request->get('copyright'),
                'skillsets' => $skillsets,
                'skills' => $this->skills
            ]);
        } else {
            return redirect(route('login'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->email === 'mail@shawnparsons.ca') {
            $validated = $request->validate([
                'skillset' => 'required|max:255',
                'type' => 'required|max:255',
                'name' => 'required|unique:skill|max:255',
                'development' => 'nullable',
                'production' => 'nullable',
            ]);

            $skill = new Skill;
            $skill->skillset_id = $request->skillset;
            $skill->type = $request->type;
            $skill->name = $request->name;
            $skill->development = ($request->development === "on" ? 1 : 0);
            $skill->production = ($request->production === "on" ? 1 : 0);;
            $skill->save();

            return redirect(route('skills.index'));
        } else {
            return redirect(route('login'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Skill $skill)
    {
        if (Auth::check() && Auth::user()->email === 'mail@shawnparsons.ca') {
            $s = Skill::findOrFail($skill->id);
            $skillsets = Skillset::all();

            return view('pages.skills.edit', [
                'copyright' => $request->get('copyright'),
                'skillsets' => $skillsets,
                'skills' => $this->skills,
                'skill' => $s
            ]);
        } else {
            return redirect(route('login'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        if (Auth::check() && Auth::user()->email === 'mail@shawnparsons.ca') {
            $validated = $request->validate([
                'skillset' => 'required|max:255',
                'type' => 'required|max:255',
                'development' => 'nullable',
                'production' => 'nullable',
            ]);

            $skill = Skill::findOrFail($skill->id);
            $skill->skillset_id = $request->skillset;
            $skill->type = $request->type;
            $skill->development = ($request->development === "on" ? 1 : 0);
            $skill->production = ($request->production === "on" ? 1 : 0);;
            $skill->save();

            return redirect(route('skills.index'));
        } else {
            return redirect(route('login'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        if (Auth::check() && Auth::user()->email === 'mail@shawnparsons.ca') {
            $delete = Skill::findOrFail($skill->id);
            $delete->delete();

            return redirect(route('skills.index'));  
        } else {
            return redirect(route('login'));
        }
    }
}
