<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Client extends Model
{
    protected $fillable = ['client_name','email','contact_number','referenced_by'];

    /**
     * This Method Define The Relationship Between Client Model And Project Model
     */
    public function project()
    {

        return $this->hasMany(Project::class,'client_id');

    }
     
}
