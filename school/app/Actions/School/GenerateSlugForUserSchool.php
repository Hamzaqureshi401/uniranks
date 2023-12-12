<?php

namespace App\Actions\School;

use Lorisleiva\Actions\Concerns\AsAction;

class GenerateSlugForUserSchool
{
    use AsAction;

    public function handle()
    {
        $school = \Auth::user()->selected_school;
//        if (empty($school->sm_link)){
//            $school->sm_link = \Str::slug($school->school_name).'-'.\Str::uuid();
//            $school->save();
//            $school->refresh();
//            setUserSelectedSchool($school);
//        }
        return config('services.uniranks.student.registartion-site').'/'.$school->id;
    }
}
