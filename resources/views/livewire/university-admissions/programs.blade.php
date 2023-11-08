<div>

    <div>
        <x-general.university-admissions-page-title sub-title="University Programs"/>
        <div class="paragraph-style-2 blue  mb-3">
            <p class="mb-0">@lang('Add Programs')</p>
        </div>
        <div class="card mt-1">
            <div class="card-body">
                {{--            <div class="blue">@lang('Add a new ')</div>--}}
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
                          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\ApplicationRequirement[] $requirmentsTypes
                          */
                    @endphp
                    <div class="row mt-4">
                        <div class="col-12 col-md-4">
                            <div class="form-floating w-100">
                                <select wire:model.defer="information.degree_id" id="degree_id"
                                        class="form-select input-field">
                                    <option value="">@lang('Degree')</option>
                                    @foreach($degrees as $degree)
                                        <option
                                            value="{{$degree->id}}">{{$degree->translated_name ?: $degree->title}}</option>
                                    @endforeach
                                </select>
                                <label for="degree_id">@lang('Degree')<</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-floating w-100">
                                <select wire:model.defer="information.faculty_id" id="faculty_id"
                                        class="form-select input-field" wire:change="loadPrograms">
                                    <option value="">@lang('School/College')</option>
                                    @foreach($faculities as $faculty)
                                        <option
                                            value="{{$faculty->id}}">{{$faculty->translated_name ?: $faculty->title}}</option>
                                    @endforeach
                                </select>
                                <label for="faculty_id">@lang('School/College')<</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-floating w-100">
                                <select wire:model.defer="information.program_id" id="program_id"
                                        class="form-select input-field">
                                    <option value="">@lang('Program')</option>
                                    @foreach($majors as $major)
                                        <option
                                            value="{{$major->id}}">{{$major->translated_name ?: $major->title}}</option>
                                    @endforeach
                                </select>
                                <label for="program_id">@lang('Program')<</label>
                            </div>
                        </div>
                    </div>

                    @for($i = 0; $i<$details_in_langs; $i++)
                        <div class="row mt-3">
                            <div @class(["mobile-marg-2 col-md-8","col-md-12"=>($i == 0)])>
                                <div class="form-floating w-100">
                                    <input wire:model.defer="names.{{$i}}" class="form-control input-field"
                                           placeholder="@lang('Program Title')">
                                    <label for="floatingInput">@lang('Program Title')</label>
                                </div>
                            </div>
                            @if($i > 0)
                                <div class="col-md-4">
                                    <div class="form-floating w-100">
                                        <select wire:model.defer="translations.{{$i}}" id="select_lang_{{$i}}"
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
                            @endif
                        </div>
                        <div class="row mt-3">
                            <div class="mobile-marg-2 col-md-12">
                                <div class="form-floating w-100">
                                    <textarea wire:model.defer="descriptions.{{$i}}" class="form-control input-textarea"
                                              placeholder="@lang('Program details')." rows="3"></textarea>
                                    <label for="floatingInput">@lang('Program details')</label>
                                </div>
                            </div>
                        </div>
                        @if($i==0)
                            <div class="row mt-3">
                                <div class="col-12 col-md-3">
                                    <div class="form-floating w-100">
                                        <select wire:model.defer="information.fee_term_id" id="fee_term_id"
                                                class="form-select input-field">
                                            <option value="">@lang('Fee Term')</option>
                                            @foreach($feeTerms as $feeTerm)
                                                <option
                                                    value="{{$feeTerm->id}}">{{$feeTerm->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="fee_term_id">@lang('Fee Term')<</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-floating w-100">
                                        <input type="number" wire:model.defer="information.fee"
                                               class="form-control input-field"
                                               placeholder="@lang('Fee')">
                                        <label for="floatingInput">@lang('Fee')</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-floating w-100">
                                        <input type="number" wire:model.defer="information.duration_years"
                                               class="form-control input-field"
                                               placeholder="@lang('Duration Years')">
                                        <label for="floatingInput">@lang('Duration Years')</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-floating w-100">
                                        <input type="number" wire:model.defer="information.duration_months"
                                               class="form-control input-field"
                                               placeholder="@lang('Duration Months')">
                                        <label for="floatingInput">@lang('Duration Months')</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-3">
                                    <input type="checkbox" wire:model.defer="information.is_online" value="1">
                                    <label class="blue">@lang('Online Course')</label>
                                </div>
                                <div class="col-12 col-md-3">
                                    <input type="checkbox" wire:model.defer="information.is_distance_learning"
                                           value="1">
                                    <label class="blue">@lang('Distance Learning')</label>
                                </div>
                            </div>
                            <div class="mt-3 blue">@lang('Program Admission Requirement')</div>
                            <div class="h6 red mt-2">
                                @lang('Note: use this option only if this program requires special requirements that were not listed under the university general admission requirement.')
                            </div>
                            <div class="w-100 px-5 mt-3">
                                <hr>
                            </div>
                            <div class="mt-2 mb-2 blue">@lang('School GPA')</div>
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
                                        <a href="javascript:void(0)" class="light-blue" wire:click="addGpaRequirement">+ @lang('add new')</a>
                                    @else
                                        <a href="javascript:void(0)" class="red" wire:click="removeGpaRequirement({{$j}})">- @lang('remove')</a>
                                    @endif
                                </div>
                            </div>
                            @endfor
                            <div class="mt-2 mb-2 blue">@lang('Testing Requirements')</div>
                            @for($k=0; $k < count($testing_requirements); $k++)
                            <div class="row mt-3">
                                <div class="col-12 col-md-5">
                                    <div class="form-floating w-100">
                                        <select wire:model.defer="testing_requirements.{{$k}}.test_id"
                                                id="test_type_{{$k}}"
                                                class="form-select input-field">
                                            <option value="">@lang('Acceptable Test Type')</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->id}}">{{$test->title}}({{$test->type?->title}}
                                                    )
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="test_type_{{$k}}">@lang('Acceptable Test Type')</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-floating w-100">
                                        <input
                                               wire:model.defer="testing_requirements.{{$k}}.required_grades"
                                               class="form-control input-field"
                                               placeholder="@lang('Required Grades')">
                                        <label for="floatingInput">@lang('Required Grades')</label>
                                    </div>
                                </div>
                                <div class="col-md-2 mobile-marg-2 text-place-end">
                                    @if($k == count($testing_requirements)-1)
                                        <a href="javascript:void(0)" class="light-blue" wire:click="addTestingRequirement">+ @lang('add new')</a>
                                    @else
                                        <a href="javascript:void(0)" class="red" wire:click="removeTestingRequirement({{$k}})">- @lang('remove')</a>
                                    @endif
                                </div>
                            </div>
                            @endfor
                            <div class="mt-2 mb-2 blue">@lang('Application Requirements')</div>
                            @for($l = 0 ; $l< count($application_requirements);$l++ )
                                <div class="row mt-3">
                                    <div class="col-12 col-md-5">
                                        <div class="form-floating w-100">
                                            <select wire:model.defer="application_requirements.{{$l}}.requirement_id"
                                                    id="requirement_type_{{$l}}"
                                                    class="form-select input-field">
                                                <option value="">@lang('Application Requirments Type')</option>
                                                @foreach($requirmentsTypes as $requirmentsType)
                                                    <option
                                                        value="{{$requirmentsType->id}}">{{$requirmentsType->title}}</option>
                                                @endforeach
                                            </select>
                                            <label for="requirement_type_{{$l}}">@lang('Application Requirments Type')</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="form-floating w-100">
                                            <input
                                                   wire:model.defer="application_requirements.{{$l}}.notes"
                                                   class="form-control input-field"
                                                   placeholder="@lang('Application Requirement Notes')">
                                            <label for="floatingInput">@lang('Application Requirement Notes')</label>
                                        </div>
                                    </div>

                                    <div class="col-md-2 mobile-marg-2 text-place-end">
                                        @if($l == count($application_requirements)-1)
                                            <a href="javascript:void(0)" class="light-blue" wire:click="addApplicationRequirement">+ @lang('add new')</a>
                                        @else
                                            <a href="javascript:void(0)" class="red" wire:click="removeApplicationRequirement({{$l}})">- @lang('remove')</a>
                                        @endif
                                    </div>
                                </div>
                            @endfor
                        @endif
                        <div class="row mt-3">
                            <div class="mobile-marg-2 col-md-12">
                                <div class="form-floating w-100">
                                    <textarea wire:model.defer="admission_requirements.{{$i}}"
                                              class="form-control input-textarea"
                                              placeholder="@lang('Other Requirements')." rows="3"></textarea>
                                    <label for="floatingInput">@lang('Other Requirements')</label>
                                </div>
                            </div>
                        </div>

                        <div class="w-100 px-5 mt-4">
                            <hr>
                        </div>
                    @endfor
                    <div class=" text-place-end mt-4 mb-4">
                        <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
                            @lang('+ Add Information into different language')
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 offset-6 d-flex justify-content-md-end">
                <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
                <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Cancel')</button>
            </div>
        </div>
        @php
            /**
            * @var \App\Models\University\Admissions\UniversityAdmissionProgram [] $dataCollection
            **/
        @endphp
        <div class="card-body">
            <div class="h4 blue">@lang('Admission Programs')</div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <!--Heading Row-->
                    <tr>
                        <td class="gray">@lang('Degree')</td>
                        <td class="gray">@lang('College')</td>
                        <td class="gray">@lang('Major')</td>
                        <td class="gray">@lang('Title')</td>
                        <td class="gray">@lang('fee')</td>
                        <td class="gray">@lang('By')</td>
                        <td class="gray">@lang('On')</td>
                        <td class="gray">@lang('Action')</td>
                    </tr>
                    <!--End Heading row-->
                    @foreach($dataCollection ??[] as $dataItem)
                        @php
                            $notes = [
                                    'description'=>$dataItem->getTranslations('description'),
                                    'admission_requirements'=>$dataItem->getTranslations('admission_requirements'),
                                    ];
                            $langs = array_keys($notes['description']);
                        @endphp
                            <!--Row Start-->
                        <tr>
                            <td>{{$dataItem->degree?->title}}</td>
                            <td>{{$dataItem->faculty?->title}}</td>
                            <td>{{$dataItem->program?->title}}</td>
                            <td>{{$dataItem->title}}</td>
                            <td>{{$dataItem->fee}}</td>
                            <td>{{$dataItem->createdBy?->name}}</td>
                            <td>{{$dataItem->created_at->toDateString()}}</td>
                            <td>
                                <a href="javascript:void(0);" class="light-blue"
                                   onclick="viewNotes(@js($notes),@js($langs))" class="blue">@lang('Notes')</a>
                                <a href="javascript:void(0);" class="light-blue"
                                   wire:click.prevent="edit('{{$dataItem->id}}')" class="blue">@lang('Edit')</a>
                                <a href="javascript:void(0);" wire:click.prevent="delete('{{$dataItem->id}}')"
                                   class="red">@lang('Delete')</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        <x-general.loading wire:target="addDetailsInOtherLanguage ,loadPrograms, save, initForm, delete, edit"
                           message="Processing..."/>
        <div class="modal fade" id="notes-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="w-100">
                        <div class="card-body pt-0">
                            <div class="d-md-flex justify-content-between align-items-center">
                                <div class="h5 mb-0 blue">@lang('Program Details')</div>
                                <div class="col-md-3">
                                    <div class="form-floating w-100">
                                        <select class="form-select input-field" id="select_lang" aria-label=""
                                                onchange="changeLanguage()">
                                        </select>
                                        <label for="select_lang">@lang('Select Language')</label>
                                    </div>
                                </div>
                            </div>
                            <div class="paragraph-style2 blue mt-3" id="notes_content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push(AppConst::PUSH_JS)
            <script>
                function viewNotes(notes, langs) {
                    let options = '';
                    let content = '';
                    for (option of langs) {
                        options += `<option value="${option}">Language(${option})</option>`;
                        content += `<div id="${option}_content" class="${option != 'en' ? "d-none" : ''}" ><p>${notes.description[option]}</p><p>${notes.admission_requirements[option]}</p></div>`;
                    }
                    $('#select_lang').html(options)
                    $('#select_lang').val('en')
                    $('#notes_content').html(content)
                    var myModal = new bootstrap.Modal(document.getElementById('notes-modal'));
                    myModal.show();
                }

                function changeLanguage() {
                    let lang = $('#select_lang').val();
                    $('#notes_content').children('div').addClass("d-none")
                    $(`#${lang}_content`).removeClass('d-none');
                }
            </script>
        @endpush
    </div>


</div>
