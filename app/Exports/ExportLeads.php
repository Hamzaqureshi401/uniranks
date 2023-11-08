<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportLeads implements FromCollection, WithHeadings
{

    protected $data;

    public function __construct(Builder $q)
    {
        $this->data = $q->with(['userBio' => ['country', 'city', 'curriculum', 'feeRange', 'studyLevel'],
            'majors','school','leadSource', 'studyDestinations', 'preferredUniversities'])->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $university = \Auth::user()->selected_university;
        $uni_majors = $university->universityMajorPreferences()->pluck('major_id')->toArray();
        $uni_city = $university->city_id;
        $uni_country = $university->country_id;

        return $this->data->transform(function (User $student) use ($uni_majors, $uni_city, $uni_country) {
            $user_bio = $student->userBio;
            $matching = calculateMatching($student, $uni_majors, $uni_city, $uni_country);
            return  [
                $student->id,
                $student->name,
                $student->email,
                $user_bio?->mobile_number,
                $student->school?->school_name ?? "",
                $matching . "/10",
                $student->leadSource?->title,
                $user_bio?->country?->country_name,
                $user_bio?->curriculum?->title,
                $user_bio?->feeRange?->currency_range, //TODO Fee Range fro upper and lower
                $student->studyDestinations?->pluck('country_name')->implode(', '),
                $student->preferredUniversities?->pluck('university_name')->implode(', '),
                $student->majors?->pluck('title')->implode(', '),
                'Enrolled' // TODO Real Time Enroll Status
            ];
        });
    }


    public function headings(): array
    {
        return [
            'SID','Name','Email',"Phone",'School','Date of Birth','Grades', 'Matching', 'Source', 'Country', 'Curriculum', 'Budget', 'Destinations', 'Universities', 'Program', 'Status'
        ];
    }
}
