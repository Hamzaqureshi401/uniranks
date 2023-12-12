<div>
    <div class="row">
        <div class="col-12">
            <h5 class="h5 mb-3">
                <span class="primary-text">@lang('University Fair list')</span>
                <span class="font-light light-gray">&nbsp;|&nbsp;</span>
                <a href="{{route('admin.school.fair.create')}}" class="secondary-text text-heading-light"
                   style="text-decoration: underline ">@lang('Create a New Fair')</a>
            </h5>
        </div>
    </div>

    <x-general.status-alert/>


    @php
        /**
        * @var \App\Models\Institutes\University $university
        * @var \Illuminate\Database\Eloquent\Collection | \Illuminate\Contracts\Pagination\LengthAwarePaginator | \App\Models\Fairs\Fair[] $fairs
        **/
        $school = Auth::user()->selected_school;
    @endphp

    @forelse($fairs as $key=>$fair)
        @php
            $sr_num = $loop->iteration + ($fairs->currentPage() - 1) * $fairs->perPage()
        @endphp
        <div class="row my-2">
            <div class="col-12">
                <div class="card">
                    <div class="p-2">
                        <div class="d-lg-flex align-self-start">
                            <div class="blue text-place-center w-7 d-md-flex flex-column justify-content-center">
                                <div class="h2">{{$sr_num}}</div>
                                <div class="mt-1 small">@lang('FID'): {{$fair->id}}</div>
                            </div>
                            <div class="flex-fill pe-4">
                                <div class="row light-blue d-block d-md-flex">
                                    <a class="col col-md-6" href="{{route('admin.school.fair.view',$fair->id)}}">{{$fair->fair_name}}</a>
                                    <div class="col col-md-6 text-md-end">{{$fair->datetime}}</div>
                                </div>
                                <div class="row light-blue">
                                    <div class="col-12">
                                        {{$fair->school?->city?->city_name}} - {{$fair->fairType?->fair_type_name}}
                                    </div>
                                </div>
                                <div class="row mt-1 mobile-marg-2 blue d-block d-md-flex">
                                    <div class="col col-md-2 d-flex d-md-block">
                                        <div>@lang('G12')<span class="d-md-none">:&nbsp; </span></div>
                                        <div
                                            class="">{{$fair->school?->number_grade12}}</div>
                                    </div>
                                    <div class="col col-md-2 d-flex d-md-block">
                                        <div>@lang('G11')<span class="d-md-none">: &nbsp;</span></div>
                                        <div class="">{{$fair->school?->number_grade11}}</div>
                                    </div>
                                    <div class="col col-md-2 d-flex d-md-block">
                                        <div>@lang('Max Uni')<span class="d-md-none">: &nbsp;</span></div>
                                        <div class="">{{$fair->max}}</div>
                                    </div>
                                    <div class="col col-md-2 d-flex d-md-block">
                                        <div>@lang('Students')<span class="d-md-none">: &nbsp;</span></div>
                                        <div class="">
                                            <a class="light-blue"
                                               href="{{route('admin.school.fair.confirmedStudents',$fair->id)}}"
                                               title="Click to view full list">
                                                {{$fair->attendance_count}}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col col-md-2 d-flex d-md-block align-items-center">
                                        <div>@lang('Universities')<span class="d-md-none">: &nbsp; </span></div>
                                        <div class="">
                                            <a class="light-blue"
                                               href="{{route('admin.school.fair.registeredUniversities',$fair->id)}}"
                                               title="Click to view full list">
                                                {{$fair->invitation_count}}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col col-md-2 text-md-end d-flex d-md-block align-items-center">
                                        <div>@lang('Action')<span class="d-md-none">: &nbsp;</span></div>
                                        <div class="blue h6 text-place-end mb-0">
                                            @if($fair->is_editable)
                                                <a href="{{route('admin.school.fair.edit',$fair->id)}}"
                                                   class="primary-text">@lang('Edit')</a>
                                                <a href="javascript:void(0)" wire:click="openModalConfirmModal({{$fair->id}})" class="red">@lang('Delete')</a>
                                            @endif
                                            <a href="{{route('admin.school.fair.performance',$fair->id)}}"
                                               title="@lang('Check Performance')" class="primary-text">
                                                @lang('Performance')
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @empty
        <div class="row">
            <div class="col-12">
                <h6 class="text-center mt-4 no-records">
                    @lang('No Record Found!')
                </h6>
            </div>
        </div>
    @endforelse
    <div class="row">
        <div class="col-lg-6 mt-2">
            <p class="text-muted small2">@lang(':results results found',['results'=>$fairs->total()])</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class=" mt-4 mobile-pagination">
                {!! $fairs->links() !!}
            </div>
        </div>
    </div>
    <x-general.loading message="Processing..." wire:target="gotoPage, loadFairs, previousPage, nextPage, openModalConfirmModal" />
    @php
        /**@var \App\Models\Fairs\Fair $selected_fair*/
    @endphp
    <x-jet-modal wire:model="isModalOpen">
        <x-slot name="title">
            <h4 class="modal-title h3 fw-bold blue" id="staticBackdropLabel">
                @lang('Confirm Delete Fair')
            </h4>
        </x-slot>
        <div class="row mt-3 blue">
            <div class="col-12">
                @lang('Are you sure you want to delete') {!! !empty($selected_fair?->fair_name)? '<b class="light-blue">'.$selected_fair->fair_name.'</b>' : " " !!} @lang('this fair')
            </div>
        </div>
        <x-general.loading message="Processing..." wire:target="deleteFair,closeModal" />
        <div class="row mt-3">
            <div class="col-3 offset-6">
                <button wire:click="deleteFair" class="button-sm button-red w-100">
                    @lang('Yes Delete')
                </button>
            </div>
            <div class="col-3">
                <button wire:click="closeModal" class="button-sm button-light-blue w-100">
                    @lang('No, cancel!')
                </button>
            </div>
        </div>
    </x-jet-modal>
</div>
