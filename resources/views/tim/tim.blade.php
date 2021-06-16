@include('header');

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
 
<div class="wrapper">
    <div class="section section-light-blue">
        <div class="container">
            <div id="menu-dropdown">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tim-title">
                            <center><h3>Daftar Tim</h3></center>
                        </div><br>
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Tim</th>
                                    <th>Kota Tim</th>
                                    <th><center>Action</center></th>
                                </tr>
                            </thead>
                            <tbod>
                            @foreach($tim as $key => $tim)
                                <tr>
                                    <td>{{$key+1}}.</td>
                                    <td>{{$tim->nama_tim}}</td>
                                    <td>{{$tim->kota}}</td>
                                    <td>
                                        <center>
                                            <a href="/detail/{{$tim->id}}" class="btn btn-fill btn-black"><i class="fa fa-eye"></i>Detail</a>
                                            <a href="/edittim/{{$tim->id}}" class="btn btn-fill btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="/deletetim/{{$tim->id}}" class="btn btn-fill btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                            </tbod>
                        </table>
                        <a href="/timcreate" class="btn btn-fill btn-neutral"><i class="fa fa-plus-circle"></i> Tambah Tim</a>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
@include('js')


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
