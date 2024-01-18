<div>
    @php
        $links = [
            ['title'=>'Undergraduate','route'=>'admin.university.admissionRequirements.previousGrades.undergraduate'],
            ['title'=>'Postgraduate','route'=>'admin.university.admissionRequirements.previousGrades.postgraduate'],
            ['title'=>'PHD','route'=>'admin.university.admissionRequirements.previousGrades.phd'],
            ]
    @endphp
    <x-general.university-admission-requirements-sub-tab :links="$links"/>
    <x-general.status-alert/>
    <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>

    @php
        /**
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\Degree[] $degrees
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\Faculty[] $faculities
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\Major[] $majors
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\University\UniversityProgramFeeTerm[] $feeTerms
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\GradeScale[] $gradeScales
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\Test[] $tests
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\ApplicationRequirement[] $other_requirments_types
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\ApplicationRequirement[] $eudcation_requirments_types
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\ApplicationRequirement[] $travel_requirments_types
          */
    @endphp

    @for($j=0;$j < count($gpa_requirments);$j++)
        <div class="row mt-3">
            <div class="col-12 col-md-5">
                <div class="form-floating w-100">
                   <select wire:model.defer="gpa_requirments.{{$j}}.grade_scale_id" id="gap_requirments_{{$j}}" class="form-select input-field">
                        <option value="">@lang('Acceptable High School GPA Type')</option>
                        @if($val != 'false')
                        @foreach($gradeScales->reject(function ($scale) use ($unselected_grade_scale_id, $j) {
    return in_array($scale->id, $unselected_grade_scale_id) && array_key_exists($j, $unselected_grade_scale_id) && $scale->id != $unselected_grade_scale_id[$j];
}) as $scale)
    <option value="{{$scale->id}}">{{$scale->title}}</option>
@endforeach
@else
<option value="">@lang('Acceptable High School GPA Type')</option>
                        
                        @foreach($gradeScales->whereNotIn('id' , $unselected_grade_scale_id) as $scale)

                            <option
                                value="{{$scale->id}}">{{$scale->title}}</option>
                        @endforeach
                        @endif

                    </select>
                    <label for="gap_requirments_{{$j}}">@lang('Acceptable High School GPA Type')
                        </label>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="form-floating w-100">
                    <input type="number" wire:model.defer="gpa_requirments.{{$j}}.required_grades"
                           class="form-control input-field"
                           placeholder="@lang('Acceptable High School GPA')" min="0">
                    <label for="floatingInput">@lang('Acceptable High School GPA')</label>
                </div>
            </div>
            <div class="col-md-2 mobile-marg-2 text-place-end">
                @if($j == count($gpa_requirments)-1)
                    <a href="javascript:void(0)" class="light-blue"
                       wire:click="addGpaRequirement">+ @lang('add new')</a>
                @else
                    <a href="javascript:void(0)" class="red"
                       wire:click="removeGpaRequirement({{$j}})">- @lang('remove')</a>
                @endif
            </div>
        </div>
        <div class="w-100 px-5 mt-4">
            <hr>
        </div>
    @endfor
    <div class="row mt-4">
        <div class="col-md-6 offset-6 d-flex justify-content-md-end">
            <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
            <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Reset')</button>
        </div>
    </div>
    <x-general.loading
        wire:target="testTypeSelected,addDetailsInOtherLanguage ,loadPrograms, save, initForm, delete, edit"
        message="Processing..."/>

    <script type="text/javascript">
         document.addEventListener('livewire:load', function () {
      Livewire.on('setOpion', () => {
           var val = @json(count($gpa_requirments));
           console.log(val);
           $('#gap_requirments_' + val)
       });
      
        
    });
    </script>

</div>

    </div>
    </div>
    <div class="card bg-transparent mt-4">
   <div class="card-body">
      <div class="h4 blue"> @lang('Previous Grades ')</div>
      <div class="w-100 px-4 mt-3">
         <hr>
      </div>
      <div>
         <table class="table table-responsive">
         <thead>
         </thead>
         <tbody>
        
            
         </tbody>
     </table>
      <div class="d-md-flex col-md-6 h6 blue justify-content-between">
    <div class="box-bottom-note">
            @lang('Updated on') {{ \Carbon\Carbon::parse($gpa_requirments[0]['updated_at'])->format('D, M j, Y g:i A') }}
        
    </div>
    <div class="mobile-marg-2">@lang('By') {{ optional(Auth::user()->selected_university->createdBy)->name ?? 'By Dev Team Rep' }}</div>
</div>

      </div>
   </div>
</div>
