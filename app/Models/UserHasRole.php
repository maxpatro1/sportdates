<?php


namespace App\Models;


use App\Models\Dictionaries\Roles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserHasRole extends Model
{
    protected $table = 'table_users_has_roles';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'role_id',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Roles::class, 'role_id', 'id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
