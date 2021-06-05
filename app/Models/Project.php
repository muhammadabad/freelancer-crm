<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Transaction;

class Project extends Model
{
    protected $fillable = ['client_id','project_name','started_date','delivery_date','budget','no_of_developers','plan_report_url','status'];
   
     /**
     * This Method Define The Relationship Between Client Model And Project Model
     */
    public function client()
    {

        return $this->belongsTo(Client::class,'client_id');

    }
     /**
     * This Method Define The Relationship Between Transaction Model And Project Model
     */
    public function transaction()
    {

        return $this->hasMany(Transaction::class,'project_id');

    }

}
