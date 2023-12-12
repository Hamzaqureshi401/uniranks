<?php

namespace App\Http\Middleware\School;

use App\Helpers\AppConstants;
use App\Models\Institutes\School;
use Closure;
use Illuminate\Http\Request;

class EnsureSchoolProfileUpdated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $school = \Auth::user()->selected_school;
        $url = route('admin.school.information');
        if ($this->failedInfoChecks($school)){
            return  back()->with('status', trans('Please Complete').' <a href="'.$url.'?t=basic_info" class="red">'.trans('School Basic Information').'</a>')
                ->with('status-type', 'danger');
        }

        if ($this->failedLocationChecks($school)){
            return  back()->with('status', trans('Please Complete').' <a href="'.$url.'?t=location_info" class="red">'.trans('School Location Information').'</a>')
                ->with('status-type', 'danger');
        }
        if ($this->failedStudentInfoChecks($school)){
            return  back()->with('status', trans('Please Complete').' <a href="'.$url.'?t=student_info" class="red">'.trans('School Student Information').'</a>')
                ->with('status-type', 'danger');
        }
        return $next($request);
    }

    public function failedInfoChecks(School $school): bool
    {
        $checks = ['email', 'phone'];
        foreach ($checks as $check){
            if (empty($school->{$check})){
                return true;
            }
        }
        return  false;
    }
    public function failedLocationChecks(School $school): bool
    {
        $checks = ['country_id','city_id', 'address1'];
        foreach ($checks as $check){
            if (empty($school->{$check})){
                return true;
            }
        }
        return  false;
    }
    public function failedStudentInfoChecks(School $school): bool
    {
        $grade_12 = 'number_grade12';
        $grade_12_fee = 'fees_grade12';
        if ($school->curriculum_id == AppConstants::CURRICULUM_BRITISH){
            $grade_12 = 'grade_13';
            $grade_12_fee = 'grade_13_fee';
        }
        $checks = ['number_grade11',$grade_12,$grade_12_fee, 'curriculum_id'];
        foreach ($checks as $check){
            if (empty($school->{$check})){
                return true;
            }
        }
        return  false;
    }
}
