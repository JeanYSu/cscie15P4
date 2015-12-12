<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function photos() {
        return $this->belongsToMany('\P4\Photo')->withTimestamps();
    }

    public function getTagsForCheckboxes() {
        $tags = $this->orderBy('name','ASC')->get();
        $tagsForCheckboxes = [];
        foreach($tags as $tag) {
            $tagsForCheckboxes[$tag->id] = $tag->name;
        }
        return $tagsForCheckboxes;
    }
}
