<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    // We changed the name of the primary key as it's in the DB
    // to be able to search by 'id'
    protected $primaryKey = 'category_id';
    use HasFactory;
}
