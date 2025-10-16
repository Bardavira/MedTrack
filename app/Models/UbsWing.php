<?php

namespace App\Models;

use App\Models\Company;
use App\Models\UbsUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UbsWing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'description',
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

    public function units() {
        return $this->hasMany(UbsUnit::class, 'wing_id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
