<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'unit_id',
        'company_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function medicalRecordUnitsMoved() {
        return $this->hasMany(MedicalRecordUnit::class, 'user_id');
    }

    public function medicalRecordUnitsReceived() {
        return $this->hasMany(MedicalRecordUnit::class, 'receptor_id');
    }

    public function unit() {
        return $this->belongsTo(UbsUnit::class, 'unit_id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
