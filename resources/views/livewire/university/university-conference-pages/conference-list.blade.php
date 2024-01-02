
@push('styles')
<style type="text/css">
    .no-border td,
    .no-border th {
        border: none !important;
    }
</style>
@endpush
<div class="card bg-transparent mt-4">
    <div class="card-body">
        <div class="h4 blue" id="upload-images">@lang('Conferences')</div>
        <div class="w-100 px-4 mt-3">
            <hr>
        </div>

        <table class="table">
            <tbody>
                @foreach(\Auth::user()->selected_university->conferences()->get() as $con)
                <tr class="no-border">
                    <td>
                        <div class="card bg-transparent mt-4">
                            <div class="card-body">
                                <div class="h5 blue">{{$con->title ?? '--'}}</div>
                                <table class="table">
                                    <tbody>
                                        @foreach($con->subjects as $s)
                                        <tr>
                                            <td class="blue">{{ $s->title ?? '--'}}</td>
                                            <td class="blue">Created on {{ $con->created_at }}</td>
                                            <!-- <td class="blue">By {{ $con->created_by ?? '--'}}</td> -->
                                            <td class="blue text-end">
                                                
                                                <a href="javascript:void(0);" class="light-blue" wire:click="edit('{{$con->id}}')" class="blue mr-25">@lang('Edit')</a>
                                                <a href="javascript:void(0)" wire:click="delete({{ $s->id }})" class="red ms-2 ">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
