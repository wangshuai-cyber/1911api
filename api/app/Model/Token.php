<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table="token";
    protected  $primaryKey="t_id";
    public $timestamps=false;
}
