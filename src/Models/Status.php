<?php

namespace Aecor\Status\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Status extends Model
{
    use HasSlug;

    public function getTable()
    {
        return config('statusable.status-table-name');
    }

    protected $guarded = [];

    protected $casts = [
        'custom_attributes' => 'array',
        'order_column' => 'integer',
    ];

    protected $fillable = [
        'name',
        'slug',
        'type',
        'order_column',
        'custom_attributes'
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
