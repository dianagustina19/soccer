@include('header')

<style type="text/css" media="screen">
        .float-button-wrapper {position: fixed;    left: 25px;    top: 160px;}
        .float-button-wrapper p {left: 15px;    font-size: 11px; margin-bottom: 3px;}
        .float-button-page img {background: none; border: none; padding: 0; margin: 0;}
        .float-button-page a {float: left; clear: left; margin-bottom: 1px;}
        .float-button-page a:hover img {background-color: #f1f1f1; filter: alpha(opacity=50); -moz-opacity: 0.5;    -khtml-opacity: 0.5; opacity: 0.5;}
        .float-button-page {position: absolute;    background: none;}
    </style>
<div class="wrapper">
    <div class="section section-light-blue">
        <div class="container">
            <div id="menu-dropdown">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tim-title">
                            <center><h3>Jadwal Pertandingan</h3></center>
                        </div><br>
                        @foreach($pertandingan as $p)
                        <div class="col-sm-6 col-md-6">
                            <div class="thumbnail">
                                <div class="col-sm-4 col-sm-6">
                                    <center><img src="{{ url('/data_foto/'.$p->tim->logo_tim) }}" width="70%"></center>
                                </div>
                                <div class="col-sm-2">
                                <br><br>
                                    <center><img src="{{ url('/assets/paper_img/vs.jpg') }}" width="70%"></center>
                                </div>
                                <div class="col-sm-4 col-sm-6">
                                    <center><img src="{{ url('/data_foto/'.$p->logo_tamu) }}" width="70%"></center>
                                </div>    
                                <br><br><br><br><br>
                                <div class="caption"> 
                                        <h4>{{$p->tim->nama_tim}} vs {{$p->tamu}}</h4>
                                        <p>Pertandingan Sepak Bola {{$p->tim->nama_tim}} melawan {{$p->tamu}}</p>
                                        <p>Tanggal Pertandingan : {{$p->tanggal_pertandingan}}</p>
                                        <br>
                                        <p>
                                            <center>
                                            @if($p->status == 1)
                                                <a href="/pertandinganedit/{{$p->id}}" class="btn btn-default" role="button">OnProgress</a>
                                            @else
                                                <a href="/pertandingandetail/{{$p->id}}" class="btn btn-default" role="button">Selesai</a>
                                            @endif
                                            </center>
                                        </p>
                                    </div>
                            </div>
                        </div>
                        @endforeach
                        <div style="overflow:auto; width:100%; height:100px;">
                                <div class="float-button-wrapper">
                                    <div class="float-button-page">
                                        <a href="/pertandingancreate" class="btn btn-fill btn-neutral"><i class="fa fa-plus"></i>Tambah Pertandingan</a>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
@include('js')