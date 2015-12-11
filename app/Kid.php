<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    public function photo() {
        # Kid has many Photos
        return $this->hasMany('\P4\Photo');
    }

    public function users()
    {
        #Kid belongs to multiple users
        return $this->belongsToMany('\P4\User')->withTimestamps();
    }
}
