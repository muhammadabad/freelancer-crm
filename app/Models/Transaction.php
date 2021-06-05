<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Transaction extends Model
{
    protected $fillable = ['project_id','amount','transaction_mode','transaction_note','payment_date'];
    
     /**
     * This Method Define The Relationship Between Project Model And Project Model
     */
    public function project()
    {

        return $this->belongsTo(Project::class,'project_id');

    }
}
