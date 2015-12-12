<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    public function photo() {
        # Kid has many Photos
        return $this->hasMany('\P4\Photo');
    }

    public function users() {
        #Kid belongs to multiple users
        return $this->belongsToMany('\P4\User')->withTimestamps();
    }

    public function getKidsForDropdown() {
        //TODO: get kids per user and if no kids returned, set anonmyous one to dropdown list for saving
        $kids = $this->orderby('name','ASC')->get();
        $kids_for_dropdown = [];
        foreach($kids as $kid) {
            $kids_for_dropdown[$kid->id] = $kid->name;
        }
        return $kids_for_dropdown;
    }
}
