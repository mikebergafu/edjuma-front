<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class JobCategory extends Model
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
    protected $table = 'job_categories';

    public function job(){
        return $this->hasMany(Job::class, 'job_category');
    }

}
