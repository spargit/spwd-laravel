<?php
// php artisan make:migration create_skillset_table --create=skillset
// php artisan migrate
// php artisan make:controller SkillsetController --resource --model=Skillset
namespace App\Http\Controllers;

use App\Skillset;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SkillsetController extends Controller
{
    /**
     * Setup middleware
     * 
     * @return void
     */
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
        $skillsets = Skillset::all();
        return view('pages.skillsets.index', [
            'copyright' => $request->get('copyright'),
            'skillsets' => $skillsets
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
            return view('pages.skillsets.create', [
                'copyright' => $request->get('copyright')
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
            // User must  be authenticated.
            $this->middleware('auth');

            $validated = $request->validate([
                'title' => 'required|unique:skillset|max:255',
                'description' => 'nullable',
            ]);

            $skillset = new Skillset;
            $skillset->title = $request->title;
            $skillset->description = $request->description;
            $skillset->save();

            return redirect(route('skillsets.index'));
        } else {
            return redirect(route('login'));
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skillset  $skillset
     * @return \Illuminate\Http\Response
     */
    public function show(Skillset $skillset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skillset  $skillset
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Skillset $skillset)
    {
        if (Auth::check() && Auth::user()->email === 'mail@shawnparsons.ca') {
            $ss = Skillset::findOrFail($skillset->id);
            return view('pages.skillsets.edit', [
                'copyright' => $request->get('copyright'),
                'skillset' => $ss
            ]);
        } else {
            return redirect(route('login'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skillset  $skillset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skillset $skillset)
    {
        if (Auth::check() && Auth::user()->email === 'mail@shawnparsons.ca') {
            // User must  be authenticated.
            $this->middleware('auth');

            $validated = $request->validate([
                'description' => 'nullable',
            ]);

            $update = Skillset::findOrFail($skillset->id);
            $update->description = $request->description;
            $update->save();

            return redirect(route('skillsets.index'));   
        } else {
            return redirect(route('login'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skillset  $skillset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skillset $skillset)
    {   
        if (Auth::check() && Auth::user()->email === 'mail@shawnparsons.ca') {
            // Skillset::destroy($skillset);
            $delete = Skillset::findOrFail($skillset)->first();
            $delete->delete();

            return redirect(route('skillsets.index'));   
        } else {
            return redirect(route('login'));
        }
    }
}
