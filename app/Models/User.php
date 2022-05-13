<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Project;

class User extends Model
{
    protected $fillable = ["name", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at", "contact_email", "contact_number", "address"];

    /**
     * This Method Define The Relationship Between Client Model And Project Model
     */
    // public function project()
    // {

    //     return $this->hasMany(Project::class,'client_id');

    // }
     
}
