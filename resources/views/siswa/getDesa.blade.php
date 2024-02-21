<?php
if ($idKecamatan == "0") {
?>
<option value="">Pilih Desa</option>
<?php
}else {
?>
<option value="">Pilih Desa</option>
<?php
$desa = DB:: table('desa')->where('district_id', $idKecamatan)->get();
foreach ($desa as $value) {
    if ($des == "0") {
        $select = '';
    }else {
        if ($des == $value->id) {
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
