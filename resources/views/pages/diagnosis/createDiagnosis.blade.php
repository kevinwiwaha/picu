@extends('templates.index')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<div class="container-fluid">


    <div class="d-flex">




    </div>
    <div id="app">
        <form action="/diagnosis/tambah-diagnosis" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Diagnosis</label>
                            <input type="text" class=" form-control" name="diagnosis_name" value="{{ old('diagnosis_name') }}" id=" diagnosis_name">
                            @error('diagnosis_name')
                            <div class="text-danger">Nama diagnosis belum di isi</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tujuan</label>
                            <input value="{{old('goal')}}" type="text" class="form-control" name="goal" id="goal">
                            @error('goal')
                            <div class="text-danger">Tujuan belum di isi</div>
                            @enderror
                        </div>
                        <div class="form-group" v-for="(input,k) in inputCriteria" :key="k">
                            <label for="">Kriteria hasil</label>
                            <div class="d-flex">
                                <input id="criteria" name="criteria[]" type="text" class=" form-control" v-model="input.nameCriteria">

                                <span class="align-self-center d-flex">

                                    <i class="fas mx-1 fa-2x fa-minus-circle text-danger" @click="removeCriteria(k)" v-show="k || ( !k && inputCriteria.length > 1)"></i>
                                    <i class="fas mx-1 fa-2x fa-plus-circle text-success" @click="addCriteria(k)" v-show="k == inputCriteria.length-1"></i>
                                </span>
                            </div>
                            @error('criteria.*')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <!-- Card Gejala Mayor -->
                        <div class="card border-warning mb-3">
                            <div class="card-header">Gejala Mayor</div>
                            <div class="card-body text-dark">
                                <div class="form-group d-flex" v-for="(input,k) in inputMajor" :key="k">
                                    <input name="major[]" type="text" class="form-control" v-model="input.nameMajor">
                                    <span class="align-self-center d-flex">
                                        <i class="fas mx-1 fa-2x fa-minus-circle text-danger" @click="removeMajor(k)" v-show="k || ( !k && inputMajor.length > 1)"></i>
                                        <i class="fas mx-1 fa-2x fa-plus-circle text-success" @click="addMajor(k)" v-show="k == inputMajor.length-1"></i>
                                    </span>

                                </div>
                                @error('major.*')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <!-- @error('major[0]')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror -->
                                <!-- <div class="form-group form-baru">
                                    <label for="exampleFormControlInput1">Gejala Mayor</label>
                                    <input type="text" class="form-control" name="major[]" id="major">

                                </div>

                                <div class="new-major"></div>
                                <a class="btn btn-md btn-info tombol-tambah-major" style="color: white;">+ Tambah Major</a> -->
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <!-- Gejala Minor -->
                        <div class="card border-danger mb-3">
                            <div class="card-header">Gejala Minor</div>
                            <div class="card-body text-dark">
                                <div class="d-flex form-group" v-for="(input,k) in inputMinor" :key="k">
                                    <input name="minor[]" type="text" class="form-control" v-model="input.nameMinor">
                                    <span class="align-self-center d-flex">

                                        <i class="fas mx-1 fa-2x fa-minus-circle text-danger" @click="removeMinor(k)" v-show="k || ( !k && inputMinor.length > 1)"></i>
                                        <i class="fas mx-1 fa-2x fa-plus-circle text-success" @click="addMinor(k)" v-show="k == inputMinor.length-1"></i>
                                    </span>
                                </div>
                                @error('minor.*')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <!-- @error('minor[0]')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror -->
                                <!-- <div class="form-group">
                                    <label for="exampleFormControlInput1">Gejala Minor</label>
                                    <input type="text" class="form-control" name="minor[]" id="minor">
                                </div>
                                <div class="new-minor">
                                </div>
                                <a class="btn btn-md btn-info mx-1 tombol-tambah-minor" style="color: white;">+ Tambah Minor</a>
                                <a class="btn btn-md btn-danger mx-1 hapuss" style="color: white;">+ Tambah Minor</a> -->

                            </div>
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr class="bg-danger text-light">
                                    <th scope="col">No</th>
                                    <th scope="col">Intervensi</th>
                                    <th scope="col">Pilih</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($intervention as $i)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$i->intervention_name}}</td>
                                    <td>
                                        <div class="form-check">
                                            <input name="intervention[]" class="form-check-input" type="checkbox" value="{{$i->id}}" id="defaultCheck1">

                                        </div>
                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>
                        @error('intervention')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @csrf
                @method('put')
                <div class="d-flex justify-content-center">

                    <button class="btn btn-md btn-success px-5" type="submit">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
@push('tomboltambah')
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
</script>

<!-- <script type="text/javascript">
    var asik = []
    this.a = 0
    this.b = 0
    $('.hapuss').on('click', function() {

        var num = asik.length
        var el = document.getElementById(num - 1)
        el.remove();
        asik.pop();
        this.a--;
        console.log(this.a);


    })
    $('.tombol-tambah-major').on('click', function() {

        addMajorForm();


    })
    $('.tombol-tambah-minor').on('click', function() {

        if (this.a == null) {


            addMinorForm(a);
            this.a = this.a + 1;
            console.log('ase``')
            asik.push(asik)
        }
        addMinorForm(this.a)
        this.a++
        console.log('ses')
        asik.push(asik)




    })

    function addMajorForm() {

        var form = `<div class="form-group form-baru"><label for="exampleFormControlInput1">Gejala Mayor</label><input type="text" class="form-control" name="major[]" id="major"> <a class="hapus btn btn-md btn-danger mx-1 " style="color: white;">+ Tambah Minor</a></div>`;
        $('.new-major').append(form);

    };

    function addMinorForm(a) {

        var form = `<div id=${a} class="form-group"><label for="exampleFormControlInput1">Gejala Minor</label><input type="text" class="form-control" name="minor[]" id="minor"><a class="hapus btn btn-md btn-danger mx-1 " style="color: white;"></div>`;
        $('.new-minor').append(form);

    };
</script> -->
<script type="text/javascript">
    var app = new Vue({
        el: "#app",
        data: {
            inputMajor: [{
                nameMajor: ''

            }],
            inputMinor: [{

                nameMinor: ''
            }],
            inputIntervention: [{

                nameIntervention: ''
            }],
            inputCriteria: [{

                nameCriteria: ''
            }]
        },
        methods: {
            addMajor(index) {
                this.inputMajor.push({
                    nameMajor: ''
                });
            },
            removeMajor(index) {
                this.inputMajor.splice(index, 1);
            },
            addCriteria(index) {
                this.inputCriteria.push({
                    nameCriteria: ''
                });
            },
            removeCriteria(index) {
                this.inputCriteria.splice(index, 1);
            },
            addIntervention(index) {
                this.inputIntervention.push({
                    nameIntervention: ''
                });
            },
            removeIntervention(index) {
                this.inputIntervention.splice(index, 1);
            },
            addMinor(index) {
                this.inputMinor.push({
                    nameMinor: ''
                });
            },
            removeMinor(index) {
                this.inputMinor.splice(index, 1);
            }
        }
    });
</script>
@endpush

@endsection