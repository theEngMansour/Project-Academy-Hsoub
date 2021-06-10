<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Slug;
use Illuminate\Http\Request;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','desc','body','image_path','category_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Eloquent 
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getImagepathAttribute($img)
    {
        return asset('storage/images/'.$img);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /*
    |--------------------------------------------------------------------------
    | Slug 
    |--------------------------------------------------------------------------
    */

    public function setNameAttribute($value)
    {
        $this->attributes['name']=$value;
        $this->attributes['slug']=Slug::uniqueSlug($value,'projects');;
    }

    /*
    |--------------------------------------------------------------------------
    | Search in Models 
    |--------------------------------------------------------------------------
    */

    public function scopeFilter($query,Request $request)
    {

        if ($request->keyword) 
        {
            $query->where('name','LIKE','%'.$request->keyword.'%');
        }
        elseif($request->category)
        {
            $query->whereCategory_id($request->category);
        }
        return $query->with('category')->get();
    }

    /*
    |--------------------------------------------------------------------------
    | reviews in Models 
    |--------------------------------------------------------------------------
    */

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
}
