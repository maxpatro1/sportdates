<?php


namespace App\Models\Dictionaries;


use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'table_dict_cities';

    /**
     * @var string[]
     */
    protected $fillable = [
        'dv',
        'fdv',
    ];
}
