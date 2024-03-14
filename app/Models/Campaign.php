<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tenant_id',
        'location_id',
        'start_date',
        'end_date'
    ];

    protected $with = [
        'location:id,name',
        'tenant:id,name'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function campaignDay ()
    {
        return $this->hasMany(CampaignDay::class);
    }

    public function volunteerCampaign ()
    {
        return $this->hasMany(VolunteerCampaign::class);
    }

}
