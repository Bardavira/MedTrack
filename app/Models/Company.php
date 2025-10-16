<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'name' => 'string',
        ];
    }

    public function users() {
        return $this->hasMany(User::class, 'company_id');
    }

    public function wings() {
        return $this->hasMany(UbsWing::class, 'company_id');
    }

    public function units() {
        return $this->hasMany(UbsUnit::class, 'company_id');
    }

    public function medicalRecords() {
        return $this->hasMany(MedicalRecord::class, 'company_id');
    }
}
