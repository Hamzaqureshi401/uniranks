<div>
    <div>
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


        @for($i = 0; $i < $details_in_langs; $i++)
            @if($i > 0)
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-floating w-100">
                            <select wire:model.lazy="translations.{{$i}}" id="select_lang_{{$i}}"
                                    class="form-select input-field">
                                <option value="">@lang('Select Language')</option>
                                @foreach($languages as $language)
                                    <option
                                        value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                                @endforeach
                            </select>
                            <label for="select_lang_{{$i}}">@lang('Select Language') </label>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row mt-3">
                <div class="mobile-marg-2 col-md-12">
                    <div class="form-floating w-100">
                                    <textarea wire:model.lazy="admission_requirements.{{$i}}"
                                              class="form-control input-textarea"
                                              placeholder="@lang('Admission Requirments')." rows="3"></textarea>
                        <label for="floatingInput">@lang('Admission Requirments')</label>
                    </div>
                </div>
            </div>
            {{--                        @if($i==0)--}}
            {{--                           --}}
            {{--                        @endif--}}

            <div class="w-100 px-5 mt-4">
                <hr>
            </div>
        @endfor
        <div class="mt-4 mb-4">
            <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
                @lang('+ Add Information into different language')
            </button>
        </div>
    </div>
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

 </div>
    </div>
    <div class="card bg-transparent mt-4">
   <div class="card-body">
      <div class="h4 blue"> @lang('Admission Requirements ')</div>
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
        @if(Auth::user()->selected_university && Auth::user()->selected_university->updated_at)
            @lang('Updated on') {{ \Carbon\Carbon::parse(Auth::user()->selected_university->updated_at)->format('D, M j, Y g:i A') }}
        @endif
    </div>
    <div class="mobile-marg-2">@lang('By') {{ optional(Auth::user()->selected_university->createdBy)->name ?? 'By Dev Team Rep' }}</div>
</div>

      </div>
   </div>
</div>
