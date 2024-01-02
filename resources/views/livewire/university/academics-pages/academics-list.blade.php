<div class="card bg-transparent mt-4">
<div class="card-body mt-3 bg-body-color">
    <div class="h5 blue">@lang('Conferences')</div>
    <div class="w-100 px-4 mt-3">
        <hr>
    </div>

    <div class="table-responsive">
        <table class="table">
            <tbody>
                @foreach($academics as $academic)
                <tr>
                    <td class="blue">{{ empty($academic->first_name) ? '--' : $academic->first_name }}</td>
                    <td class="blue">
                         {{ $academic->created_at ? $academic->created_at->format('D, M j, Y g:i A') : '--' }}
                    </td>
                    <td class="blue">By {{ $academic->user->name }}</td>
                    <td class="text-place-end">
                        
                        <a href="#" class="light-blue mr-25">View</a>
                        <a href="javascript:void(0);" class="light-blue mr-25" wire:click.prevent="edit('{{$academic->id}}')">@lang('Edit')</a>
                        <a href="javascript:void(0)" wire:click="delete('{{$academic->id}}')" class="red">@lang('Delete')</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
