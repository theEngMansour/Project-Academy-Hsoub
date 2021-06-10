<?php 

namespace App\Traits;

trait RateableTrait
{
    protected $count = 2;
    
    public function averageRating($project)
    {
        $avg = $project->reviews()
        ->selectRaw('avg(service_rating) service_rating, avg(quality_rating) quality_rating')
        ->first();

        $total = array_sum($avg->toArray()) / $this->count;
        
        return 
        [
            'total'             => $total,
            'service_rating'    => $avg->service_rating,
            'quality_rating'    => $avg->quality_rating,
        ];
    }

}