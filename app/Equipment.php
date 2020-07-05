<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use Filterable, CrudTrait;
    protected $table = 'equipment';
    
    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function equipment_mods()
    {
        return $this->hasMany(EquipmentMod::class);
    }
}
