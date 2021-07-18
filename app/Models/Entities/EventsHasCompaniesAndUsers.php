<?php


namespace App\Models\Entities;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventsHasCompaniesAndUsers extends Model
{
    protected $table = 'table_events_has_companies_and_users';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'company_id',
        'event_id',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Companies::class, 'company_id', 'id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function events(): BelongsTo
    {
        return $this->belongsTo(Events::class, 'event_id', 'id');
    }
}
