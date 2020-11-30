<?php
namespace Aecor\Status\Traits;

use Aecor\Status\Models\Status;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasStatus
{
    public function statuses(): MorphToMany
    {
        return $this->morphToMany(Status::class, 'statusable');
    }

    public function status()
    {
        return $this->statuses()->first();
    }

    public function addStatus($data)
    {
        return $this->statuses()->create($data);
    }

    public function addManyStatus(array $records)
    {
        foreach ($records as $record) {
            $this->statuses()->create($record);
        }
    }

    public function assignStatus($record)
    {
        $this->statuses()->attach($record);
    }

    public function assignManyStatus(array $records)
    {
        $this->statuses()->attach($records);
    }

    public function syncStatus($record)
    {
        $this->statuses()->sync($record);
    }

    public function syncManyStatus(array $records)
    {
        $this->statuses()->sync($records);
    }
}
