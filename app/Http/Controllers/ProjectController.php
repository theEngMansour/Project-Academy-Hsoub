<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category,Project,Review};
use App\Traits\ImageUploadTrait;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Traits\RateableTrait;
class ProjectController extends Controller
{
    /*
    |-----------------------------------------------------------------------------------------------
    | Modde By : Mansour Ahmed @mansour_tech | Project : Academy Hsoub (https://academy.hsoub.com/)
    |-----------------------------------------------------------------------------------------------
    */

    use ImageUploadTrait , RateableTrait;

    protected $projects;

    public function __construct(Project $projects)
    {
        $this->projects = $projects ;
    }

    /*
    |--------------------------------------------------------------------------
    | Home
    |--------------------------------------------------------------------------
    */

    public function home()
    {
        $tr = new GoogleTranslate(); 
        return view('company.home.home',
        [
            'projects' =>   $this->projects::with('category')->take(12)->latest()->get(),
            'tr'       =>   $tr
        
        ]);
    }
    public function index()
    {
        return view('company.home.projects.index',['projects' =>$this->projects::with('category')->latest()->get()]);
    }

    public function search(Request $request)
    {
        $projects = $this->projects::Filter($request);
        $keyword = $request->keyword;
        return view('company.home.projects.showResults',compact('projects','keyword')); 
    }

    /*
    |--------------------------------------------------------------------------
    | Admin
    |--------------------------------------------------------------------------
    */

    public function getByHome()
    {
        if (\Gate::allows('admin')) {
            return view('company.admin.projects.index');
        }
        abort(403);
    }

    public function show($id)
    {
        $project = $this->projects::withCount('reviews')->with('reviews.user')->find($id);
        $avg = $this->averageRating($this->projects->find($id));
        $total          = $avg['total'];
        $service_rating = $avg['service_rating'];
        $quality_rating = $avg['quality_rating'];
        
        return view('company.home.projects.show', compact('project', 'total', 'service_rating', 'quality_rating'));

    }

    /*
    |--------------------------------------------------------------------------
    | Specified resource. 
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $project = $this->projects->find($id);
        return view('company.admin.projects.edit',compact('project'));
    }

    public function update(Request $request, $id)
    {
        if($request->hasFile('image_path'))
        {
            $image_name = $this->uploadImage($request->image_path);
            $request->user()->projects()->find($id)->update(
            [
                'image_path'    =>$image_name,
                'name'          =>$request->name,
                'desc'          =>$request->desc,
                'category_id'   =>$request->category_id,  
            ]);
        }
        else
        {
            $request->user()->projects()->find($id)->update($request->all());
        }
        return back()->with('success',trans('alerts.success.update'));
    }

    public function destroy($id)
    {
        $this->projects->findOrFail($id)->delete();
        return back()->with('danger',trans('alerts.success.delete'));
    }
    public function store(Request $request)
    {
        if($request->user()->reviews()->whereProject_id($request->project_id)->exists()) {
            return redirect(url()->previous() .'#review-div')->with('fail', 'لقد قيّمت هذا الموقع مسبقًا');
        }

        $review = Review::create($request->all() + ['user_id'=> auth()->id()]);
        return redirect(url()->previous() .'#review-div')->with('success', 'تم بنجاح إضافة مراجعة');
    }
}