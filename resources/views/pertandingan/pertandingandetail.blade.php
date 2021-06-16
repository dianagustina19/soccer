@include('header')

<div class="wrapper">
    <div class="section section-light-blue">
        <div class="container">
            <div id="menu-dropdown">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tim-title">
                            <center><h3>Detail Pertandingan</h3></center>
                        </div><br>
                        <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <th>Tanggal Pertandingan</th>
                                    <td>
                                        <input type="text" value="{{$pertandingan->tanggal_pertandingan}}" class="form-control datepicker" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Waktu Pertandingan (Menit)</th>
                                    <td>
                                        <input type="text" value="90" class="form-control" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tuan Rumah</th>
                                        <td>
                                            <input type="text" class="form-control" value="{{$pertandingan->nama_tim}}" readonly>
                                        </td>
                                </tr>
                                <tr>
                                    <th>Tamu</th>
                                    <td>
                                        <input type="text" class="form-control" value="{{$pertandingan->tamu}}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pertandingan</th>
                                    <td>
                                    @if($pertandingan->status == 1)
                                        <input type="radio" name="yesno" value="no" id="noCheck" checked="checked" disabled> 
                                        <strong>Pertandingan Masih Berjalan</strong><br>
                                        <input type="radio" name="yesno"  value="yes" id="yesCheck" disabled>
                                        <strong>Pertandingan Sudah Berakhir</strong>
                                    @else   
                                        <input type="radio" name="yesno" value="no" id="noCheck" disabled> 
                                        <strong>Pertandingan Masih Berjalan</strong><br>
                                        <input type="radio" name="yesno"  value="yes" id="yesCheck" checked="checked" disabled>
                                        <strong>Pertandingan Sudah Berakhir</strong>
                                    @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Skor Akhir</th>
                                    <td>
                                        <input type="text" value="{{$pertandingan->skor_akhir}}" class="form-control" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pemain Pencetak / Waktu Gol</th>
                                    <td>
                                        @foreach($gol as $gol)
                                        <div class="col-md-6">
                                            <input type="text" value="{{$gol->pemain_pencetak}}" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" value="{{$gol->waktu_gol}}'" class="form-control" readonly>
                                        </div><br><br>
                                        @endforeach
                                    </td>
                                </tr>
                            
                            </table>
                            <a href="/pertandingan" class="btn btn-fill btn-neutral"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
@include('js')

