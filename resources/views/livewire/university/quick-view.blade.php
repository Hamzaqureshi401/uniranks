<div>
    <x-general.university-media-page-title sub-title="Quick View"/>

    @push('styles')
    <style type="text/css">
        .small{
            font-size: 1em !important;
        }
        .select2-selection__choice__display{
             font-size: 1.5em !important;
        }
    </style>
    @endpush

    <div class="mt-3 h5 blue">@lang('Quick View')</div>
    <div class="blue paragraph-style2">
        @lang('Provide quick view information')
    </div>

    @php
        /**
         * @var \App\Models\University\Information\UniversityQuickView $quick_view.
         * @var \App\Models\University\UniversityCategories[] $categories
         * @var \App\Models\University\UniversityType[] $types
         * @var \App\Models\General\Currency[] $currencies
         */
    @endphp

    <div class="card mt-3">
        <div class="card-body">
            <div>
                <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <select wire:model.defer="quick_view.uni_category_id" class="form-select input-field"
                                    id="floatingSelectGrid" aria-label="">
                                <option value="">@lang('University Category')</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('University Category')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <select wire:model.defer="quick_view.uni_type_id" class="form-select input-field"
                                    id="floatingSelectGrid" aria-label="">
                                <option value="">@lang('University Type')</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('University Type')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <input wire:model.defer="quick_view.no_alumni" type="number"  class="form-control input-field"
                                   id="floatingInput" placeholder="@lang('Number of Alumni')">
                            <label for="floatingInput">@lang('Number of Alumni')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <input wire:model.defer="quick_view.no_students" type="number" class="form-control input-field"
                                   id="floatingInput" placeholder="@lang('Number of Students')">
                            <label for="floatingInput">@lang('Number of Students')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <input wire:model.defer="quick_view.no_schools" type="number" class="form-control input-field"
                                   id="floatingInput" placeholder="@lang('Number of Schools')">
                            <label for="floatingInput">@lang('Number of Schools')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <input wire:model.defer="quick_view.no_majors" type="number" class="form-control input-field"
                                   id="floatingInput" placeholder="@lang('Number of Majors')">
                            <label for="floatingInput">@lang('Number of Majors')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <input wire:model.defer="quick_view.no_programs" type="number" class="form-control input-field"
                                   id="floatingInput" placeholder="@lang('Number of Programs')">
                            <label for="floatingInput">@lang('Number of Programs')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <input wire:model.defer="quick_view.no_academics" type="number" class="form-control input-field"
                                   id="floatingInput" placeholder="@lang('Number of Academics')">
                            <label for="floatingInput">@lang('Number of Academics')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <input wire:model.defer="quick_view.founded_year" type="number" class="form-control input-field"
                                   id="floatingInput" placeholder="@lang('Founded Year')">
                            <label for="floatingInput">@lang('Founded Year')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <select wire:model.defer="quick_view.distance_learning"  class="form-select input-field"
                                    id="floatingSelectGrid" aria-label="">
                                <option value="">@lang('Distance Learning Information')</option>
                                @foreach($yesNo as $key => $text)
                                    <option value="{{$key}}" >{{$text}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('Distance Learning Information')</label>
                        </div>
                    </div>
                    <!--<div class="col-md-6 mt-3">-->
                    <!--    <div class="form-floating w-100">-->
                    <!--        <input wire:model.defer="quick_view.body_type" class="form-control input-field"-->
                    <!--               id="floatingInput" placeholder="@lang('Body Type')">-->
                    <!--        <label for="floatingInput">@lang('Body Type')</label>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <select wire:model.defer="quick_view.online_courses" class="form-select input-field"
                                    id="floatingSelectGrid" aria-label="">
                                <option value="">@lang('Offers Online Courses')</option>
                                @foreach($yesNo as $key => $text)
                                    <option value="{{$key}}" >{{$text}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('Offers Online Courses')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <select wire:model.defer="quick_view.short_courses" class="form-select input-field"
                                    id="floatingSelectGrid" aria-label="">
                                <option value="">@lang('Offers Short Courses')</option>
                                @foreach($yesNo as $key => $text)
                                    <option value="{{$key}}" >{{$text}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('Offers Short Courses')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <select wire:model.defer="quick_view.transfer_students" class="form-select input-field"
                                    id="floatingSelectGrid" aria-label="">
                                <option value="">@lang('Support Transfer Student')</option>
                                @foreach($yesNo as $key => $text)
                                    <option value="{{$key}}" >{{$text}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <input wire:model.defer="quick_view.avg_total_fee" class="form-control input-field"
                                   id="floatingInput" placeholder="@lang('Average total fee')">
                            <label for="floatingInput">@lang('Average total fee')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <input wire:model.defer="quick_view.avg_annual_cost" class="form-control input-field"
                                   id="floatingInput" placeholder="@lang('Average annual cost')">
                            <label for="floatingInput">@lang('Average annual cost')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-floating w-100">
                            <input wire:model.defer="quick_view.acceptance_rate" class="form-control input-field"
                                   id="floatingInput" placeholder="@lang('Acceptance Rate')">
                            <label for="floatingInput">@lang('Acceptance Rate')</label>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">

                        <div class="form-floating w-100">
                            <input wire:model.defer="quick_view.acronym" class="form-control input-field"
                                   id="floatingInput" placeholder="@lang('Acronym Name')">
                            <label for="floatingInput">@lang('Acronym Name')</label>
                        </div>
                    </div>
                </div>
                <div class="d-md-flex mt-3 justify-content-between">
                    <div class="mb-0 blue">@lang('Degrees')</div>
                    <div class="d-flex align-items-center mobile-marg-2">
                        <input wire:model.defer="quick_view.diploma" class="form-check-input my-0" type="checkbox" value="1"  id="flexCheckChecked">
                        <span class="small ms-1 blue mb-0">@lang('Diploma')</span>
                    </div>
                    <div class="d-flex align-items-center mobile-marg-2">
                        <input wire:model.defer="quick_view.associate" class="form-check-input my-0" type="checkbox" value="1"  id="flexCheckChecked">
                        <span class="small ms-1 blue mb-0">@lang('Associate Degree')</span>
                    </div>
                    <div class="d-flex align-items-center mobile-marg-2">
                        <input wire:model.defer="quick_view.bachelors" class="form-check-input my-0" type="checkbox" value="1"  id="flexCheckChecked">
                        <span class="small ms-1 blue mb-0">@lang("Bachelor's Degree")</span>
                    </div>
                    <div class="d-flex align-items-center mobile-marg-2">
                        <input wire:model.defer="quick_view.masters" class="form-check-input my-0" type="checkbox" value="1"  id="flexCheckChecked">
                        <span class="small ms-1 blue mb-0">@lang("Master's Degree")</span>
                    </div>
                    <div class="d-flex align-items-center mobile-marg-2">
                        <input wire:model.defer="quick_view.doctoral" class="form-check-input my-0" type="checkbox" value="1"  id="flexCheckChecked">
                        <span class="small ms-1 blue mb-0">@lang("Doctoral Degree")</span>
                    </div>
                </div>
                <div class="d-md-flex mt-3 justify-content-between">
                    <div class="mb-0 blue">@lang('Learning Methods')</div>
                    <div class="d-flex align-items-center mobile-marg-2">
                        <input wire:model.defer="quick_view.open_university" class="form-check-input my-0" type="checkbox" value="1"  id="flexCheckChecked">
                        <span class="small ms-1 blue mb-0">@lang('Open University')</span>
                    </div>
                    <div class="d-flex align-items-center mobile-marg-2">
                        <input wire:model.defer="quick_view.distance_learning" class="form-check-input my-0" type="checkbox" value="1"  id="flexCheckChecked">
                        <span class="small ms-1 blue mb-0">@lang('Distance University')</span>
                    </div>
                    <div class="d-flex align-items-center mobile-marg-2">
                        <input wire:model.defer="quick_view.regular_university" class="form-check-input my-0" type="checkbox" value="1"  id="flexCheckChecked">
                        <span class="small ms-1 blue mb-0">@lang("Regular University")</span>
                    </div>
                </div>
                @php
                 /**
                 * @var \App\Models\General\Language[] $languages
                 */
                @endphp
                <div class="row mt-3">
                    <div class="col-12 d-md-flex justify-content-between align-items-center">
                        <div class="mb-0 blue">@lang('Languages')</div>
                        <div class="col-md-9 col-12 mobile-marg" wire:ignore>
                            <select id="languages" class="js-example-my-multiple form-control input-field" height="100%" width="100%" multiple>
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
 <div class="w-100 mt-4 px-4">
                <hr>
            </div>
           <!--  <div class="d-md-flex h6 mt-4 text-place-end blue justify-content-end">
                <div class="col-md-3">Created on 15 Jan 2022</div>
                <div class="col-md-3 mobile-marg-2">By David Scott</div>
                <div class="col-md-2 mobile-marg-2"><a href="javascript:void(0)" wire:click="delete" class="red ">Delete</a></div>
            </div> -->
        </div>
    </div>
    <div class="d-flex justify-content-end mt-4">
        <button wire:click="save" class="button-blue button-sm mobile-button w-20">@lang('Save')</button>
        <button wire:click="initForm" class="button-red button-sm mobile-button w-20">@lang('Cancel')</button>
    </div>

     <div class="card bg-transparent mt-4">
        <div class="card-body">
            <div class="h4 blue" id="upload-images">@lang('Quick Views')   
             <div class="w-100 px-4 mt-3">
        <hr>
    </div> 
    <!-- @include('about-icon') -->

 </div>
       <table class="table">
   <!--  <thead>
        <tr>
            <th scope="col">URL</th>
            <th scope="col">Type</th>
            <th scope="col">Created On</th>
            <th scope="col">By</th>
            <th scope="col" class="text-place-end">Actions</th>
        </tr>
    </thead> -->
    <tbody>
       
        </tbody>
</table>
 <div class="d-md-flex col-md-6 h6 blue justify-content-between">
    <div class="box-bottom-note">
            @lang('Updated on') {{ \Carbon\Carbon::parse($quick_view['updated_at'])->format('D, M j, Y g:i A') }}
        
    </div>
    <div class="mobile-marg-2">@lang('By') {{ $quick_view['updated_by'] ?? 'By Dev Team Rep' }}</div>
</div>

    </div>
    </div>
    <x-general.loading message="Processing..." wire:target="save,initForm" />
    @push(AppConst::PUSH_JS)
        <script>

            $(document).ready(function () {
                $("#languages").select2({
                    placeholder: "@lang('Multiple Select of teaching available languages')"
                }).val(@js($university_languages)).trigger('change');
            });

            $('#languages').on('change', function (e) {
                let languages = $('#languages').select2("val");
                if(!languages) return;
                @this.set('university_languages', languages);
            });

            Livewire.on('saved', () => {
                $('#languages').val(null).trigger('change');
            })

        </script>

    @endpush 
</div>
