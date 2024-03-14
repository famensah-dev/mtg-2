<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerCampaign extends Model
{
    use HasFactory;

    public function volunteer ()
    {
        return $this->belongsTo(Volunteer::class);
    }

    public function campaign ()
    {
        return $this->belongsTo(Campaign::class);
    }
}
