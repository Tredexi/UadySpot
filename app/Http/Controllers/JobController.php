<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajo;
use App\Models\Resume;
use App\Models\JobApplication;
use App\Models\FavoriteJob;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(Request $request)
    {

        // Iniciar consulta
        $query = Trabajo::query();

        // 1. Buscar por título o empresa
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('company', 'LIKE', "%{$search}%");

            });

        }

        // 2. Filtro ubicación
        if ($request->filled('location')) {

            $query->where(
                'location',
                'LIKE',
                "%{$request->location}%"
            );

        }

        // 3. Modalidad
        if ($request->filled('modality')) {

            $query->whereIn(
                'modality',
                $request->modality
            );

        }

        // 4. Tipo empleo
        if ($request->filled('type')) {

            $query->whereIn(
                'type',
                $request->type
            );

        }

        // PAGINACIÓN
        $jobs = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'jobs.index',
            compact('jobs')
        );

    }


    public function favorites()
    {

        $favorites = FavoriteJob::with('trabajo')
            ->where(
                'user_id',
                auth()->id()
            )
            ->latest()
            ->get();

        return view(
            'jobs.favoritos',
            compact('favorites')
        );

    }

    public function destroyFavorite($id)
    {

        $favorite = FavoriteJob::findOrFail($id);

        if(
            $favorite->user_id != auth()->id()
        ){
            abort(403);
        }

        $favorite->delete();

        return back()->with(
            'success',
            'Favorito eliminado'
        );

    }

    public function toggleFavorite($id)
    {

        $favorite = FavoriteJob::where(
            'user_id',
            auth()->id()
        )
        ->where(
            'trabajo_id',
            $id
        )
        ->first();

        if($favorite){

            $favorite->delete();

        }else{

            FavoriteJob::create([

                'user_id' => auth()->id(),
                'trabajo_id' => $id

            ]);

        }

        return back();

    }
    public function detail($id)
    {

        $job = Trabajo::findOrFail($id);

        return view(
            'jobs.detail',
            compact('job')
        );

    }
    public function cv()
    {

        $resume = auth()->user()->resume;

        $applications = auth()->user()
            ->applications()
            ->latest()
            ->take(5)
            ->get();

        $favorites = auth()->user()
            ->favoriteJobs()
            ->latest()
            ->take(5)
            ->get();

        return view(
            'jobs.cv',
            compact(
                'resume',
                'applications',
                'favorites'
            )
        );

    }

    public function editCv()
    {

        $resume = Resume::where(
            'user_id',
            auth()->id()
        )->first();

        return view(
            'jobs.edit.cv',
            compact('resume')
        );

    }

    public function updateCv(Request $request)
{

    $request->validate([

        'phone' => 'nullable|string|max:255',
        'career' => 'nullable|string|max:255',
        'university' => 'nullable|string|max:255',
        'semester' => 'nullable|string|max:255',
        'experience' => 'nullable|string',
        'skills' => 'nullable|string',
        'education' => 'nullable|string',
        'languages' => 'nullable|string',

        'profile_photo' => 'nullable|image|max:2048',

        'cv_file' => 'nullable|mimes:pdf|max:5120',

    ]);

    $resume = Resume::firstOrCreate([

        'user_id' => auth()->id()

    ]);

    // FOTO
    if($request->hasFile('profile_photo')){

        $path = $request
            ->file('profile_photo')
            ->store('profiles', 'public');

        auth()->user()->update([

            'profile_photo' => $path

        ]);

    }

    // PDF CV
    if($request->hasFile('cv_file')){

        $cvPath = $request
            ->file('cv_file')
            ->store('cv', 'public');

        $resume->cv_file = $cvPath;

    }

    $resume->phone = $request->phone;
    $resume->career = $request->career;
    $resume->university = $request->university;
    $resume->semester = $request->semester;
    $resume->experience = $request->experience;
    $resume->skills = $request->skills;
    $resume->education = $request->education;
$resume->languages = $request->input('languages');
    $resume->save();

    return redirect()
        ->route('jobs.cv')
        ->with(
            'success',
            'CV actualizado correctamente'
        );

}

    public function applications()
{

    $applications = JobApplication::with('trabajo')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view(
        'jobs.postulaciones',
        compact('applications')
    );

}

public function destroyApplication($id)
{

    $application = JobApplication::findOrFail($id);

    // seguridad
    if ($application->user_id != auth()->id()) {

        abort(403);

    }

    $application->delete();

    return redirect()
        ->back()
        ->with(
            'success',
            'Postulación eliminada'
        );

}



    

    // ADMIN LISTA
    public function adminIndex()
    {

        $trabajos = Trabajo::latest()->paginate(10);

        return view(
            'admin.trabajo.index',
            compact('trabajos')
        );

    }


    // ADMIN CREAR
    public function adminCreate()
    {

        return view(
            'admin.trabajo.create'
        );

    }


    // ADMIN GUARDAR
    public function adminStore(Request $request)
    {

        Trabajo::create(
            $request->all()
        );

        return redirect()
            ->route('admin.trabajo.index')
            ->with('success',
            'Trabajo creado');

    }


    // ADMIN EDITAR
    public function adminEdit($id)
    {

        $trabajo =
            Trabajo::findOrFail($id);

        return view(
            'admin.trabajo.edit',
            compact('trabajo')
        );

    }


    // ADMIN ACTUALIZAR
    public function adminUpdate(Request $request,$id)
    {

        $trabajo =
            Trabajo::findOrFail($id);

        $trabajo->update(
            $request->all()
        );

        return redirect()
            ->route('admin.trabajo.index')
            ->with('success',
            'Trabajo actualizado');

    }


    // ADMIN ELIMINAR
    public function adminDestroy($id)
    {

        $trabajo =
            Trabajo::findOrFail($id);

        $trabajo->delete();

        return redirect()
            ->route('admin.trabajo.index')
            ->with('success',
            'Trabajo eliminado');

    }
}