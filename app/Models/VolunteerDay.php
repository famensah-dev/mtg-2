<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerDay extends Model
{
    use HasFactory;


    protected $with = [
        'volunteer',
        'campaignDay' => [
            'campaign' => [
                'tenant',
                'location'
            ],
        ],
        'serviceArea',
    ];

    public function volunteer ()
    {
        return $this->belongsTo(Volunteer::class);
    }

    public function campaignDay ()
    {
        return $this->belongsTo(CampaignDay::class);
    }

    public function serviceArea ()
    {
        return $this->belongsTo(ServiceArea::class);
    }
}
