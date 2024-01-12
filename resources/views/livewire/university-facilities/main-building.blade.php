<div>
    <x-general.university-facility-page-title sub-title="University Main Building"/>
    <div class="card">
        <div class="card-body">
            <div class="blue">@lang('University Building Information')</div>
            <x-general.status-alert/>
            <div>
                @php
                    /**
                    * @var \App\Models\University\Facility\UniversityFacilityMainBuilding $main_buildings
                    * @var \App\Models\University\Facility\UniversityFacilityMainBuilding $uni_main_buildings
                    **/
                @endphp
                <div class="mt-3 row">
                    <div class="col-md-4 col-12">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="main_buildings.no_building"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Buildings')">
                            <label for="floatingInput">@lang('Number of Buildings')</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="main_buildings.no_collage_buildings"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of College Buildings')">
                            <label for="floatingInput">@lang('Number of College Buildings')</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="main_buildings.total_land_area"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Land area in Acres')">
                            <label for="floatingInput">@lang('Land area in Acres')</label>
                        </div>
                    </div>
                </div>
                <div class="mt-3 row">
                    <div class="col-md-4 col-12">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="main_buildings.no_schools"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of schools')">
                            <label for="floatingInput">@lang('Number of schools')</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="main_buildings.no_campuses"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Campuses')">
                            <label for="floatingInput">@lang('Number of Campuses')</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input  type="number" wire:model.defer="main_buildings.no_libraries"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Libraries')">
                            <label for="floatingInput">@lang('Number of Libraries')</label>
                        </div>
                    </div>
                </div>
                <div class="mt-3 row">
                    <div class="col-md-4 col-12">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="main_buildings.no_labs"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Labs')">
                            <label for="floatingInput">@lang('Number of Labs')</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="main_buildings.no_classrooms"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Classrooms')">
                            <label for="floatingInput">@lang('Number of Classrooms')</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="main_buildings.no_auditoriums"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Auditorium')">
                            <label for="floatingInput">@lang('Number of Auditorium')</label>
                        </div>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-6 offset-6 d-flex justify-content-md-end">
                        <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
                        <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Cancel')</button>
                    </div>
                </div>
                <div class="w-100 px-5">
                    <hr>
                </div>
                <div class="d-md-flex col-md-6 h6 blue justify-content-between">
                    <div class="box-bottom-note">@lang('Updated on') {{$uni_main_buildings?->updated_at->toDayDateTimeString()}}</div>
                    <div class="mobile-marg-2">@lang('By') {{$uni_main_buildings?->createdBy?->name}}</div>
                </div>
            </div>
        </div>
    </div>
    <x-general.loading message="Processing..." />
</div>
