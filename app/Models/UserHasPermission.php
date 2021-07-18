<?php


namespace App\Models;


use App\Models\Dictionaries\Permissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserHasPermission extends Model
{
    protected $table = 'table_users_has_permissions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'permission_id',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Permissions::class, 'permission_id', 'id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
