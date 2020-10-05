<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon ">
            <i class="fal fa-hand-holding-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PICU</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Fasilitas Kesehatan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <div class="d-flex justify-content-center">
            <a href="{{url('pasien/tambah-pasien')}}" class="btn btn-md btn-danger my-2  w-75">Tambah Pasien</a>
        </div>
        <a class="nav-link active collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-database"></i>

            <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data</h6>
                <a class="collapse-item" href="{{url('diagnosis')}}">Diagnosis</a>
                <a class="collapse-item" href="{{url('intervensi')}}">Intervensi</a>

            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">





    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->