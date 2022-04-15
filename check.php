<?php

if (isset($_POST["iss"]) && $_POST['ass']) {

    $nomesin =  $_POST['iss'];
    $norang =  $_POST['ass'];

    $ch = curl_init();
    $url = 'https://www.cdn.co.id/portalh23/klaim/search_dtl_nomesin.inc.php?nomesin='.rawurlencode($nomesin).'&suffix_norangka='.$norang;
    $headers = array(
        'Authorization: Basic Z3Vlc3Q6cGVybWlzaQ=='
    );

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);

    $data = curl_exec($ch);
    curl_close($ch);
    
    $arr = explode(';', $data);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($arr);

} else {
    die();
}
?>