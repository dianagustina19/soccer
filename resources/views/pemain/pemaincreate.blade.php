@include('header')

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bulma@4/bulma.css" rel="stylesheet">

<div class="wrapper">
    <div class="section section-light-blue">
        <div class="container">
            <div id="menu-dropdown">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tim-title">
                            <center><h3>Tambah Pemain</h3></center>
                                </div><br>
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        Ada Kesalahan<br><br>
                                    <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    </div>
                                @endif
                                @if($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                @if($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                <form action="{{url('/pemaincreatePost')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama Pemain</th>
                                            <td><input type="text" name="nama_pemain" id="nama_pemain" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Tinggi Badan (Cm)</th>
                                            <td><input type="text" name="tinggi_badan" id="tinggi_badan" onkeypress="return hanyaAngka(event)" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Berat Badan (Kg)</th>
                                            <td><input type="text" name="berat_badan" id="berat_badan" onkeypress="return hanyaAngka(event)" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Posisi Pemain</th>
                                            <td>
                                                <select name="posisi_pemain" id="posisi_pemain" class="form-control">
                                                    <option value="">Pilih Posisi</option>
                                                    <option value="penyerang">Penyerang</option>
                                                    <option value="gelandang">Gelandang</option>
                                                    <option value="bertahan">Bertahan</option>
                                                    <option value="penjaga_gawang">Penjaga Gawang</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Punggung</th>
                                            <td><input type="text" name="nomor_punggung" id="nomor_punggung" onkeypress="return hanyaAngka(event)" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Tim Asal</th>
                                            <td>
                                                <select name="tim_asal" id="tim_asal" class="form-control">
                                                    <option value="">Pilih Tim</option>
                                                    @foreach($tim as $tim)
                                                    <option value="{{$tim->id}}">{{$tim->nama_tim}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <a href="/pemain" class="btn btn-fill btn-neutral"><i class="fa fa-arrow-left"></i> Kembali</a>
                                    <button class="btn btn-fill btn-neutral" onclick="return updatepm()"><i class="fa fa-plus-circle"></i> Tambah</button>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
    //validasi hanya angka  
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
    }

    //validasi hanya huruf
    function harusHuruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
    }

    function updatepm(){

        var nama_pemain = document.getElementById('nama_pemain').value;
        var tinggi_badan = document.getElementById('tinggi_badan').value;
        var berat_badan = document.getElementById('berat_badan').value;
        var posisi_pemain = document.getElementById('posisi_pemain').value;
        var nomor_punggung = document.getElementById('nomor_punggung').value;
        var tim_asal = document.getElementById('tim_asal').value;

        if(nama_pemain == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Nama Pemain Tidak Boleh Kosong!", "error");
        
        }else if(tinggi_badan == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Tinggi Badan Tidak Boleh Kosong!", "error");
        }else if(berat_badan == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Berat Badan Tidak Boleh Kosong!", "error");
        }else if(posisi_pemain == ''){
            event.preventDefault(); // prevent form submit\
            swal.fire("Cancelled", "Posisi Pemain Tidak Boleh Kosong!", "error");
        }else if(nomor_punggung == ''){
            event.preventDefault(); // prevent form submit\
            swal.fire("Cancelled", "Nomor Punggung Tidak Boleh Kosong!", "error");
        }else if(tim_asal == ''){
            event.preventDefault(); // prevent form submit\
            swal.fire("Cancelled", "Tim Asal Tidak Boleh Kosong!", "error");
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
                    swal.fire("Cancelled", "Tambah pemain dibatalkan!", "error");
                }
                });
        }


        }

</script>