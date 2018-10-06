<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MetasFisicas extends Model
{
    protected $table = 'physical_goals';
    public function Unidades()
  	{
    	return $this->hasMany(UnidadMedida::class);
  	}
}
