<div class="mt-5">
    <section class="mb-4">
        <h2 class="h2 blue">@lang('Students Statistics')</h2>
        <p class="paragraph-style1 gray font-normal mt-3">
            @lang("Monitor students registration, applications,transactions with universities, enrollments and more")
        </p>
    </section>
    @foreach($statistics as $cards)
    <div @class(['row g-2','mt-1'=>!$loop->first])>
        @foreach($cards as $card)
        <div class="w-100 d-block d-md-none my-1"></div>
        <!--to force new line-->
        <div class="col">
            <a href="{{$card['url']}}" class="card text-decoration-none">
                <div class="p-3 statistics-card-content">
                    <div class="row">
                        <h5 class="h5 blue">@lang($card['title'])</h5>
                    </div>
                    <div class="d-flex mt-2 align-items-center">
                        <div class="w-90">
                            <h3 class="h2 blue">{{__($card['count'])}}</h3>
                        </div>
                        <div class="w-10 ">
                            <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4>
                        </div>
                    </div>
                    @php
                    $percentage = 0;
                    $students_not_registered = 0;
                    $total_students = $card['total_students'];
                    if ($total_students > 0){
                        $students_not_registered  = $total_students - $card['students'];
                        $percentage = ($card['students']/$total_students)*100;
                        if (Str::contains($percentage,'.')){
                        $percentage = number_format($percentage,2);
                        }
                    }
                    @endphp
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$percentage}} @lang("% of the Total") {{$total_students}} @lang("Students")</p>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$students_not_registered}} @lang('Students did not register')</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
