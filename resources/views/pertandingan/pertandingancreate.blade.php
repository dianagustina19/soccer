@include('header')

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bulma@4/bulma.css" rel="stylesheet">

<div class="wrapper">
    <div class="section section-light-blue">
        <div class="container">
            <div id="menu-dropdown">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tim-title">
                            <center><h3>Tambah Pertandingan</h3></center>
                        </div><br>
                        <form action="{{url('/pertandingancreatePost')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <th>Tanggal Pertandingan</th>
                                    <td><input type="text" name="tanggal_pertandingan" id="tanggal_pertandingan" class="form-control datepicker"></td>
                                </tr>
                                <tr>
                                    <th>Waktu Pertandingan (Menit)</th>
                                    <td><input type="text" name="waktu_pertandingan" id="waktu_pertandingan" value="90" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <th>Tuan Rumah</th>
                                        <td>
                                            <select name="tuan_rumah" id="tuan_rumah" class="form-control">
                                                <option value="">Pilih Tim</option>
                                                @foreach($tim as $tim)
                                                <option value="{{$tim->id}}">{{$tim->nama_tim}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                </tr>
                                <tr>
                                    <th>Tamu</th>
                                    <td>
                                        <input type="text" name="tamu" id="tamu" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Logo Tim Tamu</th>
                                    <td>
                                        <input type="file" name="logo_tamu" id="logo_tamu" class="form-control">
                                    </td>
                                </tr>
                            </table>
                                <a href="/pertandingan" class="btn btn-fill btn-neutral"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button class="btn btn-fill btn-neutral" onclick="return updatepm()" ><i class="fa fa-plus"></i> Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
@include('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
    //Function Submit
    function updatepm(){

        var tanggal_pertandingan = document.getElementById('tanggal_pertandingan').value;
        var tuan_rumah = document.getElementById('tuan_rumah').value;
        var tamu = document.getElementById('tamu').value;

        if(tanggal_pertandingan == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Tanggal Pertandingan Tidak Boleh Kosong!", "error");
        }else if(tuan_rumah == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Tua Rumah Tidak Boleh Kosong!", "error");
        }else if(tamu == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Tamu Tidak Boleh Kosong!", "error");
        }else{

                event.preventDefault(); // prevent form submit
                var form = event.target.form; // storing the form
                    swal.fire({
                dangerMode: true,
                title: 'Are you sure?',
                text: "Apakah semua data sudah sesuai ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Create!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then(function(isConfirm) {
                if (isConfirm.value) {
                    form.submit();
                } else if (isConfirm.dismiss === 'cancel') {
                    swal.fire("Cancelled", "Tambah pertandingan dibatalkan!", "error");
                }
            });
        }
    }

</script>