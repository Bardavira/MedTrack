<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UbsUnit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'description',
        'wing_id',
        'company_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'description' => 'string'
        ];
    }

    public function medicalRecordUnitHistory() {
        return $this->hasMany(MedicalRecordUnit::class, 'unit_id');
    }

    public function activeMedicalRecordUnis() {
        return $this->hasMany(MedicalRecordUnit::class, 'unit_id')->where('active', 1);
    }

    public function wing() {
        return $this->belongsTo(UbsWing::class, 'wing_id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
