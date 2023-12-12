@props(['links'=>explode('.',Route::current()->action['as'])])
<ul class="d-flex text-light ps-0" style="list-style: none">
    @foreach($links as $link)
        @php
        $title = Str::of($link)->studly()->snake(' ')->title()->value();
        $group = Str::before(Route::current()->action['as'],$link)."{$link}.show";
        $url = Route::has($group)? route($group) : null;
        $title = __($title);
        @endphp
        @if(!$loop->last)
            @if(!empty($url))
            <li><a href="{{$url}}" class="text-light">{{$title}}</a></li>
            <li class="mx-1">/</li>
            @endif
        @else
            <li><span class="light-blue">{{$title}}</span></li>
        @endif
    @endforeach
</ul>
