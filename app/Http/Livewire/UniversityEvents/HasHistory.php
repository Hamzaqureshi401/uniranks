<?php

namespace App\Http\Livewire\UniversityEvents;

use App\Models\University\UniversityEvent;

trait HasHistory
{
    protected function addHistory(UniversityEvent $event, $create_university_events){
        $create_university_events =  array_merge($create_university_events,[
            'fair_type' => $event->fairType?->fair_type_name,
            'fee_range' => $event->feeRange?->currency_range,
            'curriculums'=> $event->curriculums()->pluck('title')->implode(', '),
            'majors'=> $event->majors()->pluck('title')->implode(', ')
        ]);
        $event->history()->create(['details' => $create_university_events]);
    }
}
