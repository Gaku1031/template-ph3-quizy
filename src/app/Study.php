<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $table = 'study';
    protected $fillable = ['study_date', 'study_contents', 'study_languages', 'study_hours', 'post_id', 'created_at', 'updated_at'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\User');
    }
}
