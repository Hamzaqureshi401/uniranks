<div>
    <x-general.university-admissions-page-title sub-title="University Scholarships"/>
    <div class="paragraph-style-2 blue  mb-3">
        @lang('Add University Scholarships')
    </div>
    <div class="card mt-1">
        <div class="card-body">
            <div class="blue">@lang('Scholarship details')</div>
            <div>
                <x-general.status-alert/>
                <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>

                @php
                    /**
                    * @var \App\Models\University\Admissions\UniversityAdmissionSession $information
                    * @var \App\Models\General\ScholarshipType[] $scholarship_types
                    **/
                @endphp
                <div class="row mt-3">
                    <div @class(["mobile-marg-2 col-md-3"])>
                        <div class="form-floating w-100">
                            <select wire:model.defer="information.scholarship_type_id" id="scholarship_type" class="form-select input-field">
                                <option value="">@lang('Scholarship Type')</option>
                                @foreach($scholarship_types as $type)
                                    <option value="{{$type->id}}">{{$type->translated_name ?: $type->title}}</option>
                                @endforeach
                            </select>
                            <label for="scholarship_type">@lang('Scholarship Type') </label>
                        </div>
                    </div>
                    <div @class(["mobile-marg-2 col-md-3"])>
                        <div class="form-floating w-100">
                            <input wire:model.defer="information.coverage"
                                    type="number" class="form-control input-field"
                                   placeholder="@lang('Coverage percentage %')">
                            <label for="floatingInput">@lang('Coverage percentage %')</label>
                        </div>
                    </div>
                    <div @class(["mobile-marg-2 col-md-3"])>
                        <div class="form-floating w-100">
                            <input wire:model.defer="information.international_acceptance"
                                    type="number" class="form-control input-field"
                                   placeholder="@lang('International acceptance %')">
                            <label for="floatingInput">@lang('International acceptance %')</label>
                        </div>
                    </div>
                    <div @class(["mobile-marg-2 col-md-3"])>
                        <div class="form-floating w-100">
                            <input wire:model.defer="information.local_acceptance"
                                    type="number" class="form-control input-field"
                                   placeholder="@lang('Local acceptance %')">
                            <label for="floatingInput">@lang('Local acceptance %')</label>
                        </div>
                    </div>
                </div>

                @for($i = 0; $i<$details_in_langs; $i++)
                    <div class="row mt-3">
                        @if($i > 0)
                            <div class="col-md-4">
                                <div class="form-floating w-100">
                                    <select wire:model.defer="translations.{{$i}}" class="form-select input-field">
                                        <option value="">@lang('Select Language')</option>
                                        @foreach($languages as $language)
                                            <option
                                                value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">@lang('Select Language') </label>
                                </div>

                            </div>
                        @endif
                    </div>
                    <div class="row mt-3">
                        <div class="mobile-marg-2 col-md-12">
                            <div class="form-floating w-100">
                        <textarea wire:model.defer="descriptions.{{$i}}" class="form-control input-textarea"
                                  placeholder="@lang('Scholarship Details')."
                                  rows="3"></textarea>
                                <label for="floatingInput">@lang('Scholarship Details')</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 px-5 mt-4">
                        <hr>
                    </div>
                @endfor
                <div class=" text-place-end mt-4 mb-4">
                    <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
                        @lang('+ Add details into different language')
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 offset-6 d-flex justify-content-md-end">
            <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
            @if(!empty($edit_item))
                <button wire:click="initForm(true)" class="button-orange button-sm mobile-button w-35">@lang('Reset')</button>
            @endif
            <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Cancel')</button>
        </div>
    </div>
    @php
        /**
        * @var \App\Models\University\UniversityScholarship[] $dataCollection
        **/
    @endphp
    <div class="card-body">
        <div class="h4 blue">@lang('Scholarships')</div>
        <div class="table-responsive">
            <table class="table blue">
                <tbody>
                <!--Heading Row-->
                <tr>
                    <td class="gray">@lang('Type')</td>
                    <td class="gray">@lang('Coverage') %</td>
                    <td class="gray">@lang('Int. Acceptance') %</td>
                    <td class="gray">@lang('local Acceptance') %</td>
                    <td class="gray text-end">@lang('Action')</td>
                </tr>
                <!--End Heading row-->
                @foreach($dataCollection ??[] as $dataItem)
                    @php
                        $notes = $dataItem->getTranslations('description');
                        $langs = array_keys($notes);
                    @endphp
                        <!--Row Start-->
                    <tr>
                        <td class="blue">{{$dataItem?->scholarshipType?->translated_name ?: $dataItem?->scholarshipType?->title }}</td>
                        <td class="blue">{{$dataItem->coverage}} %</td>
                        <td class="blue">{{$dataItem->international_acceptance}} %</td>
                        <td class="blue">{{$dataItem->local_acceptance}} %</td>
                        <td class="d-flex justify-content-end gap-1">
                            <a href="javascript:void(0);" class="light-blue" onclick="viewNotes(@js($notes),@js($langs))" class="blue">@lang('Details')</a>
                            <a href="javascript:void(0);" class="light-blue" wire:click.prevent="edit('{{$dataItem->id}}')"
                               class="blue">@lang('Edit')</a>
                            <a href="javascript:void(0);" wire:click.prevent="delete('{{$dataItem->id}}')"
                               class="red">@lang('Delete')</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <x-general.loading wire:target="addDetailsInOtherLanguage, save, initForm, delete, edit" message="Processing..."/>
    <div class="modal fade" id="notes-modal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="w-100">
                    <div class="card-body pt-0">
                        <div class="d-md-flex justify-content-between align-items-center"><div class="h5 mb-0 blue">@lang('Details')</div>
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
