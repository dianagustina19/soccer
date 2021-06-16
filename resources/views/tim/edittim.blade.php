@include('header');
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="wrapper">
    <div class="section section-light-blue">
        <div class="container">
            <div id="menu-dropdown">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tim-title">
                            <center><h3>Edit Tim</h3></center>
                                </div><br>
                                <form action="/timupdate" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama Tim</th>
                                            <input type="hidden" name="id" value="{{$tim->id}}">
                                            <td><input type="text" name="nama_tim" value="{{$tim->nama_tim}}" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Logo Tim</th>
                                            <td>
                                                <img src="{{ url('/data_foto/'.$tim->logo_tim) }}" alt="" width="20%">
                                                <input type="hidden" name="logo_tim_lama" value="{{$tim->logo_tim}}">
                                                <input type="file" name="logo_tim_baru" value="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tahun Berdiri</th>
                                            <td><input type="text" name="tahun_berdiri" value="{{$tim->tahun_berdiri}}" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Markas Tim</th>
                                            <td><input type="text" name="alamat" value="{{$tim->alamat}}" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Kota</th>
                                            <td><input type="text" name="kota" value="{{$tim->kota}}" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Liga Pertandingan</th>
                                            <td><input type="text" name="tanggal" value="{{$tim->tanggal}}" id="tanggal" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Tes Kesehatan Tim</th>
                                            <td>
                                                @if($tim->status == 'sudah')
                                                <input type="radio" name="status" value="sudah" id="status" checked> 
                                                <strong>Sudah</strong> &nbsp;
                                                <input type="radio" name="status" value="belum" id="status">
                                                <strong>Belum</strong>
                                                @else
                                                <input type="radio" name="status" value="sudah" id="status"> 
                                                <strong>Sudah</strong> &nbsp;
                                                <input type="radio" name="status" value="belum" id="status" checked>
                                                <strong>Belum</strong>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    <a href="/tim" class="btn btn-fill btn-neutral"><i class="fa fa-arrow-left"></i>Kembali</a>
                                    <button type="submit" class="btn btn-fill btn-neutral"><i class="fa fa-pencil"></i>Edit</button>
                                </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
@include('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
$(function() {

$('input[name="tanggal"]').daterangepicker({
    autoUpdateInput: false,
    locale: {
        cancelLabel: 'Clear'
    }
});

$('input[name="tanggal"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
});

$('input[name="tanggal"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});

});
</script>