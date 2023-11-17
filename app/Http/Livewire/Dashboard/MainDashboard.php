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
use App\Models\Fairs\Fair;
use App\Models\University\UniversityEvent;
use App\Models\Fairs\FairStudentAttendance;
use App\Models\University\UniversityEventStudentAttendance;




use Livewire\Component;



class MainDashboard extends Component
{
    public $schools , 
    $students_register,
    $event_statistics,
    $students_events_statisctics,
    $school_and_universities_statisctics,
    $destinations_counts,
    $unis_counts,
    $student_statistics,
    $majors;

    public function mount(){
        $this->getData();

    }
    public function render()
    {
        return view('livewire.dashboard.main-dashboard');
    }

    public function getData(){

        $this->schools           = School::select('number_students' ,'number_grade11' , 'number_grade12' , 'id' ,'school_type_id')->get();
        $this->students_register = User::where('role_id' , 13)->select('id')->get();
        $user_id                 = $this->students_register->pluck('id')->toArray();
        $userMajor_query         = UserMajor::whereIn('user_id' , $user_id)->select('user_id' , 'major_id')->get();
        $destionation_query      = UserStudyDestination::whereIn('user_id', $user_id)->select('country_id' , 'user_id')->get();
        $university_query        = UserPossibleUniversity::whereIn('user_id', $user_id)->select('university_id' , 'user_id')->get();
        $university_ids          = $university_query->pluck('university_id')->unique()->toArray();
        $userApplication_query   = UserApplication::whereIn('user_id', $user_id)->select('user_id')->get();

        $UserBio_query = UserBio::whereIn('user_id', $user_id)->select('user_id' , 'study_level_id')->get();

          $student_statistics[] = $this->prepaerDataForSchool(
                    'Registrations' ,
                    count($user_id) , 
                    $this->schools->sum('number_students') , 
                    count($user_id));

          $student_statistics[] = $this->prepaerDataForMajorAndApplication(
                    'Mjors' ,
                    $userMajor_query->groupBy('major_id')->count() , 
                    $userMajor_query->groupBy('user_id')->count() , 
                    count($user_id));

         $student_statistics[] = $this->prepaerData(
                    'Destinations' ,
                    $destionation_query->groupBy('country_id')->count() , 
                    $destionation_query->groupBy('user_id')->count() , 
                    count($user_id));

         $student_statistics[] = $this->prepaerData(
                    'Universities' ,
                    $university_query->groupBy('university_id')->count() , 
                    $university_query->groupBy('user_id')->count() , 
                    count($user_id));

         $student_statistics[] = $this->prepaerDataForMajorAndApplication(
                    'Applications' ,
                    $userApplication_query->count() , 
                    $userApplication_query->groupBy('user_id')->count() , 
                    count($user_id));
         $student_statistics[] = $this->prepaerDataForGrade(
                    'Grade 12 Students' ,
                    $this->schools->sum('number_grade12'),
                    $UserBio_query->where('study_level_id' , 1)->count(), 
                    count($user_id));
         $student_statistics[] = $this->prepaerDataForGrade(
                    'Grade 11 Students' ,
                    $this->schools->sum('number_grade11'),
                    $UserBio_query->where('study_level_id' , 2)->count(), 
                    count($user_id));

         $other_data_student = ['Grade 10 Students' ,
                        'Apprenticeships' , 
                        'Diploma' , 
                        'Traineeships' , 
                        'Entry-level jobs' , 
                        'Work & Internship' , 
                        'Entreprenuerail' 
                        ];
         foreach($other_data_student as $title){
            $student_statistics[] = $this->prepaerDataForGrade( $title ,0,0, 0);
         }

         $this->student_statistics = $student_statistics;
         $school_id = $this->schools->pluck('id')->toArray();
         $university_fairs_total = Fair::whereIn('school_id', $school_id);
         $fair_ids = $university_fairs_total->pluck('id')->toArray();

         $event_statistics[] = $this->prepaerDataEventData( 'University Fair',$university_fairs_total->count(),$university_fairs_total->simpleFair()->count(), 0);
         
         $event_statistics[] = $this->prepaerDataEventData( 'Career Talk',$university_fairs_total->count(),$university_fairs_total->careerTalk()->count(), 0);

         $open_days_total = UniversityEvent::whereIn('university_id', $university_ids);

         $university_events_ids = $open_days_total->pluck('id')->toArray();



        
         $this->eventStatisctics();

         $this->studentEventsStatistics($fair_ids , $university_events_ids , $open_days_total , $university_fairs_total);

         $this->SchoolAndUniversitiesStatisctics($this->schools);


    }

    public function eventStatisctics(){

         $other_event_statistics = [
                         
                        'University Tours' , 
                        'School Tours' , 
                        'International Tours' , 
                        'Open day' , 
                        'Student for a day' , 
                        'Competition' , 
                        'Presentation' 
                        
                        ];
         foreach($other_event_statistics as $title){
            $event_statistics[] = $this->prepaerDataEventData( $title ,0,0, 0);
         }

         $this->event_statistics = $event_statistics;


    }

    public function studentEventsStatistics($fair_ids , $university_events_ids , $open_days_total , $university_fairs_total){

        $university_fairs_attendance = FairStudentAttendance::whereIn('fair_id', $fair_ids)
            ->count('student_id');

          $students_events_statisctics[] = $this->prepaerDataStudentEventStatistics( 'School Events' ,$university_fairs_attendance,0, 0);

         $university_events_attendance = UniversityEventStudentAttendance::whereIn('university_event_id', $university_events_ids)
            ->count('student_id');

         $students_events_statisctics[] = $this->prepaerDataStudentEventStatistics( 'University Events' ,$university_events_attendance,0, 0);

         $qr_scanned = $university_fairs_attendance + $university_events_attendance;

         $students_events_statisctics[] = $this->prepaerDataStudentEventStatistics( 'QR Code Scanned' ,$qr_scanned,0, 0);

         $total_events = $open_days_total->count() + $university_fairs_total->count();

         $students_events_statisctics[] = $this->prepaerDataStudentEventStatistics( 'Total events' ,$total_events,0, 0);

         $this->students_events_statisctics = $students_events_statisctics;

    }



    public function SchoolAndUniversitiesStatisctics($schools){

         $school_and_universities_statisctics[] = $this->prepaerDataSchoolsAndUni( 'Public Schools' ,$schools->where('school_type_id' , 1)->count(),0, 0);
         $school_and_universities_statisctics[] = $this->prepaerDataSchoolsAndUni( 'Private Schools' ,$schools->where('school_type_id' , 2)->count(),0, 0);
         $local_unis = University::count();
         $recognize_unis = University::whereIn('status', [\AppConst::UNIVERSITY_RECOGNIZED, \AppConst::UNIVERSITY_RECOGNIZED_VERIFIED])
            ->count();
         $school_and_universities_statisctics[] = $this->prepaerDataSchoolsAndUni( 'Local Universities' ,$local_unis,0, 0);
         $school_and_universities_statisctics[] = $this->prepaerDataSchoolsAndUni( 'International Unis' ,$local_unis,0, 0);
         $school_and_universities_statisctics[] = $this->prepaerDataSchoolsAndUni( 'Recognized Unis' ,$recognize_unis,0, 0);

         $this->school_and_universities_statisctics = $school_and_universities_statisctics;

    }

    public function prepaerDataSchoolsAndUni($title ,$total , $value , $total_students_register ){

          return  [
                    'title'      => $title,
                    'title_count'=> $total,
                    'percentage' => '' ,
                    'sub-title'  => 'Total '.$title,
                   ];
    }  

    public function prepaerDataStudentEventStatistics($title ,$total , $value , $total_students_register ){

          return  [
                    'title'      => $title,
                    'title_count'=> $total,
                    'percentage' => '' ,
                    'sub-title'  => 'Total Students Attended '.$title,
                   ];
    }    

    public function prepaerDataEventData($title ,$total , $value , $total_students_register ){

          return  [
                    'title'      => $title,
                    'title_count'=> $value.'/'.$total,
                    'percentage' => '' ,
                    'sub-title'  => 'Total '.$title,
                   ];
    }    


    public function prepaerData($title ,$total , $value , $total_students_register ){

          return  [
                    'title'      => $title,
                    'title_count'=> $total,
                    'percentage' => $this->calculatePercentage($value , $total).' %'.' of the total '.$value.' Students' ,
                    'sub-title'  => ($total_students_register - $value).' Students did not register',
                   ];
    }
    public function prepaerDataForMajorAndApplication($title ,$total , $value , $total_students_register ){

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
