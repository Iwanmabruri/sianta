<?php
$data = DB:: table('kelas')
->where('kelas.id_tahun_ajaran', $idthn)
->where('kelas.id_program_keahlian', $idprog)
->join('tahun_ajaran', 'kelas.id_tahun_ajaran', '=', 'tahun_ajaran.id_tahun_ajaran')
->join('program_keahlian', 'kelas.id_program_keahlian', '=', 'program_keahlian.id_program_keahlian')
->select('kelas.id_kelas as idK', 'kelas.id_pegawai as idP', 'kelas.id_tahun_ajaran as idT',
'kelas.id_program_keahlian as idProg', 'kelas.kelas as kls', 'kelas.ruang as rag', 'kelas.status as sts',
'tahun_ajaran.tahun_ajaran as thnAjr', 'program_keahlian.program_keahlian as progKeah')
->get();
if (count($data) == "0") {
?>
    <option value="">Kelas</option>
<?php
}else {
?>
    <option value="">Kelas</option>
<?php
foreach ($data as $value) {
?>
<option value="<?= $value->idK ?>">Kelas <?= $value->kls?>&nbsp;<?= $value->rag?></option>
<?php
}
}
?>
