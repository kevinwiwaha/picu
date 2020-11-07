@extends('templates.index')

@section('content')
<div class="container-fluid">
    <div class="d-flex row justify-content-between">
        <h1>Intervensi</h1>
        <a href="{{url('/intervensi/tambah-intervensi')}}" class="align-self-center btn btn-md btn-primary">Tambah Intervensi</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis</th>
                <th scope="col">Observasi</th>
                <th scope="col">Terapeutik</th>
                <th scope="col">Edukasi</th>
                <th scope="col">Kolaborasi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inter as $i)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$i->intervention_name}}</td>
                <td>{{$i->type}}</td>
                <td><?php $i->obs = explode("|", $i->observasi); ?><ul>
                        @foreach($i->obs as $o)
                        <li>{{$o}}</li>
                        @endforeach
                    </ul>
                </td>
                <td><?php $i->ter = explode("|", $i->terapeutik); ?><ul>
                        @foreach($i->ter as $t)
                        <li>{{$t}}</li>
                        @endforeach
                    </ul>
                </td>
                <td><?php $i->edu = explode("|", $i->edukasi); ?><ul>
                        @foreach($i->edu as $e)
                        <li>{{$e}}</li>
                        @endforeach
                    </ul>
                </td>
                <td><?php $i->kol = explode("|", $i->kolaborasi); ?><ul>
                        @foreach($i->kol as $k)
                        <li>{{$k}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <!-- Trigger -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Hapus
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5>Anda yakin ingin menghapus {{$i->intervention_name}} ?</h5>
                                    <form action="{{url('intervensi/hapus-intervensi')}}" method="POST">
                                        <input type="hidden" name="delete" value="{{$i->id}}">

                                        @csrf
                                        @method('delete')

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button class="btn btn-md btn-danger" type="submit">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>


            </tr>


            @empty


            @endforelse

        </tbody>
    </table>
</div>
@push('datatable')
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
</script>

@endpush


@endsection