@extends('templates.index')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<div class="container-fluid">
    <div class="d-flex">


    </div>
    <div id="app">
        <form action="/intervensi/tambah-intervensi" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Intervensi</label>
                            <input type="text" class="form-control" name="intervention_name" id="intervention_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Definisi</label>
                            <input type="text" class="form-control" name="definition" id="definition">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tipe Intervensi</label>
                            <select class="form-control" name="type" id="exampleFormControlSelect1">
                                <option name="type" value="Utama">Utama</option>
                                <option name="type" value="Pendukung">Pendukung</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">

                        <!-- Card Gejala Mayor -->
                        <div class="card border-warning mb-3">
                            <div class="card-header">Observasi</div>
                            <div class="card-body text-dark">
                                <div class="form-group d-flex" v-for="(input,k) in inputObservasi" :key="k">
                                    <input name="observasi[]" type="text" class="form-control" v-model="input.nameObservasi">
                                    <span class="align-self-center d-flex">
                                        <i class="fas mx-1 fa-2x fa-minus-circle text-danger" @click="removeObservasi(k)" v-show="k || ( !k && inputObservasi.length > 1)"></i>
                                        <i class="fas mx-1 fa-2x fa-plus-circle text-success" @click="addObservasi(k)" v-show="k == inputObservasi.length-1"></i>
                                    </span>
                                </div>
                                <!-- <div class="form-group form-baru">
                                    <label for="exampleFormControlInput1">Gejala Mayor</label>
                                    <input type="text" class="form-control" name="major[]" id="major">

                                </div>

                                <div class="new-major"></div>
                                <a class="btn btn-md btn-info tombol-tambah-major" style="color: white;">+ Tambah Major</a> -->
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <!-- Gejala Minor -->
                        <div class="card border-danger mb-3">
                            <div class="card-header">Terapeutik</div>
                            <div class="card-body text-dark">
                                <div class="d-flex form-group" v-for="(input,k) in inputTerapeutik" :key="k">
                                    <input name="terapeutik[]" type="text" class="form-control" v-model="input.nameTerapeutik">
                                    <span class="align-self-center d-flex">

                                        <i class="fas mx-1 fa-2x fa-minus-circle text-danger" @click="removeTerapeutik(k)" v-show="k || ( !k && inputTerapeutik.length > 1)"></i>
                                        <i class="fas mx-1 fa-2x fa-plus-circle text-success" @click="addTerapeutik(k)" v-show="k == inputTerapeutik.length-1"></i>
                                    </span>
                                </div>
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
                    <div class="col-lg-3">

                        <!-- Card Gejala Mayor -->
                        <div class="card border-success mb-3">
                            <div class="card-header">Edukasi</div>
                            <div class="card-body text-dark">
                                <div class="form-group d-flex" v-for="(input,k) in inputEdukasi" :key="k">
                                    <input name="edukasi[]" type="text" class="form-control" v-model="input.nameEdukasi">
                                    <span class="align-self-center d-flex">
                                        <i class="fas mx-1 fa-2x fa-minus-circle text-danger" @click="removeEdukasi(k)" v-show="k || ( !k && inputEdukasi.length > 1)"></i>
                                        <i class="fas mx-1 fa-2x fa-plus-circle text-success" @click="addEdukasi(k)" v-show="k == inputEdukasi.length-1"></i>
                                    </span>
                                </div>
                                <!-- <div class="form-group form-baru">
                                    <label for="exampleFormControlInput1">Gejala Mayor</label>
                                    <input type="text" class="form-control" name="major[]" id="major">

                                </div>

                                <div class="new-major"></div>
                                <a class="btn btn-md btn-info tombol-tambah-major" style="color: white;">+ Tambah Major</a> -->
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <!-- Gejala Minor -->
                        <div class="card border-dark mb-3">
                            <div class="card-header">Kolaborasi</div>
                            <div class="card-body text-dark">
                                <div class="d-flex form-group" v-for="(input,k) in inputKolaborasi" :key="k">
                                    <input name="kolaborasi[]" type="text" class="form-control" v-model="input.nameKolaborasi">
                                    <span class="align-self-center d-flex">

                                        <i class="fas mx-1 fa-2x fa-minus-circle text-danger" @click="removeKolaborasi(k)" v-show="k || ( !k && inputKolaborasi.length > 1)"></i>
                                        <i class="fas mx-1 fa-2x fa-plus-circle text-success" @click="addKolaborasi(k)" v-show="k == inputKolaborasi.length-1"></i>
                                    </span>
                                </div>
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
            inputObservasi: [{
                nameObservasi: ''

            }],
            inputTerapeutik: [{

                nameTerapeutik: ''
            }],
            inputEdukasi: [{

                nameEdukasi: ''
            }],
            inputKolaborasi: [{

                nameKolaborasi: ''
            }],

        },
        methods: {
            addObservasi(index) {
                this.inputObservasi.push({
                    nameObservasi: ''
                });
            },
            removeObservasi(index) {
                this.inputObservasi.splice(index, 1);
            },
            addKolaborasi(index) {
                this.inputKolaborasi.push({
                    nameKolaborasi: ''
                });
            },
            removeKolaborasi(index) {
                this.inputKolaborasi.splice(index, 1);
            },
            addEdukasi(index) {
                this.inputEdukasi.push({
                    nameEdukasi: ''
                });
            },
            removeEdukasi(index) {
                this.inputEdukasi.splice(index, 1);
            },
            addTerapeutik(index) {
                this.inputTerapeutik.push({
                    nameTerapeutik: ''
                });
            },
            removeTerapeutik(index) {
                this.inputTerapeutik.splice(index, 1);
            }
        }
    });
</script>
@endpush

@endsection