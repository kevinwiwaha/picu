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
    <form action="{{url('pasien/generate')}}" method="post">

        <div class="row">
            <div class="col-2">
                <div class="d-flex align-items-center justify-content-between">
                    <h5>Nama Pasien : </h5>
                    <h3 class="mx-2 text-danger"> {{$data->patient_name}}</h3>
                </div>
                <div class="d-flex align-items-center">
                    <h5>Nama RM : </h5>
                    <h3 class="mx-2 text-danger"> {{$data->medicalrecord_number}}</h3>
                </div>

            </div>
            <div class="col-6">
                <table class="table table-striped">
                    <thead class="text-light bg-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Diagnosis</th>
                            <th scope="col">Intervensi</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($diagnosis as $d)
                        <tr>
                            <input name="diagnosis[]" type="hidden" value="{{$d->diagnosis_name}}" id="medicalrecord_number">
                            <input name="goal[]" type="hidden" value="{{$d->goal}}" id="medicalrecord_number">
                            <input name="criteria[]" type="hidden" value="{{$d->criteria}}" id="medicalrecord_number">

                            <th scope="row">1</th>
                            <td>{{$d->diagnosis_name}}</td>
                            <td class="d-flex">
                                @foreach($d->interventions as $i)
                                <div class="dropdown">

                                    <button class="btn btn-warning mx-1 text-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        {{$i->intervention_name}}
                                    </button>
                                    <div class="dropdown-menu overflow-auto px-3" style="height: 400px;" aria-labelledby="dropdownMenuButton">
                                        <h5 class="text-primary">Observasi</h5>
                                        <?php $observasi = explode('|', $i->observasi);
                                        $ter = explode('|', $i->terapeutik);
                                        $ed = explode('|', $i->edukasi);
                                        $kol = explode('|', $i->kolaborasi);
                                        ?>
                                        @foreach($observasi as $o)
                                        <div class="form-check">
                                            <input name="patient_name" type="hidden" value="{{$data->patient_name}}" id="patient_name">
                                            <input name="medicalrecord_number" type="hidden" value="{{$data->medicalrecord_number}}" id="medicalrecord_number">
                                            <input name="complaint" type="hidden" value="{{$data->complaint}}" id="medicalrecord_number">





                                            <input name="observasi[]" class="form-check-input" type="checkbox" value="{{$o}}" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                {{$o}}
                                            </label>
                                        </div>
                                        @endforeach
                                        <h5 class="text-primary">Terapeutik</h5>
                                        @foreach($ter as $t)
                                        <div class="form-check">
                                            <input name="terapeutik[]" value="{{$t}}" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                {{$t}}
                                            </label>
                                        </div>
                                        @endforeach
                                        <h5 class="text-primary">Edukasi</h5>
                                        @foreach($ed as $e)
                                        <div class="form-check">
                                            <input name="edukasi[]" value="{{$e}}" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                {{$e}}
                                            </label>
                                        </div>
                                        @endforeach
                                        <h5 class="text-primary">Kolaborasi</h5>
                                        @foreach($kol as $k)
                                        <div class="form-check">
                                            <input name="kolaborasi[]" value="{{$k}}" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                {{$k}}
                                            </label>
                                        </div>
                                        @endforeach

                                    </div>

                                </div>
                                @endforeach
                            </td>
                            <td>@mdo</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @csrf
        <button type="submit">OKE</button>
    </form>

</div>
@endsection