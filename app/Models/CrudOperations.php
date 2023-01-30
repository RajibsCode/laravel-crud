<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudOperations extends Model
{
    use HasFactory;
    // 4 declare protected table variable
    protected $table = 'crud_operations';
}
