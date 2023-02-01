<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudOperations extends Model
{
    use HasFactory;
    // 4 declare protected table variable
    protected $table = 'crud_operations';

    // 7. fillable variable
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact',
        'gender',
        'hobbies',
        'address',
        'country',
        'profile'
    ];

    // 10. mutator set attributes for input
    public function setEmailAttribute($value)
    {
        //for lowercase string
        $this->attributes['email'] = str::of($value)->trim()->lower();
    }
    public function setHobbiesAttribute($value)
    {
        //for comma separate datas
        $this->attributes['hobbies'] = implode(',',$value);
    }

    // 4. set relation for show country
    public function getCountry() {
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    // 8. change hobbies attribute
    public function getHobbiesArrAttribute()
    {
        return explode(',',$this->hobbies);
    }

}
