<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Job extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jobs';


    public function jobcategory(){
        return $this->belongsTo(JobCategory::class);
    }
}
