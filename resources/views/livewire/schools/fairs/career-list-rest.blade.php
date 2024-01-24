 <!-- <div class="card mt-3">
      <div class="p-3">
         <div class="row">
            <div class="col-md-2" style="width: 9.666667% !important;">
               <div class="row">
                  <div class="col-12">
                     <a href="{{route('admin.schoolFairs.careerTalks.view',$fair->id)}}" class="university-img-div">
                     <img src="{{$fair->school->logo_url ?? ''}}" class="" width="93px">
                     </a>
                  </div>
                  <div class="col-12 light-blue small5" style="white-space:nowrap; 
    margin-top: 0.82rem!important;
">
                     {{ $fair->start_date->format('n/j/Y gA') }}
                  </div>
               </div>
            </div>
            <div class="col-md-4" style="
               width: 40% !important;
                /* Choose your desired border color */
               ">
               <div class="row mt-4" >
                  <div class="col-lg-12">
                     <a href="{{route('admin.schoolFairs.fair.view',$fair->id)}}" style="font-weight: normal !important;" class="h5 blue text-decoration-none">{{$fair->school->school_name ?? ''}}</a>
                  </div>
                  <div class="col-lg-12 light-blue smallh  d-md-flex">
                     <div
                        class="">{{$fair->school?->country?->country_name.', '. $fair->school?->city?->city_name}}
                     </div>
                  </div>
                   <div class="row">
                  <div class="col-12">&nbsp</div>

                  <div class="col-md-6 light-blue text-center">
                     @lang('Sessions: '){{ $fair->sessions->first()->id ?? '' }}
                  </div>
                  
                  
                  <div class="col-md-6 light-blue">
                    @lang('Capacity: '){{ $fair->max }}@lang(' Universities')
                  </div>
                 
               </div>
               </div>
            </div>
            <div class="col-md-3 mt-4" style=" width: 17% !important; border-right: 1px solid #ccc; border-left: 1px solid #ccc;">
               <div class="h6 mb-0 gray">
                  <div class="row">
                     <div class="col-md-12">@lang('Fees') {{$fair->school?->g_12_fee_range?->currency_range}}</div>
                     <div class="col-md-12 mt-3">@lang('Grade 12 Students')
                        :{{$fair->school?->number_grade12}}
                     </div>
                     <div class="col-md-12 mt-3">@lang('Grade 11 Students')
                        :{{$fair->school?->number_grade11}}
                     </div>
                     <div x-data="{ showOtherMajors: false }" class="col-md-12 mt-3">
                        @lang('Majors'): 
                        @foreach($fair->majors->take(1) as $index => $major)
                        {{ $major->title }}
                        @if ($index < $fair->majors->count() - 1)
                        ,
                        @endif
                        @endforeach
                        @if ($fair->majors->count() > 2)
                        ... 
                        <span class="light-blue cursor-pointer" @click="showOtherMajors = !showOtherMajors">
                        {{ $fair->majors->count() - 2 }} other {{ Str::plural('major', $fair->majors->count() - 2) }}
                        </span>
                        <div x-show="showOtherMajors" class="mt-3">
                           @foreach($fair->majors->skip(1) as $major)
                           {{ $major->title }},
                           @endforeach
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 mt-4 text-center" style=" width: 17% !important;">
               <div class="h6 mb-0 gray h-f">
                   <div class="row">
                     <div class="col-md-12">
                        <span style="color: #ae1414 !important;">
                        @if(now() > $fair->end_date)
                        @lang('Expired')
                        @else
                        @lang('Closed')
                        @endif
                  </span>
                     
                  </div>
                     <div class="col-md-12 mt-3"><span style="color: #ae1414;">{{ 'Deadline: ' }}{{ $fair->end_date->format('n/j/Y') }}</span>
                  
                     </div>
                     <div class="col-md-12 mt-3 light-blue">@lang('Remaining Seats') {{intVal($fair->sessions_count) - $fair->confirmed_universities_count}}
                     / {{$fair->sessions_count}}
                     </div>
                     
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 mt-3">
                        <button disabled class="button-sm button-disabled m-0 w-100" style="cursor: not-allowed; width: 80% !important; background-color: #ced4da;">@lang('Book')</button>
                     </div>
               </div>
            </div>

         
         </div>
         
      </div>
   </div> -->
   <div class="card mt-3">
      <div class="p-3">
         <div class="row">
            <div class="col-md-2" style="width: 9.666667% !important;">
               <div class="row">
                  <div class="col-12">
                     <a href="{{route('admin.schoolFairs.careerTalks.view',$fair->id)}}" class="university-img-div">
                     <img src="{{$fair->school->logo_url ?? ''}}" class="" width="93px">
                     </a>
                  </div>
                  <div class="col-12 mt-3">
                     @if(empty($fair->active_status))
                     <span style="color: green; margin-left: 23px;">{{ 'Active' }}</span>
                     @else
                     <span style="color: #ae1414; margin-left: 17px;">
                        @if(now() > $fair->end_date)
                        @lang('Expired')
                        @else
                        @lang('Closed')
                        @endif
                     </span>
                     @endif
                  </div>
               </div>
            </div>
            <div class="col-md-7" style="
               width: 70% !important;
               margin-left: -7px;
                /* Choose your desired border color */
               ">
               <div class="row mt-4" >
                  <div class="col-lg-12">
                     <a href="{{route('admin.schoolFairs.fair.view',$fair->id)}}" style="font-weight: normal !important;" class="h5 blue text-decoration-none">{{$fair->school->school_name ?? ''}}</a>
                  </div>
                  <div class="col-lg-12 light-blue smallh  d-md-flex mt-2">
                     <div
                        class="">{{$fair->school?->country?->country_name.', '. $fair->school?->city?->city_name}} | @lang('Sessions: '){{ $fair->sessions->first()->id ?? '' }} | {{ $fair->start_date->format('n/j/Y gA') }} | @lang('Capacity: '){{ $fair->max }}@lang(' Universities')
                     </div>
                  </div>
                   <div class="row">
                  <div class="col-12">&nbsp</div>
                  <div class="col-md-1"></div>
                  <div class="col-md-4">
                     <span style="color: #ae1414;">{{ 'Deadline: ' }}{{ $fair->end_date->format('n/j/Y') }}</span>
                  </div>
                  <div class="col-md-4 light-blue">
                     @lang('Remaining Seats') {{intVal($fair->max) - $fair->confirmed_universities_count}}
                     / {{$fair->max}}
                  </div>
                  <div class="col-md-3">
                     <div class="d-flex justify-content-end">
                        @if(empty($fair->active_status))
                        <a href="{{ route('admin.schoolFairs.careerTalks.view', $fair->id) }}" style="" class="button-sm button-blue m-0 w-100 text-decoration-none"
                           wire:click="acceptFair('{{$fair->id}}')"> @lang('Book')</a>
                        @else
                        <button disabled class="button-sm button-disabled m-0 w-100" style="cursor: not-allowed;  background-color: #ced4da;">@lang('Book')</button>
                        @endif
                     </div>
                  </div>
               </div>
               </div>
            </div>
            <div class="col-md-3 mt-4" style=" width: 20% !important;  border-left: 1px solid #ccc; margin-left: -22px;">
               <div class="h6 mb-0 gray">
                   <div class="row">
                     <div class="col-md-12">@lang('Fees') {{$fair->school?->g_12_fee_range?->currency_range}}</div>
                     <div class="col-md-12 mt-3">@lang('Grade 12 Students')
                        :{{$fair->school?->number_grade12}}
                     </div>
                     <div class="col-md-12 mt-3">@lang('Grade 11 Students')
                        :{{$fair->school?->number_grade11}}
                     </div>
                     <div x-data="{ showOtherMajors: false }" class="col-md-12 mt-3">
                        @lang('Majors'): 
                        @foreach($fair->majors->take(1) as $index => $major)
                        {{ $major->title }}
                        @if ($index < $fair->majors->count() - 1)
                        ,
                        @endif
                        @endforeach
                        @if ($fair->majors->count() > 2)
                        ... 
                        <span class="light-blue cursor-pointer" @click="showOtherMajors = !showOtherMajors">
                        {{ $fair->majors->count() - 2 }} other {{ Str::plural('major', $fair->majors->count() - 2) }}
                        </span>
                        <div x-show="showOtherMajors" class="mt-3">
                           @foreach($fair->majors->skip(1) as $major)
                           {{ $major->title }},
                           @endforeach
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
          
         </div>
         
      </div>
   </div>
