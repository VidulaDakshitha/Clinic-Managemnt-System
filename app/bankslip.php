<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bankslip extends Model
{
    protected $fillable = ['bankName', 'bankBranch', 'date'];
}
