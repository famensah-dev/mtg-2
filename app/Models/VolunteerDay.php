<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'volunteer_id',
        'campaign_day_id',
        'service_area_id',
        'start_time',
        'end_time'
    ];


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
