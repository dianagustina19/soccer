@include('header')

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bulma@4/bulma.css" rel="stylesheet">

<div class="wrapper">
    <div class="section section-light-blue">
        <div class="container">
            <div id="menu-dropdown">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tim-title">
                            <center><h3>Edit Pertandingan</h3></center>
                        </div><br>
                        <form action="{{url('/pertandinganeditPost')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <th>Tanggal Pertandingan</th>
                                    <input type="hidden" name="pertandingan_id" value="{{$pp->id}}">
                                    <td><input type="text" name="tanggal_pertandingan" id="tanggal_pertandingan" value="{{$pp->tanggal_pertandingan}}" class="form-control datepicker" readonly></td>
                                </tr>
                                <tr>
                                    <th>Waktu Pertandingan (Menit)</th>
                                    <td><input type="text" name="waktu_pertandingan" id="waktu_pertandingan" value="90" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <th>Tuan Rumah</th>
                                    <td>
                                        <input type="text" name="tanggal_pertandingan" id="tanggal_pertandingan" value="{{$pp->nama_tim}}" class="form-control" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tamu</th>
                                    <td>
                                        <input type="text" name="tanggal_pertandingan" id="tanggal_pertandingan" value="{{$pp->tamu}}" class="form-control" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pertandingan</th>
                                    <td>
                                        <input type="radio" name="yesno" value="no" id="noCheck" checked="checked"> 
                                        <strong>Pertandingan Masih Berjalan</strong><br>
                                        
                                        <input type="radio" name="yesno"  value="yes" id="yesCheck">
                                        <strong>Pertandingan Sudah Berakhir</strong>
                                    </td>
                                </tr>
                                <tr class="showCta">
                                    <th>Skor Akhir</th>
                                    <td><input type="text" name="skor_akhir" id="skor_akhir" placeholder="Contoh : 1 - 0"  class="form-control"></td>
                                </tr>
                                <tr class="showCta">
                                    <th>Pemain Pencetak / Waktu Gol</th>
                                    <td>
                                        <input type="text" name="pemain_pencetak[]" id="pemain_pencetak" placeholder="Contoh : Tim asal - Nama Pemain" class="form-control"><br>
                                        <input type="text" onkeypress="return hanyaAngka(event)" name="waktu_gol[]" id="waktu_gol" placeholder="Contoh : 10" class="form-control">
                                        <br><button type="button" class="btn btn-fill btn-neutral btn-sm add-row"><i class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            </table>
                                <a href="/pertandingan" class="btn btn-fill btn-neutral"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button class="btn btn-fill btn-neutral" onclick="return updatepm()" ><i class="fa fa-pencil"></i> Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script>
    //Add Row
    $(document).ready(function(){
        $(".add-row").click(function(){
            var markup = "<tr><th></th><td><input type='text' name='pemain_pencetak[]' id='pemain_pencetak' placeholder='Contoh : Tim asal - Nama Pemain' class='form-control'><br><input type='text' onkeypress='return hanyaAngka(event)' name='waktu_gol[]' id='waktu_gol' placeholder='Contoh : 10' class='form-control'><br><button type='button' class='btn-sm btn-fill btn-danger delete-row' onclick='deleteRow(this)'><i class='fa fa-trash'></i></button></tr>";
            $("table tbody").append(markup);
        });
    });

    //Delete Row
    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    //validasi hanya angka  
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
    }

    //radio box check uncheck
    $('input[type="radio"]').change(function(){
        if (this.checked){
            $('.showCta').toggle(this.value === 'yes');
        }
    }).change();

    //Function Submit
    function updatepm(){

        var skor_akhir = document.getElementById('skor_akhir').value;
   
        if(skor_akhir == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Skor Akhir Tidak Boleh Kosong!", "error");
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
                    swal.fire("Cancelled", "Ubah Pertandingan dibatalkan!", "error");
                }
            });
        }
    }

</script>
