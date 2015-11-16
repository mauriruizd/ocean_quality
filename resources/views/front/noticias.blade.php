@extends('front.master')
@section('titulo')
    # Noticias
@stop
@section('contenido')
    <div class="row">
        <!-- aca comienza-->
        <?php
            $meses = [
                'ENE',
                'FEB',
                'MAR',
                'ABR',
                'MAY',
                'JUN',
                'JUL',
                'AGO',
                'SEP',
                'OCT',
                'NOV',
                'DIC'
            ];
        ?>
        @foreach($noticias as $noticia)
            <div class="col-md-4 noticuadro">
                <br>
                <div class="box_fecha">
                    <?php $date = \Carbon\Carbon::parse($noticia->updated_at);?>
                    <p class="textogra">{{ $date->day }}</p>
                    <p class="mes">{{ $meses[$date->month - 1] }}</p>

                </div>

                <div class="box_noti">
                    <!-- Button trigger modal -->


                    <h3 class="text_azul">Noticias</h3>
                    <h4>
                        @if(strlen($noticia->cuerpo) <= 30)
                            {{ $noticia->cuerpo }}
                        @else
                            {{ substr($noticia->cuerpo, 0, 30) }}
                        @endif
                    </h4>
                    <div class="aba">
                        <button type="button" id="btn-noti-{{ $noticia->id }}" class="btn btn-primary btn-noticia-mas" data-toggle="modal" data-target="#notiModal">
                            saber +
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="notiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    </div>
@stop
@section('includes')
    <script>
        $(document).ready(function(){
            $('.btn-noticia-mas').on('click', function(){
                var id = $(this).attr('id').replace('btn-noti-', '');
                $('#notiModal').load(getModalURL(id));
            });

            function getModalURL(id){
                var basepath = "{{ URL::to('api/noticias') }}";
                return basepath + '/' + id + '/modal';
            }
        });
    </script>
@stop