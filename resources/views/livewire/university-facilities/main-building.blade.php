<div>
    <x-general.university-facility-page-title sub-title="University Main Building"/>
    <div class="card">
        <div class="card-body">
            <div class="blue">@lang('University Building Information')</div>
            <x-general.status-alert/>
             <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
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
                <!-- <div class="d-md-flex col-md-6 h6 blue justify-content-between">
                    <div class="box-bottom-note">@lang('Updated on') {{$uni_main_buildings?->updated_at->toDayDateTimeString()}}</div>
                    <div class="mobile-marg-2">@lang('By') {{$uni_main_buildings?->createdBy?->name}}</div>
                </div> -->
            </div>
        </div>
    </div>

    <div class="card bg-transparent mt-4">
   <div class="card-body">
      <div class="h4 blue"> @lang('Building')</div>
      <div class="w-100 px-4 mt-3">
         <hr>
      </div>
      <div>
         <table class="table table-responsive">
         <thead>
            <tr class="blue">
               <th>Building</th>
               <th>Collages</th>
               <th>Total Area</th>
               <th>Schools Email</th>
               <th>Campuses</th>
               <th>Libraries</th>
               <th>Labs</th>
               <th>Classrooms</th>
               <th>Auditoriums</th>
               <!-- <th>Action</th> -->
            </tr>
         </thead>
         <tbody>
            
            <tr class="blue">
              <td>{{ $edit_item['no_building'] ?? ''}}</td>
              <td>{{ $edit_item['no_collage_buildings'] ?? ''}}</td>
              <td>{{ $edit_item['total_land_area'] ?? ''}}</td>
              <td>{{ $edit_item['no_schools'] ?? ''}}</td>
              <td>{{ $edit_item['no_campuses'] ?? ''}}</td>
              <td>{{ $edit_item['no_libraries'] ?? ''}}</td>
              <td>{{ $edit_item['no_labs'] ?? ''}}</td>
              <td>{{ $edit_item['no_classrooms'] ?? ''}}</td>
              <td>{{ $edit_item['no_auditoriums'] ?? ''}}</td>

                <!-- <td><a wire:click="edit" href="javascript:void(0)" class="light-blue ms-2">Edit</a>
                    
                  </td> -->
            </tr>
            @if(empty( $edit_item))
            <tr>
               <td colspan="5">@lang('No sports data available')</td>
            </tr>
            @endif

            
         </tbody>
     </table>
      <div class="d-md-flex col-md-6 h6 blue justify-content-between">
                    <div class="box-bottom-note">@lang('Updated on') {{$uni_main_buildings?->updated_at->toDayDateTimeString()}}</div>
                    <div class="mobile-marg-2">@lang('By') {{$uni_main_buildings?->createdBy?->name}}</div>
                </div>
      </div>
   </div>
</div>

<x-jet-modal wire:model="isModalOpen">
   <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
   <x-slot name="title">
      @lang('Update Main Building')
   </x-slot>

<div class="mt-3 row">
                    <div class="col-md-12 mt-3 col-12">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="edit_item.no_building"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Buildings')">
                            <label for="floatingInput">@lang('Number of Buildings')</label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="edit_item.no_collage_buildings"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of College Buildings')">
                            <label for="floatingInput">@lang('Number of College Buildings')</label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="edit_item.total_land_area"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Land area in Acres')">
                            <label for="floatingInput">@lang('Land area in Acres')</label>
                        </div>
                    </div>
                </div>
                <div class="mt-3 row">
                    <div class="col-md-12 mt-3 col-12">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="edit_item.no_schools"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of schools')">
                            <label for="floatingInput">@lang('Number of schools')</label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="edit_item.no_campuses"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Campuses')">
                            <label for="floatingInput">@lang('Number of Campuses')</label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input  type="number" wire:model.defer="edit_item.no_libraries"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Libraries')">
                            <label for="floatingInput">@lang('Number of Libraries')</label>
                        </div>
                    </div>
                </div>
                <div class="mt-3 row">
                    <div class="col-md-12 mt-3 col-12">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="edit_item.no_labs"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Labs')">
                            <label for="floatingInput">@lang('Number of Labs')</label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="edit_item.no_classrooms"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Classrooms')">
                            <label for="floatingInput">@lang('Number of Classrooms')</label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input type="number" wire:model.defer="edit_item.no_auditoriums"
                                   class="form-control input-field" id="floatingInput"
                                   placeholder="@lang('Number of Auditorium')">
                            <label for="floatingInput">@lang('Number of Auditorium')</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
      <a href="javascript:void(0)" wire:click="update()" class="btn btn-primary">@lang('Update '){{ 'Main Building'}}</a>
   </div>

</x-jet-modal>

    <x-general.loading message="Processing..." />
</div>
