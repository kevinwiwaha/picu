@extends('templates.index')

@section('content')
<?php

use Illuminate\Support\Carbon; ?>
<div class="container-fluid">
    <h1>Laporan</h1>
    <div class="row">
        <div class="col-6">

            <div class="card border-dark" style="max-width: auto;">
                <div class="card-header">Identitas Pasien</div>
                <div class="card-body text-dark">
                    <h4 class="text-primary card-title"><span class="text-dark" style="font-size: 1rem;">Nama : <br></span>{{$patient['patient']}}</h4>
                    <h4 class="text-primary card-title"><span class="text-dark" style="font-size: 1rem;">Nomor Rekam Medis : <br></span>{{$patient['medrec_num']}}</h4>
                    <div class="d-flex">
                        <h4 class="text-primary card-title"><span class="text-dark" style="font-size: 1rem;">Keluhan : <br></span>

                        </h4>
                        <ul class=""><?php $com = explode(',', $patient['complaint']); ?>
                            @foreach($com as $c)
                            <li class="my-1">
                                <div style="font-size: 1rem;" class="badge badge-primary">
                                    {{$c}}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="d-flex">
                        <h4 class="text-primary card-title"><span class="text-dark" style="font-size: 1rem;">Diagnosis : <br></span>

                        </h4>
                        <ul>@foreach($patient['diagnosis'] as $d)
                            <li class="my-1">
                                <div style="font-size: 1rem;" class="badge badge-danger">{{$d}}</div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="d-flex">
                        <h4 class="text-primary card-title"><span class="text-dark" style="font-size: 1rem;">Tujuan : <br></span>

                        </h4>
                        <ul><?php $goal = explode(',', $patient['goal']); ?>
                            @foreach($goal as $g)
                            <li class="my-1">
                                <div style="font-size: 1rem;" class="text-dark badge badge-warning">
                                    {{$g}}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>


                </div>
            </div>

        </div>
        <div class="col-6">
            <div class="card border-dark" style="max-width: auto;">

                <div class="card-body text-dark">

                    <div class="d-flex">
                        <h4 class="text-primary card-title"><span class="text-dark" style="font-size: 1rem;">Kriteria Hasil : <br></span>

                        </h4>
                        <ul><?php $criteria = explode(',', $patient['criteria']); ?>
                            @foreach($criteria as $c)
                            <li class="my-1">
                                <div style="font-size: 1rem;" class="badge badge-success">
                                    {{$c}}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-12">
            <div class="card border-dark my-3" style="max-width:auto;">

                <div class="card-body text-dark">
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
                </div>

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

                    <div class="d-flex justify-content-center mb-3 ">
                        <button type="submit" class="btn btn-md btn-success mx-1">Cetak</button>
                        <a href="{{url('/')}}" class="btn btn-md btn-warning mx-1">Halaman Utama</a>
                    </div>
                </form>



            </div>
        </div>
    </div>
    @endsection