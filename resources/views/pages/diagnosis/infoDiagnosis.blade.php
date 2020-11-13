@extends('templates.index')

@section('content')
<div class="container-fluid">
    <table class="table table-striped">
        <thead>
            <tr>

                <th style="width: 200px;" class="bg-primary text-light" scope="col"></th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
            <tr>

                <td class="bg-primary text-light">Nama Diagnosis</td>
                <td>{{$diagnosis->diagnosis_name}}</td>

            </tr>
            <tr>

                <td class="bg-primary text-light">Tujuan</td>
                <td>{{$diagnosis->goal}}</td>

            </tr>
            <tr>

                <td class="bg-primary text-light">Kriteria Hasil</td>
                <td>
                    <ul>
                        <?php $criteria = explode("|", $diagnosis->criteria); ?>
                        @foreach($criteria as $c)
                        <li>{{$c}}</li>

                        @endforeach
                    </ul>
                </td>

            </tr>
            <tr>

                <td class="bg-primary text-light">Gejala Mayor</td>
                <td>
                    <ul class="list-group">
                        @foreach($diagnosis->majors as $m)
                        <li class="list-group-item">{{$m->name}}


                        </li>
                        @endforeach
                    </ul>
                </td>

            </tr>
            <tr>

                <td class="bg-primary text-light">Gejala Minor</td>
                <td>
                    <ul class="list-group">
                        @foreach($diagnosis->minors as $m)
                        <li class="list-group-item">{{$m->name}}</li>
                        @endforeach
                    </ul>
                </td>

            </tr>
            <tr>

                <td class="bg-primary text-light">Intervensi</td>
                <td>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-group">
                                @forelse($diagnosis->interventions as $i)
                                <li class="list-group-item list-group-item-action">{{$i->intervention_name}}@if($i->type == "Utama")
                                    <div class="badge badge-success float-right">UTAMA</div>
                                    @elseif($i->type == "Pendukung")
                                    <div class="badge badge-warning float-right">PENDUKUNG</div>
                                    @endif</li>
                                @empty
                                <div class="d-flex align-self-center badge badge-lg badge-danger">BELUM ADA INTERVENSI</div>

                                @endforelse
                            </ul>
                        </div>
                    </div>
                </td>

            </tr>


        </tbody>
    </table>
</div>
@endsection