<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getFormattedDate($column, $format='d-m-Y'){
        
        return Carbon::create($this->$column)->format($format);
    }
}