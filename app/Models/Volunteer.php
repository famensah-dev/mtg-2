<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone",
        "organization"
    ];

    public function volunteerCampaign ()
    {
        return $this->hasMany(VolunteerCampaign::class);
    }

    public function volunteerDay ()
    {
        return $this->hasMany(VolunteerDay::class);
    }
}
