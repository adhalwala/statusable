<?php
namespace Aecor\Status\Traits;

use Aecor\Status\Models\Status;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasStatus
{
    abstract public function morphToMany($related, $name, $type = null, $id = null, $localKey = null);

    public function statuses(): MorphToMany
    {
        return $this->morphToMany(Status::class, 'model');
    }

    public function status()
    {
        return $this->statuses()->first();
    }

    public function addStatus($data)
    {   
        return $this->statuses()->create($data);
    }

    public function addManyStatuses(array $records)
    {
        foreach ($records as $record) {
            $this->statuses()->create($record);
        }
    }

    public function assignStatus(array $records)
    {
        $this->statuses()->attach($records);
    }
    
    public function syncStatus(array $records)
    {
        $this->statuses()->sync($records);
    }
}
