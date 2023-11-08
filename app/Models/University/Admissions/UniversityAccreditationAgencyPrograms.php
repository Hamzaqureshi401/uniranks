<?php

namespace App\Models\University\Admissions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\Admissions\UniversityAccreditationAgencyPrograms
 *
 * @property int $id
 * @property int $uni_acc_agency_id
 * @property int $program_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyPrograms newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyPrograms newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyPrograms query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyPrograms whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyPrograms whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyPrograms whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyPrograms whereUniAccAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityAccreditationAgencyPrograms whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityAccreditationAgencyPrograms extends Model
{
    use HasFactory;
    protected $fillable = ['uni_acc_agency_id','program_id'];

}
