<?php

namespace App\Models\Entities;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Events extends Model
{

    protected $table = 'table_events';

    /**
     * @var string[]
     */
    protected $fillable = [
        'event_name',
        'event_description',
        'age',
        'city',
        'price',
        'applied_at',
        'denied_at',
        'date_start',
        'date_end',
        'applied_by',
        'denied_by',
        'passed',
    ];



}
