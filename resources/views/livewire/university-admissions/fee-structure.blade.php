<div>

    <div>
        <x-general.university-admissions-page-title sub-title="Fee Structure"/>
        <div class="paragraph-style-2 blue  mb-3">
            <p class="mb-0">@lang(' Fee Structure: follow the below options and method to build university fee structure for each program, or you can use the import option for faster update.')</p>
        </div>
        <div class="card mt-1">
            <div class="card-body">
                {{--            <div class="blue">@lang('Add a new ')</div>--}}
                <div>
                    <x-general.status-alert/>
                    <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
                    @php
                        /**
                          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\AccreditationAgency[] $main_agencies
                          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\AccreditationAgencyType[] $agency_types
                          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\Degree[] $degrees
                          * @var  \Illuminate\Database\Eloquent\Collection | \App\Models\University\Admissions\UniversityAdmissionProgram[] $admissionPrograms
                          */
                    @endphp
                    <div class="row mt-4">
                        <div class="col-12 col-md-3">
                            <div class="form-floating w-100">
                                <select wire:model.defer="information.degree_id" id="degree_id" class="form-select input-field">
                                    <option value="">@lang('Degree')</option>
                                    @foreach($degrees as $degree)
                                        <option value="{{$degree->id}}">{{$degree->translated_name ?: $degree->title}}</option>
                                    @endforeach
                                </select>
                                <label for="degree_id">@lang('Degree')<</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-floating w-100">
                                <select wire:model.defer="information.faculty_id" id="faculty_id" class="form-select input-field" wire:change="loadPrograms">
                                    <option value="">@lang('School/College')</option>
                                    @foreach($faculities as $faculty)
                                        <option value="{{$faculty->id}}">{{$faculty->translated_name ?: $faculty->title}}</option>
                                    @endforeach
                                </select>
                                <label for="faculty_id">@lang('School/College')<</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-floating w-100">
                                <select wire:model.defer="information.program_id" id="program_id" class="form-select input-field" >
                                    <option value="">@lang('Program')</option>
                                    @foreach($admissionPrograms as $admissionProgram)
                                        <option value="{{$admissionProgram->id}}">{{$admissionProgram->translated_name ?: $admissionProgram->title}}</option>
                                    @endforeach
                                </select>
                                <label for="program_id">@lang('Program')<</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-floating w-100">
                                <input type="number" wire:model.defer="information.no_credit_hr" class="form-control input-field"
                                       placeholder="@lang('Number Of Credit Hours')"/>
                                <label for="floatingInput">@lang('Number Of Credit Hours')</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 col-md-3">
                            <div class="form-floating w-100">
                                <select wire:model.defer="information.offer_installments" id="offer_installments" class="form-select input-field">
                                    <option value="0">@lang('No Installments')</option>
                                    @foreach(['2','3','6'] as $key=>$type)
                                        <option value="{{$type}}">@lang($type)</option>
                                    @endforeach
                                </select>
                                <label for="offer_installments">@lang('Installments')<</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-floating w-100">
                                <input type="number" wire:model.defer="information.cost_per_credit_hr" class="form-control input-field"
                                       placeholder="@lang('Cost Per Credit Hour')"/>
                                <label for="floatingInput">@lang('Cost Per Credit Hour')</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-floating w-100">
                                <input type="number" wire:model.defer="information.application_fee" class="form-control input-field"
                                       placeholder="@lang('Application Fee')"/>
                                <label for="floatingInput">@lang('Application Fee')</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-floating w-100">
                                <input type="number" wire:model.defer="information.admission_fee" class="form-control input-field"
                                       placeholder="@lang('Admissions Fee')"/>
                                <label for="floatingInput">@lang('Admissions Fee')</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 col-md-8">
                            <div class="form-floating w-100">
                                <select wire:model.defer="information.other_fee_type_id" id="other_fee_type_id" class="form-select input-field">
                                    <option value="">@lang('Select Other Admission Fees Type')</option>
                                    @foreach($admissionFeeTypes as $admissionFeeType)
                                        <option value="{{$admissionFeeType->id}}">{{$admissionFeeType->translated_name ?: $admissionFeeType->title}}</option>
                                    @endforeach
                                </select>
                                <label for="other_fee_type_id">@lang('Program')<</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-floating w-100">
                                <input type="number" wire:model.defer="information.other_fee_amount" class="form-control input-field"
                                       placeholder="@lang('Amount')"/>
                                <label for="floatingInput">@lang('Amount')</label>
                            </div>
                        </div>
                    </div>
                    @for($i = 0; $i<$details_in_langs; $i++)
                        <div class="row mt-3">
                            @if($i > 0)
                                <div class="col-md-4">
                                    <div class="form-floating w-100">
                                        <select wire:model.defer="translations.{{$i}}" id="select_lang_{{$i}}" class="form-select input-field">
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
                        <textarea wire:model.defer="notes.{{$i}}" class="form-control input-textarea"
                                  placeholder="@lang('Fee Structure Notes')."
                                  rows="3"></textarea>
                                    <label for="floatingInput">@lang('Admission Notes')</label>
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
            * @var \App\Models\University\Admissions\UniversityFeeStructure [] $dataCollection
            **/
        @endphp
        <div class="card-body">
            <div class="h4 blue">@lang('Fee Structure')</div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <!--Heading Row-->
                    <tr>
                        <td class="gray">@lang('Degree')</td>
                        <td class="gray">@lang('College')</td>
                        <td class="gray">@lang('Program')</td>
                        <td class="gray">@lang('CH')</td>
                        <td class="gray">@lang('Installments')</td>
                        <td class="gray">@lang('CPH')</td>
                        <td class="gray">@lang('App. Fee')</td>
                        <td class="gray">@lang('Adm. Fee')</td>
                        <td class="gray">@lang('Other Fee')</td>
                        <td class="gray">@lang('By')</td>
                        <td class="gray">@lang('On')</td>
                        <td class="gray">@lang('Action')</td>
                    </tr>
                    <!--End Heading row-->
                    @foreach($dataCollection ??[] as $dataItem)
                        @php
                            $statuses = [0=>'Under Review',1=>'Approved','2'=>'Rejected'];
                            $statusColor = $dataItem->approval_status == AppConst::REJECTED ? "red" : "blue";
                            $instalments = $dataItem->offer_installments;
                            $notes = $dataItem->getTranslations('notes');
                            $langs = array_keys($notes);
                        @endphp
                            <!--Row Start-->
                        <tr>
                            <td>{{$dataItem->degree->title}}</td>
                            <td>{{$dataItem->faculty->title}}</td>
                            <td>{{$dataItem->program->title}}</td>
                            <td>{{$dataItem->no_credit_hr}}</td>
                            <td>{{$instalments ? "Yes/$instalments" : "No"}}</td>
                            <td>{{$dataItem->cost_per_credit_hr}}</td>
                            <td>{{$dataItem->application_fee}}</td>
                            <td>{{$dataItem->admission_fee}}</td>
                            <td>{{$dataItem->other_fee_amount}}</td>
                            <td>{{$dataItem->createdBy?->name}}</td>
                            <td>{{$dataItem->created_at->toDateString()}}</td>
                            <td>
                                <a href="javascript:void(0);" class="light-blue" onclick="viewNotes(@js($notes),@js($langs))" class="blue">@lang('Notes')</a>
                                <a href="javascript:void(0);" class="light-blue" wire:click.prevent="edit('{{$dataItem->id}}')" class="blue">@lang('Edit')</a>
                                <a href="javascript:void(0);" wire:click.prevent="delete('{{$dataItem->id}}')" class="red">@lang('Delete')</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        <x-general.loading wire:target="addDetailsInOtherLanguage ,loadPrograms, save, initForm, delete, edit" message="Processing..."/>
        <div class="modal fade" id="notes-modal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="w-100">
                        <div class="card-body pt-0">
                            <div class="d-md-flex justify-content-between align-items-center"><div class="h5 mb-0 blue">@lang('Notes')</div>
                                <div class="col-md-3">
                                    <div class="form-floating w-100">
                                        <select class="form-select input-field" id="select_lang" aria-label="" onchange="changeLanguage()">
                                        </select>
                                        <label for="select_lang">@lang('Select Language')</label>
                                    </div>
                                </div></div>
                            <div class="paragraph-style2 blue mt-3" id="notes_content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push(AppConst::PUSH_JS)
            <script>
                function viewNotes(notes,langs) {
                    let options = '';
                    let content = '';
                    for (option of langs) {
                        options+=`<option value="${option}">Language(${option})</option>`;
                        content+=`<div id="${option}_content" class="${option != 'en' ? "d-none":''}" >${notes[option]}</div>`;
                    }
                    $('#select_lang').html(options)
                    $('#select_lang').val('en')
                    $('#notes_content').html(content)
                    var myModal = new bootstrap.Modal(document.getElementById('notes-modal'));
                    myModal.show();
                }

                function changeLanguage(){
                  let lang =  $('#select_lang').val();
                  $('#notes_content').children('div').addClass("d-none")
                  $(`#${lang}_content`).removeClass('d-none');
                }
            </script>
        @endpush
    </div>


</div>
