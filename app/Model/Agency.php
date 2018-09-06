<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class agency extends Model
{
    //

    public $table="agency";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manager_agent_id', 'agency_name', 'introduction','Active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];


}
