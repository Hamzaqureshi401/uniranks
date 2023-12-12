<div x-data="{ showFilters: false }" class="w-100">
    <div class="row">
        <div class="col-12 d-flex justify-content-between blue">
            <div class="h5 blue">{{ __('List of students registration status') }}</div>
            <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"></i>
        </div>
    </div>
    <div class="row align-items-center my-3 d-md-flex small5" :class="showFilters ? '' : 'd-none'">
        <div class="col-12 col-md-3">
            <select wire:model="major_id" name="major_id" class="input-field form-control me-2" aria-label=""
                wire:change="loadStudents">
                <option value=""> {{ __('All Majors') }}</option>
                @foreach ($majors as $major)
                    <option value="{{ $major->id }}">{{ $major?->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-100 d-block d-md-none my-1"></div>
        <!--to force new line-->
        <div class="col-12 col-md-3">
            <select wire:model="event_id" name="event_id" class="input-field form-control" aria-label=""
                wire:change="loadStudents">
                <option value=""> {{ __('All Events') }}</option>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event?->fair_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-100 d-block d-md-none my-1"></div>
        <!--to force new line-->
        <div class="col-12 col-md-6 ">
            <label class="primary-text float-end" x-data="{ show_flag: false }">
                <input type="checkbox" wire:click="change_list" class="ur-checkbox"> {{ __('Show students who have not registered yet') }}
            </label>
        </div>
    </div>
    <div class="card">
        <div id="event_lead">
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <tbody>
                            <!--Heading Row-->
                            <tr>
                                <td class="w-5">#</td>
                                <td class="w-10">{{ __('SId') }}</td>
                                <td class="w-10">{{ __('Photo') }}</td>
                                <td class="w-15">{{ __('Name') }}</td>
                                <td class="w-30">{{ __('Majors') }}</td>
                                <td class="w-30">{{ __('Last Event') }}</td>
                                <td class="w-5 text-end">@lang("Action")</td>
                            </tr>
                            <!--End Heading row-->
                            <!--Row Start-->
                            @forelse($students as $student)
                                @php
                                    $studentEvent = $selected_event ?? $student->attendedFairs->last();
                                    $studentMajor = $selected_major ?? $student->majors->first();
                                    $universities_count = $student->majors->count() - 1;
                                @endphp
                                <tr>
                                    <td class="text-start">
                                        {{ $loop->iteration + ($students->currentPage() - 1) * 10 }}
                                    </td>
                                    <td class="text-start">{{ $student->id }}</td>
                                    <td class="text-start"><img src="{{ $student->profile_photo_url }}"
                                            class="navbar-user-avatar" alt="{{ $student->name }}"></td>
                                    <td class="text-start">
                                        <a href="javascript:void(0)" class="blue" @click="$wire.emit('showStudentDetails','{{$student->id}}')">{{$student->name}}</a>
                                    </td>
                                    <td class="text-start">
                                        {{ $studentMajor?->title ?? "N/A" }}
                                        @if($universities_count > 0)
                                            @lang('and')
                                            <a @click="$wire.emit('showStudentDetails','{{$student->id}}')"
                                               href="javascript:void(0)" class="blue">
                                                {{$universities_count}} @lang('more')
                                            </a>
                                        @endif
                                    </td>
                                    <td class="text-start">
                                        <span>{{ empty($studentEvent) ? '' : $studentEvent->fair_name }}</span>
                                    </td>
                                    @if ($student->register_by_app)
                                        <td class="text-end"><input type="checkbox" class="check-bx" disabled></td>
                                    @else
                                        <td class="text-end" x-data="{ flag: false }"><input type="checkbox"
                                                @click="flag = !flag" x-on:click="$wire.selectedCount(flag)" x-if=
                                                class="check-bx"></td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <h6 class="text-center mt-4 no-records">
                                            @lang('No Record Found!')
                                        </h6>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-between align-items-center my-2 small5">
        <div class="col-12 col-md-6">
            <label class="primary-text">{{ $unregistered_count }} {{ __('students have not registered yet') }}</label>
        </div>

        <div class="col-12 col-md-6 d-flex justify-content-between align-items-center justify-content-md-end ">
            <label class="primary-text">{{ __('you have selected') }} {{ $selected_count }} {{ __('students') }} </label>
            <button wire:click="sendReminder" class="button-sm button-dark-blue">{{ __('Send Registration Link!') }}</button>
        </div>
    </div>
    @unless(empty($students))
        <div class="row mt-3">
            <div class="col-lg-6 mt-2">
                <p class="text-muted small2">{{ $students->total() }} @lang('results found')</p>
            </div>
            <div class="col-12">
                <div class="mt-4 mobile-pagination">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    @endunless
    <x-general.loading message="Loading" />
</div>
