<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Institutes\School;
use App\Models\User;
use App\Models\General\Major;
use App\Models\User\UserMajor;
use App\Models\Institutes\University;
use App\Models\User\UserApplication;
use App\Models\User\UserStudyDestination;
use App\Models\User\UserPossibleUniversity;
use App\Models\User\UserBio;

use Livewire\Component;



class MainDashboard extends Component
{
    public $schools , 
    $students_register,
    $userMajorCounts,
    $userApplication,
    $universities,
    $destinations_counts,
    $unis_counts,
    $data,
    $majors;

    public function mount(){
        $this->getData();

    }
    public function render()
    {
        return view('livewire.dashboard.main-dashboard');
    }

    public function getData(){

        $this->schools           = School::select('number_students' ,'number_grade11' , 'number_grade12')->get();
        $this->students_register = User::where('role_id' , 13)->select('id')->get();
        $user_id                   = $this->students_register->pluck('id')->toArray();
        $userMajor_query        = UserMajor::whereIn('user_id' , $user_id)->select('user_id' , 'major_id')->get();
        $destionation_query      = UserStudyDestination::whereIn('user_id', $user_id)->select('country_id' , 'user_id')->get();
        $university_query        = UserPossibleUniversity::whereIn('user_id', $user_id)->select('university_id' , 'user_id')->get();
        $userApplication_query   = UserApplication::whereIn('user_id', $user_id)->select('user_id')->get();

        $UserBio_query = UserBio::whereIn('user_id', $user_id)->select('user_id' , 'study_level_id')->get();

          $data[] = $this->prepaerDataForSchool(
                    'Registrations' ,
                    count($user_id) , 
                    $this->schools->sum('number_students') , 
                    count($user_id));

          $data[] = $this->prepaerDataForMajor(
                    'Mjors' ,
                    $userMajor_query->groupBy('major_id')->count() , 
                    $userMajor_query->groupBy('user_id')->count() , 
                    count($user_id));

         $data[] = $this->prepaerData(
                    'Destinations' ,
                    $destionation_query->groupBy('country_id')->count() , 
                    $destionation_query->groupBy('user_id')->count() , 
                    count($user_id));

         $data[] = $this->prepaerData(
                    'Universities' ,
                    $university_query->groupBy('university_id')->count() , 
                    $university_query->groupBy('user_id')->count() , 
                    count($user_id));

         $data[] = $this->prepaerDataForApplication(
                    'Applications' ,
                    $userApplication_query->count() , 
                    $userApplication_query->groupBy('user_id')->count() , 
                    count($user_id));
         $data[] = $this->prepaerDataForGrade(
                    'Grade 12 Students' ,
                    $this->schools->sum('number_grade12'),
                    $UserBio_query->where('study_level_id' , 1)->count(), 
                    count($user_id));
         $data[] = $this->prepaerDataForGrade(
                    'Grade 11 Students' ,
                    $this->schools->sum('number_grade11'),
                    $UserBio_query->where('study_level_id' , 2)->count(), 
                    count($user_id));

         $this->data = $data;

    }


    public function prepaerData($title ,$total , $value , $total_students_register ){

          return  [
                    'title'      => $title,
                    'title_count'=> $total,
                    'percentage' => $this->calculatePercentage($value , $total).' %'.' of the total '.$value.' Students' ,
                    'sub-title'  => ($total_students_register - $value).' Students did not register',
                   ];
    }
    public function prepaerDataForMajor($title ,$total , $value , $total_students_register ){

          return  [
                    'title'      => $title,
                    'title_count'=> $total,
                    'percentage' => $this->calculatePercentage($value , $total_students_register).' %'.' of the total '.$value.' Students' ,
                    'sub-title'  => ($total_students_register - $value).' Students did not register',
                   ];
    }
     public function prepaerDataForSchool($title ,$total , $value , $total_students_register ){

          return  [
                    'title'      => $title,
                    'title_count'=> $total,
                    'percentage' => $this->calculatePercentage($total , $value).' %'.' of the total '.$total.' Students' ,
                    'sub-title'  => ($value - $total).' Students did not register',
                   ];
    }
     public function prepaerDataForApplication($title ,$total , $value , $total_students_register ){

           return  [
                    'title'      => $title,
                    'title_count'=> $total,
                    'percentage' => $this->calculatePercentage($value , $total_students_register).' %'.' of the total '.$value.' Students' ,
                    'sub-title'  => ($total_students_register - $value).' Students did not register',
                   ];
    }

     public function prepaerDataForGrade($title ,$total , $value , $total_students_register ){

          return  [
                    'title'      => $title,
                    'title_count'=> $total,
                    'percentage' => $this->calculatePercentage($value , $total).' %'.' of the total '.$value.' Students' ,
                    'sub-title'  => ($total - $value).' Students did not register',
                   ];
    }

   public function calculatePercentage($value, $total): string {
           if ($total > 0) {
                return number_format(($value / $total) * 100, 1);
           } else {
                return '0';
           }
   }

}
