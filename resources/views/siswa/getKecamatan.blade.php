<?php
if ($idKabupaten == "0") {
?>
<option value="">Pilih Kecamatan</option>
<?php
}else {
?>
<option value="">Pilih Kecamatan</option>
<?php
$kecamatan = DB:: table('kecamatan')->where('regency_id', $idKabupaten)->get();
foreach ($kecamatan as $value) {
    if ($kec == "0") {
        $select = '';
    }else {
        if ($kec == $value->id) {
            $select = 'selected';
        }else {
            $select = '';
        }
    }
?>
<option <?= $select ?> value="<?= $value->id ?>"><?= $value->name ?></option>
<?php
}
}
?>
