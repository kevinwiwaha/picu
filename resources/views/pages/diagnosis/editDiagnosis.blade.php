@extends('templates.index')

@section('content')
<div class="container-fluid">
    <div class="d-flex">


    </div>
    <form action="/diagnosis/edit" method="post">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Diagnosis</label>
                        <input type="text" value="{{$diagnosis->diagnosis_name}}" class="form-control" name="diagnosis_name" id="diagnosis_name">
                        <input type="hidden" value="{{$diagnosis->id}}" class="form-control" name="id" id="diagnosis_name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <!-- Card Gejala Mayor -->
                    <div class="card border-warning mb-3">

                        <div class="card-body text-dark">

                            @foreach($diagnosis->majors as $m)
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Gejala Mayor</label>
                                <input type="text" class="form-control" value="{{$m->name}}" name="major[]" id="major">

                            </div>

                            @endforeach

                            <div class="new-major"></div>
                            <a class="btn btn-md btn-info tombol-tambah-major" style="color: white;">+ Tambah Major</a>

                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <!-- Gejala Minor -->
                    <div class="card border-danger mb-3">

                        <div class="card-body text-dark">

                            @foreach($diagnosis->minors as $m)
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Gejala Minor</label>
                                <input type="text" class="form-control" value="{{$m->name}}" name="minor[]" id="minor">
                            </div>

                            @endforeach
                            <div class="new-minor">
                            </div>
                            <a class="btn btn-md btn-info mx-1 tombol-tambah-minor" style="color: white;">+ Tambah Minor</a>
                        </div>
                    </div>

                </div>

            </div>

            @csrf
            @method('patch')
            <div class="d-flex justify-content-center">
                <button class="btn btn-md btn-success px-5" type="submit">Tambah</button>
            </div>
        </div>
    </form>
</div>
@push('tomboltambah')
<script type="text/javascript">
    $('.form-baru').on('click', function() {
        $(this).parent().remove();
    })

    $('.tombol-tambah-major').on('click', function() {
        var angka = 1
        addMajorForm(angka);
        angka += 1;

    })
    $('.tombol-tambah-minor').on('click', function() {
        addMinorForm();
    })

    function addMajorForm(val) {
        var angka = val;
        var form = `<div class="form-baru form-group"><label for="exampleFormControlInput1">Gejala Mayor</label><input type="text" class="form-control" name="major[]" id="major"><a id="removebtn" class="btn btn-md btn-danger tombol-tambah-major" style="color: white;">+ Tambah Major</a></div>`;
        $('.new-major').append(form);

    };

    function addMinorForm() {
        var form = `<div class="form-group"><label for="exampleFormControlInput1">Gejala Minor</label><input type="text" class="form-control" name="minor[]" id="minor"></div>`;
        $('.new-minor').append(form);
    };
</script>

@endpush

@endsection