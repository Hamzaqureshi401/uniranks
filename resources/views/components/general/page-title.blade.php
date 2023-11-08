@props(['title'=>'','subTitle'=>''])
<div class="d-md-flex justify-content-between">
    <div class="blue col-md-12">
        <div class="d-md-flex align-items-center">
            <div class="h4 mb-0 blue">@lang($title)</div>
            <div class="light-gray col-marg h4 mobile-hidden">|</div>
            <div class="h4 mb-0 blue col-marg">@lang($subTitle)</div>
        </div>
    </div>
</div>
