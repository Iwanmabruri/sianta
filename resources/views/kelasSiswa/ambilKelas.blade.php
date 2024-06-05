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
<option value="<?= $value->idK ?>">Kelas <?= $value->kls?></option>
    {{-- <div class="col-12 col-md-6 col-lg-3">
        <div class="card text-center shadow-lg">
            <div class="card-header">
                <h5 class="card-title mb-0">Kelas <?= $value->kls?></h5>
            </div>
            <div class="card-body">
                <div class="">
                    <p class="card-text">Kelas <?= $value->kls?>&nbsp;<?= $value->rag?> <?= $value->progKeah?> (<?= $value->thnAjr?>)</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <button
                    type="button"
                    data="<?= $value->idK ?>"
                    class="btn btn-outline-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto float-start pilih">
                    Pilih
                </button>
            </div>
        </div>
    </div> --}}
<?php
}
}
?>
