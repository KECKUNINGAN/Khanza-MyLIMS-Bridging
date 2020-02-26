<?php

include_once('config.php');

$data = json_decode(file_get_contents('php://input'), true);
foreach($data['test'] as $key => $value) {
    $data_array[] = $value['test_id']; 
}

$data['demografi']['umur'] = '12';
$data['demografi']['u_satuan'] = 'Tahun';
$data['demografi']['u_lengkap'] = '12 Tahun';

//$tgl_lahir = $data['demografi']['tgl_lahir'];
//$tanggal = new DateTime($tgl_lahir);
//$today = new DateTime('today');
//$y = $today->diff($tanggal)->y;
//$m = $today->diff($tanggal)->m;
//$d = $today->diff($tanggal)->d;
//$u_lengkap = "'.$y.' tahun '.$m.' bulan '.$d.' hari";

$post = array(
    'method' => 'addCekup', 
    'pasien' => array(
        'recmed' => $data['demografi']['no_rkm_medis'],
        'nama' => $data['demografi']['nm_pasien'],
        'sex' => $data['demografi']['jk'],
        'tgl_lahir' => $data['demografi']['tgl_lahir'], 
        'umur' => $data['demografi']['umur'], 
        'u_satuan' => $data['demografi']['u_satuan'], 
        'u_lengkap' => $data['demografi']['u_lengkap'], 
        'no_transaksi' => $data['transaksi']['no_order'], 
        'nm_ruang' => $data['transaksi']['ruangan'], 
        'id_kelas' => $data['transaksi']['id_kelas'], 
        'id_status' => $data['transaksi']['jnsreg'], 
        'dr_pengirim' => $data['transaksi']['dokter'], 
        'ket' => $data['transaksi']['ket'], 
        'catatan_1' => $data['transaksi']['catatan_1'], 
        'catatan_2' => $data['transaksi']['catatan_2'] 
    ),
    'detils' => array(
        'idlab' => ($data_array)   
    )
);

$request = jwt_request($xtoken,$post); // Send or retrieve data

echo json_encode($post);

?>
