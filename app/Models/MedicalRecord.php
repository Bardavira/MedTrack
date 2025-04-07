<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'first_name' => 'string',
            'last_name'  => 'string',
            'active'     => 'boolean'
        ];
    }

    public function medicalRecordUnitHistory() {
        $this->hasMany(MedicalRecordUnit::class, 'medical_record_id');
    }

    public function currentMedicalRecordUnit() {
        $this->hasOne(MedicalRecordUnit::class, 'medical_record_id')->where('active', 1);
    }
}
