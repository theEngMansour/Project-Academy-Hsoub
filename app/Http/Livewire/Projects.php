<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\File;
use App\Traits\ImageUploadTrait;
use Livewire\Component;
use Livewire\{
    WithPagination,
    WithFileUploads,
};
use App\Models\{Project};

class Projects extends Component
{
    use  WithFileUploads , ImageUploadTrait;

    public $name;
    public $desc;
    public $image_path;
    public $category_id;

    public function data()
    {
        return $data = [
            "name"        => $this->name,
            "desc"        => $this->desc,
            "category_id" => $this->category_id,
        ];
    }
    
    public function getByHome()
    {
        return $projects = Project::with('category')->paginate(5);
    }

    
    public function rules()
    {
        return
        [
            'name'         =>['required'],
            'desc'         =>['required'],
            'category_id'  =>['required'],
            'image_path'   =>['required' ,'max:1024'],
        ];
    }

    public function messages(){
        return [        
            'name.required'         => trans('app.name.required'), 
            'desc.required'         => trans('app.desc.required'), 
            'category_id.required'  => trans('app.category_id.required'),            
            'image_path.mimes'      => trans('app.image_path.mimes'),      
            'image_path.required'   => trans('app.image_path.required'),      
        ];
    }

    public function store()
    {   
        $this->validate();

        if($this->image_path != '')
        {
            $image_name = $this->uploadImage($this->image_path);
            auth()->user()->projects()->create($this->data()+['image_path'=>$image_name]);
        }
        
        $this->name         = Null;
        $this->desc         = Null;
        $this->category_id  = Null;
        $this->image_path   = Null;

         back()->with('success',trans('alerts.success.update'));

     return redirect()->route('project.home');

    }

    public function render()
    {
        return view('livewire.projects' ,['projects'=>$this->getByHome()]);
    }
}
