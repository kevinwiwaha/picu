<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice</title>

    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{url('css/bootstrap3.css')}}">
    <style>

    </style>
    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>

<body class="login-page" style="background: white">

    <div>
        <div class="row">
            <div class="col-xs-7">

                <strong>Nama Pasien : {{$patient}}</strong><br>
                Alamat : {{$medrec_num}}<br>

                Keluhan : <ul> <?php $comp = explode(',', $complaint); ?> @foreach($comp as $c) <li>{{$c}}</li>

                    @endforeach
                </ul>

                <br>
            </div>

            <div class="col-xs-5">
                <img style="margin-left:-400px;margin-top:-60px;transform:scale(0.3)" src="https://rsudrsoetomo.jatimprov.go.id/wp-content/uploads/2019/03/logo.png" alt="logo">
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>
        <div class="row">
            <div class="col-xs-5">
                <strong>Diagnosis :</strong>
                <ul>
                    <?php $diag = explode('|', $diagnosis); ?>
                    @foreach($diag as $d)
                    <li>{{$d}}</li>

                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-5">
                <strong>Tujuan :</strong>
                <ul>
                    <?php $go = explode('|', $goal); ?>
                    @foreach($go as $g)
                    <li>{{$g}}</li>

                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-5">
                <strong>Kriteria Hasil :</strong>
                <ul>
                    <?php $cr = explode('|', $criteria); ?>
                    @foreach($cr as $c)
                    <li>{{$c}}</li>

                    @endforeach
                </ul>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-xs-6">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <th>Diagnosis : </th>
                            <td class="text-left">
                                <ul>
                                    <?php $diag = explode('|', $diagnosis); ?>
                                    @foreach($diag as $d)
                                    <li>{{$d}}</li>

                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr style="margin-top: 100px;">
                            <th><strong>Tujuan</strong></th>
                            <td style="margin-top: 100px;" class="text-left">

                                <ul>
                                    <?php $go = explode('|', $goal); ?>
                                    @foreach($go as $g)
                                    <li>{{$g}}</li>

                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr style="margin-bottom: 20px;">
                            <th>Kriteria Hasil : </th>
                            <td class="text-left">
                                <ul>
                                    <?php $cr = explode(',', $criteria); ?>
                                    @foreach($cr as $c)
                                    <li>{{$c}}</li>

                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-xs-5">


                <div style="margin-bottom: 0px">&nbsp;</div>

                <table style="width: 100%; margin-bottom: 20px">
                    <tbody>
                        <tr class="well" style="padding: 5px">
                            <th style="padding: 5px">
                                <div></div>
                            </th>
                            <td style="padding: 5px" class="text-right"><strong> </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->

        <table class="table">
            <thead style="background: #F5F5F5;">
                <tr>
                    <th>Intervensi</th>
                    <th></th>
                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div><strong>Observasi</strong></div>
                        <ul>
                            <?php $obs = explode('|', $observasi); ?>
                            @foreach($obs as $o)
                            <li>{{$o}}</li>

                            @endforeach
                        </ul>
                    </td>
                    <td></td>

                </tr>
                <tr>
                    <td>
                        <div><strong>Terapeutik</strong></div>
                        <ul>
                            <?php $ter = explode('|', $terapeutik); ?>
                            @foreach($ter as $t)
                            <li>{{$t}}</li>

                            @endforeach
                        </ul>
                    </td>
                    <td></td>

                </tr>
                <tr>
                    <td>
                        <div><strong>Edukasi</strong></div>
                        <ul>
                            <?php $ed = explode('|', $edukasi); ?>
                            @foreach($ed as $e)
                            <li>{{$e}}</li>

                            @endforeach
                        </ul>
                    </td>
                    <td></td>

                </tr>
                <tr>
                    <td>
                        <div><strong>Terapeutik</strong></div>
                        <ul>
                            <?php $ter = explode('|', $terapeutik); ?>
                            @foreach($ter as $t)
                            <li>{{$t}}</li>

                            @endforeach
                        </ul>
                    </td>
                    <td></td>

                </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-xs-6"></div>
            <div class="col-xs-5">

            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-8 invbody-terms">
                <br>
                <br>
                <h4>Hasil rekap {{$date}}</h4>
                <p>Berikut laporan hasil dari keluhan pasien</p>
            </div>
        </div>
    </div>
    </div>
</body>

</html>