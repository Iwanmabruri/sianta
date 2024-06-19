<?php

namespace App\Http\Controllers;

// require 'vendor/autoload.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class ExportController extends Controller
{
    public function index()
    {
        return view('export_data.exportData');
    }

    public function cekDataPertahun(Request $req)
    {
        $cek = DB::table("siswa")
            ->where("status", "Aktif")
            ->whereYear('tglDiterima', $req->tahun)
            ->where('id_program_keahlian', $req->prodi)
            ->count();
        if ($cek > 0) {
            return "2";
        } else {
            return "1";
        }
    }

    public function pertahun($prodi, $tahun)
    {
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A2', 'NO');
        $activeWorksheet->setCellValue('B2', 'NIK');
        $activeWorksheet->setCellValue('C2', 'NO KK');
        $activeWorksheet->setCellValue('D2', 'NISN');
        $activeWorksheet->setCellValue('E2', 'NIPD');
        $activeWorksheet->setCellValue('F2', 'NAMA');
        $activeWorksheet->setCellValue('G2', 'JENIS KELAMIN');
        $activeWorksheet->setCellValue('H2', 'TEMPAT LAHIR');
        $activeWorksheet->setCellValue('I2', 'TANGGAL LAHIR');
        $activeWorksheet->setCellValue('J2', 'STATUS ANAK');
        $activeWorksheet->setCellValue('K2', 'ANAK KE');
        $activeWorksheet->setCellValue('L2', 'JUMLAH SAUDARA');
        $activeWorksheet->setCellValue('M2', 'AGAMA');
        $activeWorksheet->setCellValue('N2', 'NOMOR HP');
        $activeWorksheet->setCellValue('O2', 'NO IJAZAH');
        $activeWorksheet->setCellValue('P2', 'SEKOLAH ASAL');
        $activeWorksheet->setCellValue('Q2', 'JENIS TEMPAT TINGGAL');
        $activeWorksheet->setCellValue('R2', 'DUSUN/JALAN');
        $activeWorksheet->setCellValue('S2', 'ALAMAT'); // DESA KECAMATAN KABUPATEN DAN PROVINSI
        $activeWorksheet->setCellValue('T2', 'NIK AYAH');
        $activeWorksheet->setCellValue('U2', 'NAMA AYAH');
        $activeWorksheet->setCellValue('V2', 'TANGGAL LAHIR AYAH');
        $activeWorksheet->setCellValue('W2', 'PENDIDIKAN AYAH');
        $activeWorksheet->setCellValue('X2', 'PEKERJAAN AYAH');
        $activeWorksheet->setCellValue('Y2', 'PENGHASILAN AYAH');
        $activeWorksheet->setCellValue('Z2', 'NIK IBU');
        $activeWorksheet->setCellValue('AA2', 'NAMA IBU');
        $activeWorksheet->setCellValue('AB2', 'TANGGAL LAHIR IBU');
        $activeWorksheet->setCellValue('AC2', 'PENDIDIKAN IBU');
        $activeWorksheet->setCellValue('AD2', 'PEKERJAAN IBU');
        $activeWorksheet->setCellValue('AE2', 'PENGHASILAN IBU');
        $activeWorksheet->setCellValue('AF2', 'NIK WALI');
        $activeWorksheet->setCellValue('AG2', 'NAMA WALI');
        $activeWorksheet->setCellValue('AH2', 'TANGGAL LAHIR WALI');
        $activeWorksheet->setCellValue('AI2', 'PENDIDIKAN WALI');
        $activeWorksheet->setCellValue('AJ2', 'PEKERJAAN WALI');
        $activeWorksheet->setCellValue('AK2', 'PENGHASILAN WALI');
        $activeWorksheet->setCellValue('AL2', 'TANGGAL DAFTAR');

        $dataProdi = DB::table('program_keahlian')->where('id_program_keahlian', $prodi)->first();

        $activeWorksheet->mergeCells("A1:AL1");
        $activeWorksheet->setCellValue('A1', 'DATA SISWA ' . strtoupper($dataProdi->program_keahlian) . " TAHUN ANGKATAN : " . $tahun);

        foreach ($activeWorksheet->getColumnIterator() as $column) {
            $activeWorksheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $styleArray_header = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            ),
            'font' => array(
                'bold' => true
            )
        );
        $styleArray_all = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            )
        );

        $activeWorksheet->getStyle('A2:AL2')->applyFromArray($styleArray_header);

        $siswa = DB::table("siswa")
            ->where("status", "Aktif")
            ->whereYear('tglDiterima', $tahun)
            ->where('id_program_keahlian', $prodi)
            ->get();
        $no = 0;
        $row = 2;

        foreach ($siswa as $dt) {
            $desa_al = DB::table("desa")->where("id", $dt->desa)->first();
            $kec_al = DB::table("kecamatan")->where("id", $dt->kecamatan)->first();
            $kab_al = DB::table("kabupaten")->where("id", $dt->kabKota)->first();
            $prov_al = DB::table("provinsi")->where("id", $dt->provinsi)->first();

            $no++;
            $row++;

            $activeWorksheet->setCellValue('A' . $row, $no);
            $activeWorksheet->setCellValueExplicit('B' . $row, $dt->nikSiswa, DataType::TYPE_STRING);
            $activeWorksheet->setCellValueExplicit('C' . $row, $dt->noKK, DataType::TYPE_STRING);
            $activeWorksheet->setCellValueExplicit('D' . $row, $dt->nisnSiswa, DataType::TYPE_STRING);
            $activeWorksheet->setCellValueExplicit('E' . $row, $dt->nipdSiswa, DataType::TYPE_STRING);

            $activeWorksheet->setCellValue('F' . $row, $dt->namaSiswa);
            if ($dt->jk == 'L') {
                $jenkel = 'LAKI-LAKI';
            } else {
                $jenkel = 'PEREMPUAN';
            }
            $activeWorksheet->setCellValue('G' . $row, $jenkel);
            $activeWorksheet->setCellValue('H' . $row, $dt->tempatLahir);
            $activeWorksheet->setCellValue('I' . $row, $dt->tglLahir);
            $activeWorksheet->setCellValue('J' . $row, $dt->statusAnak);

            $activeWorksheet->setCellValue('K' . $row, $dt->anakKe);
            $activeWorksheet->setCellValue('L' . $row, $dt->jmlSaudara);
            $activeWorksheet->setCellValue('M' . $row, $dt->agama);
            $activeWorksheet->setCellValueExplicit('N' . $row, $dt->nohp, DataType::TYPE_STRING);
            $activeWorksheet->setCellValueExplicit('O' . $row, $dt->noIjazah, DataType::TYPE_STRING);

            $activeWorksheet->setCellValue('P' . $row, $dt->sklAsal);
            $activeWorksheet->setCellValue('Q' . $row, $dt->jnsTempTinggal);
            $activeWorksheet->setCellValue('R' . $row, $dt->detAlamat);
            $activeWorksheet->setCellValue('S' . $row, $desa_al->name . ' ' . $kec_al->name . ' ' . $kab_al->name . ' ' . $prov_al->name);
            $activeWorksheet->setCellValueExplicit('T' . $row, $dt->nikAyah, DataType::TYPE_STRING);

            $activeWorksheet->setCellValue('U' . $row, $dt->nmAyah);
            $activeWorksheet->setCellValue('V' . $row, $dt->tglLahirAyah);
            $activeWorksheet->setCellValue('W' . $row, $dt->pendAyah);
            $activeWorksheet->setCellValue('X' . $row, $dt->pkrjnAyah);
            $activeWorksheet->setCellValue('Y' . $row, $dt->penghAyah);
            $activeWorksheet->setCellValueExplicit('Z' . $row, $dt->nikIbu, DataType::TYPE_STRING);

            $activeWorksheet->setCellValue('AA' . $row, $dt->nmIbu);
            $activeWorksheet->setCellValue('AB' . $row, $dt->tglLahirIbu);
            $activeWorksheet->setCellValue('AC' . $row, $dt->pendIbu);
            $activeWorksheet->setCellValue('AD' . $row, $dt->pkrjnIbu);
            $activeWorksheet->setCellValue('AE' . $row, $dt->penghIbu);

            $activeWorksheet->setCellValueExplicit('AF' . $row, $dt->nikWali, DataType::TYPE_STRING);
            $activeWorksheet->setCellValue('AG' . $row, $dt->nmWali);
            $activeWorksheet->setCellValue('AH' . $row, $dt->tglLahirWali);
            $activeWorksheet->setCellValue('AI' . $row, $dt->pendWali);
            $activeWorksheet->setCellValue('AJ' . $row, $dt->pkrjnWali);

            $activeWorksheet->setCellValue('AK' . $row, $dt->penghWali);
            $activeWorksheet->setCellValue('AL' . $row, $dt->tglDiterima);
            $activeWorksheet->getStyle('A' . $row . ':AL' . $row)->applyFromArray($styleArray_all);
        }

        $writer = new Xlsx($spreadsheet);
        $response = new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );

        $filename = 'DATA SISWA ' . strtoupper($dataProdi->program_keahlian) . " TAHUN ANGKATAN : " . $tahun . ".xlsx";

        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $filename . '"');
        $response->headers->set('Cache-Control', 'max-age=0');
        return $response;
    }

    public function cekDataPerkelas(Request $req)
    {
        $cek = DB::table("siswa_perkelas")
            ->where('id_kelas', $req->kelas)
            ->count();
        if ($cek > 0) {
            return "2";
        } else {
            return "1";
        }
    }

    public function perkelas($prodi, $tahun, $kelas)
    {
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A2', 'NO');
        $activeWorksheet->setCellValue('B2', 'NIPD');
        $activeWorksheet->setCellValue('C2', 'NISN');
        $activeWorksheet->setCellValue('D2', 'NAMA');
        $activeWorksheet->setCellValue('E2', 'JENIS KELAMIN');
        $activeWorksheet->setCellValue('F2', 'TEMPAT LAHIR');
        $activeWorksheet->setCellValue('G2', 'TANGGAL LAHIR');
        $activeWorksheet->setCellValue('H2', 'KELAS');

        $dataProdi = DB::table('program_keahlian')->where('id_program_keahlian', $prodi)->first();
        $dataKelas = DB::table('kelas')->where('id_kelas', $kelas)->first();

        $activeWorksheet->mergeCells("A1:H1");
        $activeWorksheet->setCellValue('A1', 'DATA SISWA ' . strtoupper($dataProdi->program_keahlian) . " KELAS " . $dataKelas->kelas . ' ' . $dataKelas->ruang);

        foreach ($activeWorksheet->getColumnIterator() as $column) {
            $activeWorksheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $styleArray_header = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            ),
            'font' => array(
                'bold' => true
            )
        );
        $styleArray_all = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            )
        );

        $activeWorksheet->getStyle('A2:H2')->applyFromArray($styleArray_header);

        $siswa = DB::table('siswa_perkelas')
            ->where('id_kelas', $kelas)
            ->join('siswa', 'siswa_perkelas.id_siswa', '=', 'siswa.id_siswa')
            ->get();

        $no = 0;
        $row = 2;

        foreach ($siswa as $dt) {

            $no++;
            $row++;

            $activeWorksheet->setCellValue('A' . $row, $no);
            $activeWorksheet->setCellValueExplicit('B' . $row, $dt->nipdSiswa, DataType::TYPE_STRING);
            $activeWorksheet->setCellValueExplicit('C' . $row, $dt->nisnSiswa, DataType::TYPE_STRING);

            $activeWorksheet->setCellValue('D' . $row, $dt->namaSiswa);
            if ($dt->jk == 'L') {
                $jenkel = 'LAKI-LAKI';
            } else {
                $jenkel = 'PEREMPUAN';
            }
            $activeWorksheet->setCellValue('E' . $row, $jenkel);
            $activeWorksheet->setCellValue('F' . $row, $dt->tempatLahir);
            $activeWorksheet->setCellValue('G' . $row, $dt->tglLahir);
            $activeWorksheet->setCellValue('H' . $row, $dataKelas->kelas . ' ' . $dataKelas->ruang);

            $activeWorksheet->getStyle('A' . $row . ':H' . $row)->applyFromArray($styleArray_all);
        }

        $writer = new Xlsx($spreadsheet);
        $response = new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );

        $filename = 'DATA SISWA ' . strtoupper($dataProdi->program_keahlian) . " KELAS " . $dataKelas->kelas . ' ' . $dataKelas->ruang . ".xlsx";

        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $filename . '"');
        $response->headers->set('Cache-Control', 'max-age=0');
        return $response;
    }
}
