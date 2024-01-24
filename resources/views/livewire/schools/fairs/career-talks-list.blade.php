<div>
   @php
   /**
   * @var \App\Models\General\Countries[] $countries
   * @var \App\Models\General\Cities[] $cities
   * @var \App\Models\General\Curriculum[] $curriculums
   * @var \App\Models\General\FeeRange[] $fee_ranges
   * @var \App\Models\Fairs\Fair[]|\Illuminate\Pagination\LengthAwarePaginator  $fairs
   **/
   @endphp
   @push('styles')
   <style>
      .smallh {
      font-size: 0.94em;
      color: #039be5;
      }
      .h-f {
      font-size: 1.1em !important;
      
      }
      .imageflex { display: flex; }
      .imageflexcontent { margin-left: 5px; margin-top: 0; }
      }

   </style>
   @endpush
   <div x-data="{ showFilters:false }" class="w-100">
      <div class="row">
         <div class="col-6 d-flex justify-content-between blue">
            <div class="h4 blue">@lang('Upcoming Career Talks')
               @include('about-icon')
            </div>
            <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"
               aria-hidden="true"></i>
         </div>
         <div class="col-6 text-end">
            @if($view_horizontal == 'true')
            <a class="mr-25" href="javacript:void(0)" wire:click="setView" >
            <img src="{{asset('assets/icons/detail-listing-light-blue.svg')}}" width="20px">
            </a>
            <a href="javacript:void(0)" wire:click="setView"><img src="{{asset('assets/icons/grid-listing.svg')}}" width="20px">
            </a>
            @else
            <a class="mr-25" href="javacript:void(0)" wire:click="setView" >
            <img src="{{asset('assets/icons/detail-listing.svg')}}" width="20px">
            </a>
            <a href="javacript:void(0)" wire:click="setView"><img src="{{asset('assets/icons/grid-listing-light-blue.svg')}}" width="20px">
            </a>
            @endif
         </div>
      </div>
      <div class="align-items-center my-3 d-md-flex small5" :class="showFilters ? '':'d-none' ">
         <div class="col mobile-marg-2 col-marg mx-1">
            <select wire:model="filter_by_country" class="input-field form-control" aria-label=""
               wire:change="loadFilteredData">
               <option value="">@lang('Select Country')</option>
               @foreach($countries ?? [] as $country)
               <option value="{{$country->id}}">{{$country->country_name}}</option>
               @endforeach
            </select>
         </div>
         <div class="w-100 d-block d-md-none my-1"></div>
         <!--to force new line-->
         <div class="col mobile-marg-2 col-marg mx-1 ">
            <x-elements.date-range-picker wire:model="period" wire:change="loadFilteredData"
               placeholder="Select Date"/>
         </div>
         <div class="w-100 d-block d-md-none my-1"></div>
         <div class="col mobile-marg-2 col-marg mx-1">
            <select wire:model="filter_by_majors" class="input-field form-control" aria-label=""
               wire:change="loadFilteredData">
               <option value="">@lang('Select Majors')</option>
               @foreach($majors ?? [] as $city)
               <option value="{{$city->id}}">{{$city->title}}</option>
               @endforeach
            </select>
         </div>
         
         <div class="w-100 d-block d-md-none my-1"></div>
         <!--to force new line-->
         <div class="col mobile-marg-2 col-marg mx-1">
            <select wire:model="filter_by_school_fee" class="input-field form-control" aria-label=""
               wire:change="loadFilteredData">
               <option value="">@lang('Fees')</option>
               @foreach($fee_ranges ?? [] as $fee_range)
               <option value="{{$fee_range->id}}">{{$fee_range->currency_range}}</option>
               @endforeach
            </select>
         </div>
         <div class="w-100 d-block d-md-none my-1"></div>
         <!--to force new line-->
         <div class="col mobile-marg-2 col-marg mx-1">
            <select wire:model="filter_by_curriculum" class="input-field form-control" aria-label=""
               wire:change="loadFilteredData">
               <option value="">@lang('Curriculum')</option>
               @foreach($curriculums ?? [] as $curriculum)
               <option value="{{$curriculum->id}}">{{$curriculum->title}}</option>
               @endforeach
            </select>
         </div>
         <div class="col mobile-marg-2 col-marg mx-1">
            <select wire:model="filter_by_no_students" class="input-field form-control" aria-label=""
               wire:change="loadFilteredData">
               <option value="">@lang('Number of Students')</option>
               @foreach($students ?? [] as $key => $student)
               <option value="{{$key}}">{{$student}}</option>
               @endforeach
            </select>
         </div>
         <!--  <div class="col mobile-marg-2 col-marg mx-1">
            <img class="" style="max-width: 25px; max-height: 25px;" src="{{asset('assets/icons/detail-listing.svg')}}" alt="Unirank">
            </div> -->
         {{--            
         <div class="w-100 d-block d-md-none my-1"></div>
         --}}
         {{--            <!--to force new line-->--}}
         {{--            
         <div class="col col-marg">
            --}}
            {{--                
            <select class="input-field form-control" aria-label="">
               --}}
               {{--                    
               <option>Number of Students</option>
               --}}
               {{--                    
               <option>2000&gt;</option>
               --}}
               {{--                    
               <option>2000&gt;</option>
               --}}
               {{--                
            </select>
            --}}
            {{--            
         </div>
         --}}
      </div>
   </div>
   @if($view_horizontal != 'true')
   <div class="card-transparent" style="
      margin-left: -8px;
      margin-right: -8px;
      ">
      <div class="p-3">
         <div class="row">
            @forelse($fairs as $fair)
            <div class="col-md-4 mb-3 gx-3">
               <div class="card">
                  <div class="p-3">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="imageflex">
                              <div style="width: 27%">
                                 <a href="{{route('admin.schoolFairs.careerTalks.view',$fair->id)}}" class="col-12 col-lg-2 university-img-div">
                                 <img src="{{$fair->school->logo_url ?? ''}}" class="" width="93px">
                                 </a>
                              </div>
                              <div style="width: 73%" class="mt-2">
                                 <p class="imageflexcontent">
                                    <a style="font-weight: normal !important;" href="{{route('admin.schoolFairs.fair.view',$fair->id)}}" class="h5 blue text-decoration-none">{{$fair->school->school_name ?? '--'}}</a>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <!--  <div class="col-md-8">
                           <a href="{{route('admin.schoolFairs.fair.view',$fair->id)}}" class="h5 blue text-decoration-none">{{$fair->school->school_name ?? '--'}}</a>
                           </div> -->
                        <div class="col-md-8 mt-2">
                           <div class="smallh">
                              {{$fair->school?->country?->country_name.', '. $fair->school?->city?->city_name}}
                           </div>
                        </div>
                        <div class="col-md-4 mt-2">
                           <div class="smallh text-end">
                              @lang('Sessions: '){{ $fair->sessions->first()->id ?? '' }}
                           </div>
                        </div>
                        <div class="col-md-5 mt-2">
                           <div class="smallh">{{ $fair->start_date->format('n/j/Y gA') }}</div>
                        </div>
                        <div class="col-md-7 mt-2 text-end">
                           <div class="smallh">@lang('Capacity: '){{ $fair->max }}@lang(' Universities')</div>
                        </div>
                        <div class="w-100 px-4 mt-3">
                           <hr>
                        </div>
                        <div class="h6 mb-0 gray">
                           <div class="col-md-12">@lang('Fees') {{$fair->school?->g_12_fee_range?->currency_range}}</div>
                           <div class="col-md-12 mt-2">@lang('Grade 12 Students')
                              :{{$fair->school?->number_grade12}}
                           </div>
                           <div class="col-md-12 mt-2">@lang('Grade 11 Students')
                              :{{$fair->school?->number_grade11}}
                           </div>
                           <!-- <div class="col-md-12 mt-2">@lang('Curriculum')
                              : {{$fair?->school?->curriculum?->title}}
                              </div> -->
                           <div x-data="{ showOtherMajors: false }" class="col-md-12 mt-2">
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
                              <div x-show="showOtherMajors" class="mt-2">
                                 @foreach($fair->majors->skip(1) as $major)
                                 {{ $major->title }},
                                 @endforeach
                              </div>
                              @endif
                           </div>
                        </div>
                        <div class="w-100 px-4 mt-3">
                           <hr>
                        </div>
                        <div class="col-md-12 text-center">
                            @if(now() < $fair->end_date)
                      <button class="m-0 button-no-bg w-40 show_btn" style="border: 1px solid green !important;">
                                <span style="color: green;">{{ 'Active' }}</span>
                                </button>
                            @elseif(now() > $fair->end_date)
                             <button class="m-0 button-no-bg w-40 show_btn" style="border: 1px solid #ae1414 !important;">
                                <span style="color: #ae1414;">@lang('Expired')</span>
                                </button>
                            @else
                             <button class="m-0 button-no-bg w-40 show_btn" style="border: 1px solid #ae1414 !important;">
                                <span style="color: #ae1414;">@lang('Closed')</span>
                                </button>
                            @endif
                        
                        </div>
                        <div class="col-md-12 text-center mt-2">
                           <span style="color: #ae1414;">{{ 'Deadline: ' }}{{ $fair->end_date->format('n/j/Y') }}</span>
                        </div>
                        <div class="col-md-12 text-center" style="color: #039be5;">
                           @lang('Remaining Seats') {{intVal($fair->max) - $fair->confirmed_universities_count}}
                     / {{$fair->max}}
                        </div>
                        <div class="col-md-12 text-center mt-2">
                           <div class="d-flex justify-content-center">
                              @if((now() > $fair->end_date))
                              <button disabled class="button-sm button-disabled m-0 w-100" style="cursor: not-allowed; width: 85% !important; background-color: #ced4da;">@lang('Book')</button>
                              
                              @else
                              <a href="{{ route('admin.schoolFairs.careerTalks.view', $fair->id) }}" style="width: 65% !important" class="button-sm button-blue m-0 w-100 text-decoration-none"
                                 wire:click="acceptFair('{{$fair->id}}')"> @lang('Book')</a>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @empty
            <div class="row">
               <div class="col-12">
                  <h6 class="text-center mt-4 no-records">
                     @lang('No Record Found!')
                  </h6>
               </div>
            </div>
            @endforelse
         </div>
      </div>
   </div>
   @else
   @forelse($fairs as $fair)
  @include('livewire.schools.fairs.career-list-rest')
   @empty
   <div class="row">
      <div class="col-12">
         <h6 class="text-center mt-4 no-records">
            @lang('No Record Found!')
         </h6>
      </div>
   </div>
   @endforelse
   @endif
   <x-general.loading message="Loading"/>
   <div class="d-md-flex justify-content-between  align-items-baseline mt-3">
      <div class="text-muted small2">
         @lang('Showing results') {{$fairs->firstItem()}} @lang('-')
         {{$fairs->lastItem()}} @lang('out of') {{$fairs->total()}}
      </div>
      {!! $fairs->links() !!}
   </div>
   @push(AppConst::PUSH_JS)
   <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
   <script>
      Livewire.on('goToTop', () => {
          window.scrollTo({
              top: 350,
              left: 15,
              behaviour: 'smooth'
          })
      })
   </script>
   @endpush
</div>