


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="description" content="Check Database Konsumen Dealer, di bawah management CDN-ACEH">
        <meta name="keywords" content="Dealer, Cek Motor, Database">
        <meta name="author" content="Ryan Syah">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Cek Motor DB Dealer</title>
    </head>
    <body>
        <div class="col-xl-4 my-auto mx-auto">
            <center>
                <img src="Honda_Logo.svg" width="100px"alt="Logo Honda" class="image py-2">
            </center>
            <div class="container bg-danger py-3">
                <h3>Cek DB Konsumen Honda</h3>
                <form id="form" method="post">
                    <div class="form-group">
                      <label class="text-white">Nomor Mesin</label>
                      <input type="text" class="form-control" style="text-transform: uppercase" name="iss" id="iss" aria-describedby="helpId" placeholder="JMXXX ZZZZZZ" maxlength="13" required>
                    </div>
                    <div class="form-group">
                      <label class="text-white">Nomor Rangka</label>
                      <input type="text" class="form-control" style="text-transform: uppercase" name="ass" id="ass" aria-describedby="helpId" placeholder="1 Digit Terakhir dari Nomor Rangka" maxlength="10" required>
                    </div>
                    <button type="button" id="btnSubmit" onclick="sendcheck()" class="btn btn-primary">Check</button>
                </form>
            </div>
        </div>

        <div class="modal fade" id="modalRes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 align="center">Hasil Pencarian</h3>
                        <br>
                        <table class="table" width="100%">
                            <tr>
                                <td>No Mesin</td>
                                <td id="res_nosin"></td>
                            </tr>
                            <tr>
                                <td>No Rangka</td>
                                <td id="res_norang"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td id="res_nama"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td id="res_alamat"></td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td id="res_notel"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Invoice</td>
                                <td id="res_tanggal"></td>
                            </tr>
                            <tr>
                                <td>Kode Intern</td>
                                <td id="res_kode"></td>
                            </tr>
                            <tr>
                                <td>Merek Motor</td>
                                <td id="res_merek"></td>
                            </tr>
                            <tr>
                                <td>PLAT Nomor</td>
                                <td id="res_plat"></td>
                            </tr>
                            <tr>
                                <td>Sumber Dealer</td>
                                <td id="res_sumber"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script>
            function sendcheck()
            {
                var nosin = $('#iss').val();
                $.ajax({
                    method: "POST",
                    url: "check.php",
                    data: $('#form').serialize()
                }).done(function(X) {
                    $('#modalRes').modal('show');
                    $('#res_nosin').html(nosin);
                    $('#res_norang').html('MH1'+X[0]);
                    $('#res_kode').html(X[1]);
                    $('#res_nama').html(X[2]);
                    $('#res_alamat').html(X[3]);
                    $('#res_notel').html(X[4]);
                    $('#res_tanggal').html(X[5]);
                    $('#res_sumber').html(kodedealer(X[6]));
                    $('#res_merek').html(X[7]);
                    $('#res_plat').html(X[8]);
                });
            }

            function kodedealer(kode)
            {
                result = '';
                switch(kode){
                    case 'AAKTT' : result = 'ADI KARYA UTAMA';
                    break;
                    case 'AAPMB' : result = 'AIGA MOTOR';
                    break;
                    case 'AAPSS' : result = 'AGUNG PRIMA MOTOR';
                    break;
                    case 'ABAHH' : result = 'HAMPARAN MOTOR TKU';
                    break;
                    case 'ABPPL' : result = 'BINA PUTRA SANJAYA';
                    break;
                    case 'ACJAL' : result = 'CAHAYA JAYA ABADI';
                    break;
                    case 'AEPBR' : result = 'EXPO';
                    break;
                    case 'AHHCD' : result = 'HAMPARAN MOTOR CND';
                    break;
                    case 'AHM88' : result = 'HONDA MOTOR 88';
                    break;
                    case 'AJJKF' : result = 'JJ ONE MOTOR';
                    break;
                    case 'AKMSK' : result = 'KPM RMO';
                    break;
                    case 'AKUTT' : result = 'ADI KARYA SAUDARA';
                    break;
                    case 'ALJLB' : result = 'LAMBARONA SAKTI';
                    break;
                    case 'AMAAR' : result = 'MAAR MOTOR';
                    break;
                    case 'AMJKS' : result = 'MAJU JAYA PRIMA';
                    break;
                    case 'AMNAB' : result = 'MEUTIA NATASA';
                    break;
                    case 'ANASS' : result = 'NUSANTARA SURYA SAKTI BANDA ACEH';
                    break;
                    case 'APABP' : result = 'PAYUNG AGUNG';
                    break;
                    case 'APNTB' : result = 'PRIMA NUSANTARA';
                    break;
                    case 'ARMBR' : result = 'RAHMAT MOTOR';
                    break;
                    case 'ARMLH' : result = 'RESTU MOTOR';
                    break;
                    case 'ASHBA' : result = 'SABENA HONDA';
                    break;
                    case 'ASJUG' : result = 'SRIJAYA MOTOR';
                    break;
                    case 'ASMCL' : result = 'SULTAN MOTOR';
                    break;
                    case 'ASRLH' : result = 'ASRA MOTOR';
                    break;
                    case 'ATBAT' : result = 'TUALANG BARU';
                    break;
                    case 'ATMBR' : result = 'TIGER MOTOR';
                    break;
                    case 'AWASB' : result = 'WIRA SUKSES MOTOR';
                    break;
                    case 'B3Z' : result = 'CDN - ACEH';
                    break;
                    case 'BABNA' : result = 'CDN TPP';
                    break;
                    case 'BABNN' : result = 'CDN BNN';
                    break;
                    case 'BAKPM' : result = 'KPM SBG';
                    break;
                    case 'BAKTC' : result = 'CDN KTC';
                    break;
                    case 'BALGS' : result = 'CDN LGS';
                    break;
                    case 'BALSM' : result = 'CDN LSM';
                    break;
                    case 'BAMBO' : result = 'CDN MBO';
                    break;
                    case 'BAMHM' : result = 'MITRA HONDA MOTOR';
                    break;
                    case 'BASGL' : result = 'CDN SGL';
                    break;
                    case 'BASPP' : result = 'CDN SIMPANG PEUT';
                    break;
                    case 'BATDB' : result = 'CDN TDB';
                    break;
                    case 'BATKG' : result = 'CDN TKN';
                    break;
                    case 'CDABI' : result = 'CDN - ALUE BILIE';
                    break;
                    case 'CHMLS' : result = 'CAMPION HONDA MOTOR';
                    break;
                    case 'CRBIR' : result = 'CIPTA REZEKI BERSAMA';
                    break;
                    case 'CRBKB' : result = 'CIPTA REZEKI BERSAMA - KUTA BINJAI';
                    break;
                    case 'CRBPR' : result = 'CIPTA REZEKI BERSAMA - PEUREULAK';
                    break;
                    case 'CVBHM' : result = 'BERJAYA HONDA MOTOR';
                    break;
                    case 'D2Z' : result = 'RIAU DARATAN';
                    break;
                    case 'EHMBR' : result = 'EXPO HONDA MOTOR';
                    break;
                    case 'EXBIR' : result = 'EXPO BIREUEN';
                    break;
                    case 'EXPBR' : result = 'EXPO HONDA MOTOR';
                    break;
                    case 'GCJTG' : result = 'GADENG CITRA JAYA';
                    break;
                    case 'HBMBM' : result = 'HONDA BENER MERIAH';
                    break;
                    case 'HGMGD' : result = 'HONDA GEMILANG MOTOR';
                    break;
                    case 'HOMDN' : result = 'HO MEDAN';
                    break;
                    case 'HOPJY' : result = 'HONDA PRIMA JAYA';
                    break;
                    case 'HOVLN' : result = 'VALEN MOTOR';
                    break;
                    case 'ITDEPT' : result = 'IT DEPT';
                    break;
                    case 'MBKPM' : result = 'KPM MBO';
                    break;
                    case 'NSSGG' : result = 'NUSANTARA SURYA SAKTI GRONG-GRONG';
                    break;
                    case 'PABPD' : result = 'CV. PAYUNG AGUNG MOTOR';
                    break;
                    case 'PERSONAL' : result = 'PENJUALAN KARYAWAN';
                    break;
                    case 'PNKGK' : result = 'PRIMA NUSANTARA';
                    break;
                    case 'PPMBK' : result = 'PENARA MOTOR';
                    break;
                    case 'SBMTR' : result = 'SABANG MOTOR';
                    break;
                    case 'SHKPM' : result = 'KPM SUSOH';
                    break;
                    case 'SOBKJ' : result = 'POS CDN BLANGKEJEREN';
                    break;
                    case 'SOJNB' : result = 'POS CDN JEUNIEB';
                    break;
                    case 'SOSML' : result = 'POS CDN SIMEULUE';
                    break;
                    case 'UKRNG' : result = 'ULEE KARENG RAYA MOTOR';
                    break;
                }
                return result;
            }
        </script>
    </body>
</html>