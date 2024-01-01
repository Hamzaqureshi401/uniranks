<div>
    <x-general.university-admissions-page-title sub-title="Accreditation Agencies"/>
    <div class="paragraph-style-2 blue  mb-3">
        <p class="mb-0">@lang(' list education accreditation organization that recognized and accredited Harvard University, you can list local and international accreditation agencies.')</p>
        <p class="mb-0"><b>@lang('Institutional accreditation')</b>: @lang('Applies to the entire institution, specific programs, and distance education within an institution.')</p>
        <p><b>@lang('Programmatic accreditation')</b>: @lang('These accreditors typically cover a specific program of professional education or training, but in some cases they cover the whole institution.')</p>
    </div>
    <div class="card mt-1">
        <div class="card-body">
{{--            <div class="blue">@lang('Add a new ')</div>--}}
            <div  x-data="{information: @entangle('information').defer,selected_programs: @entangle('selected_programs').defer,}"
                  x-init="addPickerToElement($refs.joining_date);addPickerToElement($refs.accredited_date);
                  addSelect2();

                  ">
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
                <div class="row">
                    <div class="col-12 col-md-9">
                        <div class="form-floating w-100">
                            <select x-model="information.accreditation_agencies_id" class="form-select input-field">
                                <option value="">@lang('Select Accrediting Agency')</option>
                                @foreach($main_agencies as $agency)
                                    <option
                                        value="{{$agency->id}}">{{$agency->translated_name ?: $agency->title}}</option>
                                @endforeach
                            </select>

                            <label for="floatingSelectGrid">@lang('Select Accrediting Agency') </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-floating w-100">
                            <input x-model="information.join_date" x-ref="joining_date" class="form-control input-field date"
                                   placeholder="@lang('Joining Date')">
                            <label for="floatingInput">@lang('Joining Date')</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-md-4">
                        <div class="form-floating w-100">
                            <select x-model="information.agency_type_id" class="form-select input-field">
                                <option value="">@lang('Institutional or Programmatic')</option>
                                @foreach($agency_types as $type)
                                    <option
                                        value="{{$type->id}}">{{$type->translated_name ?: $type->title}}</option>
                                @endforeach
                            </select>

                            <label for="floatingSelectGrid">@lang('Institutional or Programmatic')<</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-floating w-100">
                            <select x-model="information.degree_id" class="form-select input-field">
                                <option value="">@lang('Degree Type')</option>
                                @foreach($degrees as $degree)
                                    <option value="{{$degree->id}}">{{$degree->translated_name ?: $degree->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('Degree Type')<</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-floating w-100">
                            <input x-model="information.accredited_date" x-ref="accredited_date" class="form-control input-field date"
                                   placeholder="@lang('Accredited Date')">
                            <label for="floatingInput">@lang('Accredited Date')</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12" wire:ignore wire:key="selected_programs">
                        <select x-model="selected_programs" class="form-select input-field select2-multiple"  width="100%" height="100%" multiple="multiple">
                            @foreach($admissionPrograms as $admissionProgram)
                                <option value="{{$admissionProgram->id}}">{{$admissionProgram->translated_name ?: $admissionProgram->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="form-floating w-100">
                            <input x-model.defer="information.listing_url" class="form-control input-field"
                                   placeholder="@lang('Listing URL, Link under the Agency website to validate this accreditation')">
                            <label for="floatingInput">@lang('Listing URL, Link under the Agency website to validate this accreditation')</label>
                        </div>
                    </div>
                </div>

                <div class=" text-place-end mt-4 mb-4">
                    <input type="file" class="d-none" wire:model="document"  x-ref="document" />
                    <button class="m-0 button-no-bg"  type="button"  x-on:click.prevent="$refs.document.click()" >
                        @lang('Upload Official Document')
                    </button>
                </div>

                <div class="mt-4 mb-4">
                    <p> @lang("If you didn't Find the Accreditation Agency you can request to") <a href="#" class="light-blue">@lang('add a new agency')</a></p>
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
        * @var \App\Models\University\Admissions\UniversityAccreditationAgency[] $dataCollection
        **/
    @endphp
    <div class="card-body">
        <div class="h4 blue">@lang('Acreditation Agencies List')
        @include('about-icon')</div>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <!--Heading Row-->
                <tr>
                    <td class="gray">@lang('Agencies Name')</td>
                    <td class="gray">@lang('Type')</td>
                    <td class="gray">@lang('Degree Level')</td>
                    <td class="gray">@lang('Programs')</td>
                    <td class="gray">@lang('Status')</td>
                    <td class="gray">@lang('By')</td>
                    <td class="gray">@lang('Created')</td>
                    <td class="gray">@lang('Action')</td>
                </tr>
                <!--End Heading row-->
                @foreach($dataCollection ??[] as $dataItem)
                    @php
                    $status = intval($dataItem->approval_status ?:0);
                     $statuses = [0=>'Under Review',1=>'Approved','2'=>'Rejected'];
                     $statusColor = $dataItem->approval_status == AppConst::REJECTED ? "red" : "blue";
                    @endphp
                    <!--Row Start-->
                    <tr>
                        <td>{{$dataItem->accreditingAgency->title}}</td>
                        <td>{{$dataItem->agencyType->title}}</td>
                        <td>{{$dataItem->degree->title}}</td>
                        <td><a href="" class="light-blue">{{$dataItem->programs->count()}}</a></td>
                        <td><a href="" class="{{$statusColor}}">{{$statuses[$status]}}</a></td>
                        <td>{{$dataItem->createdBy?->name ?? "---"}}</td>
                        <td>{{$dataItem->created_at->toDateString()}}</td>
                        <td>
                            <a href="" class="light-blue" wire:click.prevent="edit('{{$dataItem->id}}')" class="blue">@lang('Edit')</a>
                            <a href="" wire:click.prevent="delete('{{$dataItem->id}}')" class="red">@lang('Delete')</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>
    <x-general.loading wire:target="addDetailsInOtherLanguage, save, initForm, delete, edit" message="Processing..."/>

    @push(AppConst::PUSH_CSS)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush
    @push(AppConst::PUSH_JS)
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @if(app()->getLocale() != 'en')
            <script src="https://npmcdn.com/flatpickr/dist/l10n/{{app()->getLocale()}}.js"></script>
        @endif
        <script>
            function addPickerToElement(el, min_date = "today") {
                return flatpickr(el, {
                    locale: "{{app()->getLocale()}}",
                    enableTime: false,
                    allowInput: false,
                });
            }
            Livewire.on('add-select2', () => {
               addSelect2()
            })
            function addSelect2(){
                $(".select2-multiple").select2({
                    placeholder: "Select one or more Associate Programs, you can select multiple or all programs"
                },@js($selected_programs)).on('change', function(){
                @this.set('selected_programs', $(this).val());
                });
            }
        </script>
    @endpush
</div>
