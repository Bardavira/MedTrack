<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecordUnit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'unit_id',
        'employee_id',
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
            'active' => 'boolean',
        ];
    }

    public function medicalRecord() {
        return $this->belongsTo(MedicalRecord::class, 'medical_record_id');
    }

    public function unit() {
        return $this->belongsTo(UbsUnit::class, 'unit_id');
    }

    public function actor() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function receptor() {
        return $this->belongsTo(User::class, 'receptor_id');
    }
}