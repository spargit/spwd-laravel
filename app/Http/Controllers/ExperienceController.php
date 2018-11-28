<?php
// php artisan make:controller ExperienceController --resource
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Skill;
use App\Skillset;

class ExperienceController extends Controller
{
    public function __construct()
    {
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
        foreach ($skillsets as $skillset) {
            $experience[$skillset->title] = array(
                'description' => $skillset->description,
                'skills' => $skillset->skills
            );
        }

        return view('pages.experience.index', [
            'copyright' => $request->get('copyright'),
            'experience' => $experience
        ]);
    }
}
