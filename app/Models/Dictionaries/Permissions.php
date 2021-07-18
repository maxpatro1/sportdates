<?php


namespace App\Models\Dictionaries;


use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'table_permissions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
    ];

}
