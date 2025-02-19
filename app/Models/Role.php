<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles'; // ✅ Explicitly define table name (helps avoid Laravel guessing errors)

    protected $fillable = ['name'];

    // ✅ Relationship: One Role has many Users
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
