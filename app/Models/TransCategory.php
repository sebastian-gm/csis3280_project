<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransCategory extends Model
{
    protected $table = 'trans_category';
    protected $primaryKey = 'cat_transaction_id';
    use HasFactory;
}
