<?php

namespace App\Models\Entities;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Companies extends Model
{
    use HasFactory;
    protected $table = 'companies';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'about-company',
        'company_url',
    ];

}
