<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Devfaysal\BangladeshGeocode\Models\Union;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'title',
        'division_id',
        'district_id',
        'upazila_id',
        'union_id',
        'date',
        'from_time',
        'to_time',
        'description',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'division_id')->withDefault();
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id')->withDefault();
    }

    public function upazila(): BelongsTo
    {
        return $this->belongsTo(Upazila::class, 'upazila_id')->withDefault();
    }

    public function union(): BelongsTo
    {
        return $this->belongsTo(Union::class, 'union_id')->withDefault();
    }
}
