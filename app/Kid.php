<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    public function photos() {
        # Kid has many Photos
        return $this->hasMany('\P4\Photo');
    }

    public function users() {
        #Kid belongs to multiple users
        return $this->belongsToMany('\P4\User')->withTimestamps();
    }

    public function getKidsForDropdown() {
        $kids = $this::whereHas('users', function($query){
            $query->where('user_id',\Auth::user()->id);
        })->orderby('name','ASC')->get();

        $kids_for_dropdown = [];
        if(isset($kids)){
            foreach($kids as $kid) {
                $kids_for_dropdown[$kid->id] = $kid->name;
            }
        }
        return $kids_for_dropdown;
    }

    public function getGendersForDropdown() {
        $genders_for_dropdown = ['F'=>'Female','M'=>'Male', 'N'=>'Preferred not to tell'];
        return $genders_for_dropdown;
    }

    /*
    * Display gender full description
    */
    public function getGender(){
        $name = '';
        if ($this->gender =='N') {
            $name = 'Preferred not to tell';
        }elseif ($this->gender =='M') {
            $name = 'Male';
        }else{
            $name = 'Female';
        }
        return $name;
    }
}
