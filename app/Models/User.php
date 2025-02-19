<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'role_id',
        'station_id', // Assigned station for non-super-admin users
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * ✅ Relationship: User belongs to a Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * ✅ FIX: Rename `managedStations()` to `stations()` so it matches the expected method.
     */
    public function stations()
    {
        return $this->hasMany(Station::class, 'client_id', 'id'); // Corrected foreign key
    }

    /**
     * ✅ Relationship: Each user (Pump Attendant, Accountant, etc.) belongs to **one** station
     */
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id');
    }

    /**
     * ✅ Role checking helper function
     */
    public function hasRole($roleName)
    {
        return $this->role && $this->role->name === $roleName;
    }

    /**
     * ✅ Get the Client Admin's current active station.
     */
    public function getCurrentStation()
    {
        if ($this->hasRole('Client Admin')) {
            return Station::where('client_id', $this->id)
                ->where('id', session('current_station_id', $this->station_id))
                ->first();
        }
        return null;
    }

    /**
     * ✅ Assign a user to the currently active station of the Client Admin
     */
    public static function createWithStation(array $attributes, User $creator)
    {
        if ($creator->hasRole('Client Admin')) {
            $attributes['station_id'] = session('current_station_id', $creator->station_id);
        }

        return self::create($attributes);
    }
}
