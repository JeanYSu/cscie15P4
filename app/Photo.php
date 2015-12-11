<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function kid()
    {
        # Photo belongs to Kid
        return $this->belongsTo('\P4\Kid');
    }

    public function tags()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('\P4\Tag')->withTimestamps();
    }
}
