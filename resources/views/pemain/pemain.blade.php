@include('header');

<div class="wrapper">
    <div class="section section-light-blue">
        <div class="container">
            <div id="menu-dropdown">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tim-title">
                            <center><h3>Daftar Pemain</h3></center>
                        </div><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pemain</th>
                                    <th>Tinggi Badan</th>
                                    <th>Berat Badan</th>
                                    <th>Posisi Pemain</th>
                                    <th>Nomor Punggung</th>
                                    <th>Tim Asal</th>
                                </tr>
                            </thead>
                            <tbod>
                            @foreach($pemain as $key => $tim)
                                <tr>
                                    <td>{{$key+1}}.</td>
                                    <td>{{$tim->nama_pemain}}</td>
                                    <td>{{$tim->tinggi_badan}}</td>
                                    <td>{{$tim->berat_badan}}</td>
                                    <td>{{$tim->posisi_pemain}}</td>
                                    <td>{{$tim->nomor_punggung}}</td>
                                    <td>{{$tim->nama_tim}}</td>
                                </tr>
                            @endforeach
                            </tbod>
                        </table>
                        <a href="/pemaincreate" class="btn btn-fill btn-neutral"><i class="fa fa-plus-circle"></i> Tambah Pemain</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
@include('js')
