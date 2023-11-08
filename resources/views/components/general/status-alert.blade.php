@props(['name'=>'status'])
@if (session($name))
    <div class="my-3 font-medium alert alert-{{session('status-type') ?? 'success'}}">
        {!! session($name)  !!}
    </div>
@endif
