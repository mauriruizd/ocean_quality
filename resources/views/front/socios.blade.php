<h3>SOCIOS COMERCIALES</h3>
<div class="linea2"><img src="{{ URL::to('img/linea3.png') }}"></div>
<div class="socios">
    <style>
        ul li span.black{
            height: auto;
        }
    </style>

    <div class="slider-wrap">
        <div class="slider1">


                @for($i = 1; $i < 19; $i++)
                    <div class="slide"><img src="{{ url('imagen-nuevo/'.$i.'.jpg') }}"></div>
                @endfor

            <a href="#" class="slider-arrow sa-left">&lt;</a> <a href="#" class="slider-arrow sa-right">&gt;</a> </div>

    </div>


</div><!--socios-->
<br>
