<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function photos() {
    return $this->belongsToMany('\P4\Photo')->withTimestamps();
}
}
