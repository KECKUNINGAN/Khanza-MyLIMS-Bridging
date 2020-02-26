<?php

include_once('config.php');

$post = array('method'=>'getCekup','nolab'=>$_GET['get']); // Array of data with a trigger
$request = jwt_request($token,$post); // Send or retrieve data
$arr = json_encode($request);
$arr = json_decode($arr, true);

foreach($arr['data']['detil'] as $key => $value) {
    if(trim($value['kode']) == '4300') {
        $value['kode'] = '5';
        $value['ket'] = 'H';
    }
    $data_array[] = array( 
            'nmdisplay' => trim($value['pemeriksaan']),
            'hasil' => trim($value['hasil']),
            'nn' => trim($value['rujukan']),
            'satuan' => trim($value['satuan']),
            'keterangan' => trim($value['ket']),
            'tindakan_id' => trim($value['kode'])
    );
}
$response = array(
        'id_kunjungan' => $_GET['get'],
        'tpas' => (
            $data_array
        )
);

echo json_encode($response);

?>
