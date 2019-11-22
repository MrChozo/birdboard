<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    
    // Not at all related to this project, I'm going to test a Windows Scheduled Task on this repo
    // Seriously, the task will be scheduled this time. Had to test a Powershell script first.
    // It ran, but only when I ran it manually. Windows has some UI problems in this area.
}
