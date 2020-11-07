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
                                    <td>-</td>

                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<div class="container">
    <div class="row">
        <div class="col">

        </div>
    </div>
</div>




@endsection
@push('datatable')
<script>
    $(document).ready(function() {

        $('.table').DataTable({


        });

    });
</script>


@endpush