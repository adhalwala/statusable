<?php

namespace Aecor\Status\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
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
}
