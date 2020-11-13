@extends('templates.index')

@section('content')

<div class="bg-gradient-primary" style="width: 100; height:200px; background-color:orange">
    <div class=" container-fluid mb-4">
        <div class="d-flex justify-content-between">
            <h1 style="font-size: 2.2rem;" class="h3 pt-5 text-light"><i class="fal fa-monitor-heart-rate mr-2"></i>Dashboard</h1>
            <div href="#" class="px-3 text-dark align-self-center d-none d-sm-inline-block btn btn-md bg-light shadow-sm"><i class="text-primary far mr-2 fa-calendar-alt"></i>{{$date}}</div>
        </div>
        <p class="text-light" style="opacity: 0.8;">Selamat datang <span style="text-transform: capitalize;">{{Auth::user()->name}}</span> berikut dashboard dari APIK</p>
    </div>
</div>
<div style="margin-top: -5vh;" class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pasien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$patient->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table " id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach($patient as $p)
                                <tr>
                                    <td>{{$p->patient}}</td>
                                    <td>{{$p->created_at}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{url('/pasien/detail', $p->id)}}" class="mr-1 btn btn-md btn-warning">Detail</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                Hapus
                                            </button>

                                        </div>
                                    </td>

                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin mau menghapus {{$p->patient}}</p>
                    <form action="{{url('/pasien/hapus',$p->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="patient" value="{{$p->id}}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                    <button type="submit" class=" btn btn-md btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>





@endsection
@push('datatable')
<script>
    $(document).ready(function() {

        $('.table').DataTable({
            order: [
                [1, 'desc']
            ]

        });

    });
</script>


@endpush