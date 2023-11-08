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
                    <select wire:model.defer="gpa_requirments.{{$j}}.grade_scale_id"
                            id="gap_requirments_{{$j}}"
                            class="form-select input-field">
                        <option value="">@lang('Acceptable High School GPA Type')</option>
                        @foreach($gradeScales as $scale)
                            <option
                                value="{{$scale->id}}">{{$scale->title}}</option>
                        @endforeach
                    </select>
                    <label for="gap_requirments_{{$j}}">@lang('Acceptable High School GPA Type')
                        <</label>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="form-floating w-100">
                    <input wire:model.defer="gpa_requirments.{{$j}}.required_grades"
                           class="form-control input-field"
                           placeholder="@lang('Acceptable High School GPA')">
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

</div>
