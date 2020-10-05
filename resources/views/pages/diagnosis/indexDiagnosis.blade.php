@extends('templates.index')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <h1>Bank Diagnosis</h1>
        <a href="{{url('diagnosis/tambah-diagnosis')}}" class="btn btn-md btn-primary align-self-center"><i class="fas fa-plus"></i> Tambah Diagnosis</a>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Diagnosis</th>
                        <th scope="col">Gejala Mayor</th>
                        <th scope="col">Gejala Minor</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($diagnosis as $d)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$d->diagnosis_name}}</td>
                        <td>
                            <ul>
                                @foreach($d->majors as $ma)
                                <li>
                                    {{$ma->name}}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($d->minors as $ma)
                                <li>
                                    {{$ma->name}}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <div class="d-flex">
                                <form action="{{url('diagnosis/hapus')}}" method="POST">
                                    <input type="hidden" name="id" value="{{$d->id}}">
                                    <button type="submit" class="btn mx-1 btn-md btn-danger">Hapus</button>
                                    @csrf
                                    @method('delete')
                                </form>
                                <!-- Update Blm jadi -->
                                <!-- <a href="{{url('diagnosis/edit',$d->id)}}" class="btn btn-md btn-warning mx-2">Ubah</a> -->
                                <a href="{{url('diagnosis',$d->id)}}" class="btn btn-md btn-primary">Info</a>
                            </div>
                        </td>
                    </tr>


                    @empty
                    <h3>Kosong</h3>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@push('datatable')
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
</script>

@endpush


@endsection