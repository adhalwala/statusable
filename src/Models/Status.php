<?php

namespace Aecor\Status\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasSlug;

    public function getTable()
    {
        return config('statusable.status-table-name');
    }

    protected $guarded = [];

    protected $casts = [
        'order_column' => 'integer',
    ];

    protected $fillable = [
        'name',
        'slug',
        'type',
        'order_column',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
