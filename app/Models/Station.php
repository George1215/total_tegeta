<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'station_name'];

    /**
     * ✅ Relationship: One Station belongs to one Client Admin
     */
    public function clientAdmin()
    {
        return $this->belongsTo(User::class, 'client_id'); // Fix foreign key reference
    }

    /**
     * ✅ Relationship: One Station has many Users
     */
    public function users()
    {
        return $this->hasMany(User::class, 'station_id');
    }
}
