@include('header')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bulma@4/bulma.css" rel="stylesheet">
<div class="wrapper">
    <div class="section section-light-blue">
        <div class="container">
            <div id="menu-dropdown">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tim-title">
                            <center><h3>Tambah Tim</h3></center>
                                </div><br>
                                <form action="/timcreatePost" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama Tim</th>
                                            <td><input type="text" name="nama_tim" id="nama_tim" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Logo Tim</th>
                                            <td><input type="file" name="logo_tim" id="logo_tim" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Tahun Berdiri</th>
                                            <td><input type="text" name="tahun_berdiri" id="tahun_berdiri" onkeypress="return hanyaAngka(event)" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Markas Tim</th>
                                            <td><input type="text" name="alamat" id="alamat" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Kota</th>
                                            <td><input type="text" name="kota" id="kota" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Liga Pertandingan</th>
                                            <td><input type="text" name="tanggal" id="tanggal" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Tes Kesehatan Tim</th>
                                            <td>
                                                <input type="radio" name="status" value="sudah" id="status"> 
                                                <strong>Sudah</strong> &nbsp;

                                                <input type="radio" name="status" value="belum" id="status">
                                                <strong>Belum</strong>
                                            </td>
                                        </tr>
                                        <tr class="showCta">
                                            <th>Nama Pemain / Foto Pemain</th>
                                            <td>
                                                <input type="text" name="nama_pemain[]" id="nama_pemain" placeholder="Nama Pemain" class="form-control"><br>
                                                <input type="file" name="foto_pemain[]" id="foto_pemain" class="form-control"><br>
                                                <input type='text' name='nomor_punggung[]' onkeypress="return hanyaAngka(event)" id='nomor_punggung' placeholder="Nomor Punggung" class='form-control'> <br>
                                                <button type="button" class="btn btn-fill btn-neutral btn-sm add-row"><i class="fa fa-plus-circle"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                    <a href="/tim" class="btn btn-fill btn-neutral"><i class="fa fa-arrow-left"></i> Kembali</a>
                                    <button class="btn btn-fill btn-neutral" onclick="return updatepm()"><i class="fa fa-plus-circle"></i> Tambah</button>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
//Add Row
    $(document).ready(function(){
        $(".add-row").click(function(){
            var markup = "<tr><th></th><td><input type='text' name='nama_pemain[]' id='nama_pemain' placeholder='Nama Pemain' class='form-control'><br><input type='file' name='foto_pemain[]' id='foto_pemain' class='form-control'><br><input type='text' name='nomor_punggung[]' placeholder='Nomor Punggung' onkeypress='return hanyaAngka(event)' id='nomor_punggung' class='form-control'><br><button type='button' class='btn-sm btn-fill btn-danger delete-row' onclick='deleteRow(this)'><i class='fa fa-trash'></i></button></tr>";
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

    function updatepm(){

        var nama_tim = document.getElementById('nama_tim').value;
        var logo_tim = document.getElementById('logo_tim').value;
        var tahun_berdiri = document.getElementById('tahun_berdiri').value;
        var alamat = document.getElementById('alamat').value;
        var kota = document.getElementById('kota').value;
        var status = document.getElementById('status').value;

        if(nama_tim == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Nama Tim Tidak Boleh Kosong!", "error");
        
        }else if(logo_tim == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Logo Tim Tidak Boleh Kosong!", "error");
        }else if(tahun_berdiri == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Tahun Berdiri Tidak Boleh Kosong!", "error");
        }else if(alamat == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Alamat Tidak Boleh Kosong!", "error");
        }else if(kota == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Kota Tidak Boleh Kosong!", "error");
        }else if(status == ''){
            event.preventDefault(); 
            swal.fire("Cancelled", "Kesehatan Tim Tidak Boleh Kosong!", "error");
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
                swal.fire("Cancelled", "Tambah Tim dibatalkan!", "error");
            }
            });
        }
    }
        
    //radio box check uncheck
    $(':radio').mousedown(function(e){
        var $self = $(this);
        if( $self.is(':checked') ){
            var uncheck = function(){
            setTimeout(function(){$self.removeAttr('checked');},0);
            };
            var unbind = function(){
            $self.unbind('mouseup',up);
            };
            var up = function(){
            uncheck();
            unbind();
            };
            $self.bind('mouseup',up);
            $self.one('mouseout', unbind);
        }
    });

    //daterange
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

