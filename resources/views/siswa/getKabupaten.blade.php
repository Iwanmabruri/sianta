<?php
if ($idProvinsi == "0") {
?>
<option value="">Pilih Kabupaten</option>
<?php
}else {
?>
<option value="">Pilih Kabupaten</option>
<?php
$kabupaten = DB:: table('kabupaten')->where('province_id', $idProvinsi)->get();
foreach ($kabupaten as $value) {
    if ($kab == "0") {
        $select = '';
    }else {
        if ($kab == $value->id) {
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
