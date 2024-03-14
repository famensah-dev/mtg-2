<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignDay extends Model
{
    use HasFactory;

    protected $fillable = [
        "campaign_id",
        "date",
        "start_time",
        "end_time"
    ];

    protected $with = [
        'campaign' => [
            'location',
            'tenant'
        ]
    ];

    public function campaign ()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function volunteerDay ()
    {
        return $this->hasMany(VolunteerDay::class);
    }
}
