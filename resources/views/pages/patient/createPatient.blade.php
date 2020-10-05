@extends('templates.index')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">
    <form action="{{url('/pasien/input-pasien')}}" method="get">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Pasien</label>
                    <input name="patient_name" value="{{old('patient_name')}}" type="text" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nomor Rekam Medis</label>
                    <input name="medicalrecord_number" value="{{old('medicalrecord_number')}}" type="text" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Keluhan</label>
                    <input name="complaint" type="text" value="{{old('complaint')}}" class="form-control" id="exampleFormControlInput1">
                </div>


            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-10">
                <table class="table table-striped">
                    <thead>
                        <tr class="bg-danger text-light">
                            <th scope="col">No</th>
                            <th scope="col">Diagnosis</th>
                            <!-- <th scope="col">Tujuan</th>
                        <th scope="col">Kriteria Hasil</th> -->
                            <th scope="col">Gejala Mayor</th>
                            <th scope="col">Gejala Minor</th>
                            <th scope="col">Pilih</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diagnosis as $d)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$d->diagnosis_name}}</td>
                            <!-- <td>{{$d->goal}}</td>
                        <td>
                            <ul>
                                <?php $criteria = explode(',', $d->criteria); ?>
                                @foreach($criteria as $c)
                                <li>
                                    {{$c}}
                                </li>

                                @endforeach
                            </ul>
                        </td> -->
                            <td>
                                <ul>
                                    @foreach($d->majors as $m)
                                    <li>{{$m->name}}</li>

                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @foreach($d->minors as $m)
                                    <li>{{$m->name}}</li>

                                    @endforeach
                                </ul>
                            </td>
                            <td class="">
                                <div class="form-control-lg form-check">
                                  
                                    <input name="diagnosis[]" class="form-check-input" type="checkbox" value="{{$d->id}}" id="defaultCheck1">

                                </div>
                            </td>


                        </tr>

                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
        @csrf
        
        <button type="submit">OKL</button>
    </form>
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