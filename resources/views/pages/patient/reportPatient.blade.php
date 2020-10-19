@extends('templates.index')

@section('content')
<?php

use Illuminate\Support\Carbon; ?>
<div class="container-fluid">
    <h1>Laporan</h1>
    <div class="row">

        <div class="col-12">
            <h3><span class="text-danger">Nama : </span>{{$patient['patient']}}</h3>
            <h4><span class="text-danger">Nomor Rekam Medis : </span>{{$patient['medrec_num']}}</h4>
            <div class="d-flex">
                <h5><span class="text-danger">Keluhan : </span>

                </h5>
                <p>
                    <ul><?php $com = explode(',', $patient['complaint']); ?>
                        @foreach($com as $c)
                        <li>{{$c}}</li>
                        @endforeach
                    </ul>
                </p>
            </div>
            <div class="d-flex">
                <h5><span class="text-danger">Diagnosis : </span>

                </h5>
                <p>
                    <ul>@foreach($patient['diagnosis'] as $d)
                        <li>{{$d}}</li>
                        @endforeach
                    </ul>
                </p>
            </div>
            <div class="d-flex">
                <h5><span class="text-danger">Tujuan : </span>

                </h5>
                <p>
                    <ul><?php $goal = explode(',', $patient['goal']); ?>
                        @foreach($goal as $g)
                        <li>{{$g}}</li>
                        @endforeach
                    </ul>
                </p>
            </div>
            <div class="d-flex">
                <h5><span class="text-danger">Kriteria Hasil : </span>

                </h5>
                <p>
                    <ul><?php $criteria = explode(',', $patient['criteria']); ?>
                        @foreach($criteria as $c)
                        <li>{{$c}}</li>
                        @endforeach
                    </ul>
                </p>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Observasi</th>
                        <th scope="col">Terapeutik</th>
                        <th scope="col">Edukasi</th>
                        <th scope="col">Kolaborasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <ul>
                                @foreach($patient['observasi'] as $o)
                                <li>{{$o}}</li>
                                @endforeach</ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($patient['terapeutik'] as $o)
                                <li>{{$o}}</li>
                                @endforeach</ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($patient['edukasi'] as $o)
                                <li>{{$o}}</li>
                                @endforeach</ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($patient['kolaborasi'] as $o)
                                <li>{{$o}}</li>
                                @endforeach</ul>
                        </td>

                    </tr>

                </tbody>
            </table>

            <form action="/pasien/pdf" method="post">
                <input type="hidden" name="patient" value="{{$patient['patient']}}">
                <input type="hidden" name="medrec_num" value="{{$patient['medrec_num']}}">
                <input type="hidden" name="complaint" value="{{$patient['complaint']}}">
                <input type="hidden" name="goal" value="{{$patient['goal']}}">
                <input type="hidden" name="criteria" value="{{$patient['criteria']}}">
                <input type="hidden" name="diagnosis" value="{{implode('|',$patient['diagnosis'])}}">
                <input type="hidden" name="observasi" value="{{implode('|',$patient['observasi'])}}">
                <input type="hidden" name="terapeutik" value="{{implode('|',$patient['terapeutik'])}}">
                <input type="hidden" name="edukasi" value="{{implode('|',$patient['edukasi'])}}">
                <input type="hidden" name="kolaborasi" value="{{implode('|',$patient['kolaborasi'])}}">
                <input type="hidden" name="date" value="<?php Carbon::now(); ?>">
                @csrf

                <button type="submit" class="btn btn-md btn-success">Cetak</button>
            </form>
        </div>
    </div>
</div>
@endsection