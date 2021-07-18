<?php


namespace App\Models\Dictionaries;


use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'table_roles';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
    ];

}
