<div x-data="{}">
    <div>
        <div class="col-12">
            <div
                class="h4 text-blue">@lang('Students Select ') {{ $destination?->country_name ?: __('Destinations')}}</div>
        </div>
        <div class="col-6">
            <select wire:model="destination_id" name="destination_id" class="text-start form-control input-field"
                    aria-label="" wire:change="loadStudents">
                <option value=""> @lang('All Destinations')</option>
                @foreach($selectDestinations as $selectDestination)
                    <option value="{{ $selectDestination->id }}">
                        {{ !empty($selectDestination?->translated_name) ? $selectDestination?->translated_name : $selectDestination->country_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100">
                        <div class="row my-3">
                            <div class="col-12 table-responsive">
                                <div wire:model="destination_id" wire:target="loadStudents">
                                    <table class="table">
                                        <thead class="primary-text">
                                        <th class="align-top primary-text text-center" style="/*font-size:13px*/">#</th>
                                        <th class="align-top primary-text text-center"
                                            style="/*font-size:13px*/">@lang('SId')</th>
                                        <th class="align-top primary-text text-center"
                                            style="/*font-size:13px*/">@lang('Photo')</th>
                                        <th class="align-top primary-text text-center"
                                            style="/*font-size:13px*/">@lang('Name')</th>
                                        <th class="align-top primary-text text-center"
                                            style="/*font-size:13px*/">@lang('Destinations')</th>
                                        </thead>
                                        <tbody class="text-muted align-center">
                                        @forelse($students as $student)
                                            <tr>
                                                <td class="align-center text-center"
                                                    style="/*font-size:13px*/; width: 10%">{{ $loop->iteration + ($students->currentPage() - 1) * 10 }}</td>
                                                <td class="align-center text-center"
                                                    style="/*font-size:13px*/; width: 10%">{{ $student->id }}</td>
                                                <td class="align-center text-center" style="/*font-size:13px*/; width: 20%">
                                                    <img src="{{ $student->profile_photo_url }}"
                                                         class="navbar-user-avatar" alt="{{ $student->name }}"></td>
                                                <td class="align-center text-center"
                                                    style="/*font-size:13px*/; width: 20%"><a href="javascript:void(0)" class="blue"
                                                                  @click="$wire.emit('showStudentDetails','{{$student->id}}')">{{$student->name}}</a>
                                                </td>
                                                @php
                                                    $country= $destination ?? $student?->studyDestinations->first();
                                                    $universities_count = $student->studyDestinations->count() - 1;
                                                @endphp
                                                <td class="align-center text-center"
                                                    style="/*font-size:13px*/; width: 40%">{{$country->country_name}}
                                                    @if($universities_count > 0)
                                                        @lang('and')
                                                        <a @click="$wire.emit('showStudentDetails','{{$student->id}}')"
                                                           href="javascript:void(0)" class="blue">
                                                            {{$universities_count}} @lang('more')
                                                        </a>
                                                    @endif
                                                </td>
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
                </div>
            </div>
        </div>
    </div>
    <x-general.loading message="Loading" />
    @unless(empty($students))
        <div class="row">
            <div class="col-lg-6 mt-2">
                <p class="text-muted small2">{{$students->total()}} @lang('results found')</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="mt-4 mobile-pagination">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    @endunless
</div>
