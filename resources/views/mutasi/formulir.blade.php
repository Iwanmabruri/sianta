<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Formulir</title>

    <style>
        * {
            font-family: "Times New Roman", Times, serif;
        }

        .huhu {
            width: 100%;
            border-collapse: collapse;
        }

        .uu {
            border: 1px solid black;
            text-align: center;
        }
    </style>

    <script>
        window.print();
        window.onafterprint = function(e) {
            window.close();
        };
    </script>
</head>

<body>
    <?php
    $data = DB::table('siswa')->where('id_siswa', $id)->first();
    
    $desa = DB::table('desa')
        ->where('id', $data->desa)
        ->first();
    
    $kecamatan = DB::table('kecamatan')
        ->where('id', $data->kecamatan)
        ->first();
    
    $kabupaten = DB::table('kabupaten')
        ->where('id', $data->kabKota)
        ->first();
    
    $prodi = DB::table('program_keahlian')
        ->where('id_program_keahlian', $data->id_program_keahlian)
        ->first();
    
    function tgl_indo($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        $pecahkan = explode('-', $tanggal);
    
        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
    
    ?>
    <div>
        <div>
            <img src="{{ asset('img/kop.png') }}" alt="">
        </div>

        <div>
            <div
                style="font-size: 16px;font-family: 'Times New Roman', Times, serif;display: flex;justify-content: center;margin-bottom: 0;margin-top: 20px;padding: 0;">
                <strong style="margin: 0; padding: 0;"><b><u>SURAT KETERANGAN PINDAH/MUTASI</u></b></strong>
            </div>
            <div
                style="font-size: 14px;font-family: 'Times New Roman', Times, serif;display: flex;justify-content: center;margin-top: 0;margin-bottom: 20px;padding: 0;">
                <p style="margin: 0; padding: 2px 0;">Nomor : YNAA-10/004/0097/SKP/02-2024</p>
            </div>
        </div>
        <div style="font-size: 14px;font-family: 'Times New Roman', Times, serif;margin: 0px 20px;">
            <table cellpadding='6'>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Nama</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><strong><?= $data->namaSiswa ?></strong></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Tempat dan Tanggal Lahir</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $data->tempatLahir . ', ' . tgl_indo($data->tglLahir) ?></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Jenis Kelamin</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $data->jk == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Nomor Induk</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $data->nipdSiswa ?></td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>NISN</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $data->nipdSiswa ?></td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Kelas</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $data->nipdSiswa ?></td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Program Studi Keahlian</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $data->nipdSiswa ?></td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Konsentrasi Keahlian</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $data->nipdSiswa ?></td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>Nama Orang Tua/Wali</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><strong></strong></td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>Pekerjaan Orang Tua/Wali</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>11.</td>
                        <td>Alamat Orang Tua/Wali</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>12.</td>
                        <td>Mulai Masuk Sekolah tanggal</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>13.</td>
                        <td>Berasal dari Sekolah/Madrasah</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>14.</td>
                        <td>Diterima di Kelas</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>15.</td>
                        <td>Tanggal Pindah/Keluar</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>16.</td>
                        <td>Pindah Ke</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>17.</td>
                        <td>Alasan Pindah</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="display: flex;justify-content: flex-end;padding: 0 20px;width: 90%;margin-top: 20px;">
            <div style="font-size: 14px;font-family: 'Times New Roman', Times, serif;margin: 0px 20px;padding: 10px;">
                <b>Catatan</b>
                <ol>
                    <li>Lampiran surat keterangan ini terdiri dari Buku <br>Laporan Hasil Belajar Siswa
                        (Raport)</li>
                    <li>Setelah Keluar, yang bersangkutan tidak dapat <br>diterima kembali di SMK Nurul Abror
                        Al-Robbaniyin
                    </li>
                </ol>
            </div>
        </div>
        <div style="display: flex;justify-content: flex-end;padding: 0 20px;width: 90%;">
            <div style="font-size: 14px;font-family: 'Times New Roman', Times, serif;margin: 0px 20px;padding: 10px;">
                <p style="margin: 0; padding: 0;">Banyuwangi, <?= tgl_indo($data->tglLahir) ?></p>
                <p style="margin: 0; padding: 0;">Kepala Sekolah,</p>
                <div style="margin-top: 70px;">
                    <strong style="margin: 0; padding: 0;">(<u>ABDUL MUIS, M.Pd.</u>)</strong>
                    <p style="margin: 0; padding: 0;">NIPY. 1980.15.06.2012.27</p>
                </div>
            </div>
        </div>
        {{-- page2 --}}
        <div style="margin-top: 300px;display: grid;grid-template-columns: 1fr 1fr;gap: 10%;width: 100%;">
            <div style="padding: 20px;">
                <table>
                    <tbody>
                        <tr>
                            <td>Nama Sekolah</td>
                            <td>&nbsp;:&nbsp;</td>
                            <td>SMK Nurul Abror Al-Robbaniyin</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>&nbsp;:&nbsp;</td>
                            <td>Jl. KH. Agus Salim 155 Alasbuluh</td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>&nbsp;:&nbsp;</td>
                            <td><strong><?= $data->namaSiswa ?></strong></td>
                        </tr>
                        <tr>
                            <td>NIS/NISN</td>
                            <td>&nbsp;:&nbsp;</td>
                            <td><?= $data->nipdSiswa . '/' . $data->nisnSiswa ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="padding: 20px;">
                <table>
                    <tbody>
                        <tr>
                            <td>Kelas</td>
                            <td>&nbsp;:&nbsp;</td>
                            <td>X C</td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>&nbsp;:&nbsp;</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kon. Keahlian</td>
                            <td>&nbsp;:&nbsp;</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tahun Pelajaran</td>
                            <td>&nbsp;:&nbsp;</td>
                            <td><?= $data->nipdSiswa . '/' . $data->nisnSiswa ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="display: flex;justify-content: center;">
            <strong>KETERANGAN PINDAH SEKOLAH</strong>
        </div>
        <div style="margin-top: 10px">
            <table class="huhu">
                <tbody>
                    <tr>
                        <td class="uu" colspan="4"><strong>KELUAR</strong></td>
                    </tr>
                    <tr>
                        <td class="uu">Tanggal Pindah</td>
                        <td class="uu">Kelas yang<br>ditinggalkan</td>
                        <td class="uu">Alasan<br>Pindah/Keluar</td>
                        <td class="uu">Tanda Tangan Kepala Sekolah dan<br>Stempel Sekolah serta Orang<br>Tua/Wali
                        </td>
                    </tr>
                    <tr>
                        <td class="uu">1</td>
                        <td class="uu">2</td>
                        <td class="uu">3</td>
                        <td class="uu">4</td>
                    </tr>
                    <tr>
                        <td class="uu">07 Februari 2024</td>
                        <td class="uu">X</td>
                        <td class="uu">Permohonan Orang tua</td>
                        <td class="uu">
                            <p style="margin: 0; padding: 0;">Banyuwangi, <?= tgl_indo($data->tglLahir) ?></p>
                            <p style="margin: 0; padding: 0;">Kepala Sekolah,</p>
                            <div style="margin-top: 100px;">
                                <strong style="margin: 0; padding: 0;">(<u>ABDUL MUIS, M.Pd.</u>)</strong>
                                <p style="margin: 0; padding: 0;">NIPY. 1980.15.06.2012.27</p>
                            </div>
                            <p style="margin-top: 10px; padding: 0;">Orang Tua/Wali,</p>
                            <div style="margin-top: 100px;">
                                <strong style="margin: 0; padding: 0;">(<u>ISMAIL</u>)</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="uu"></td>
                        <td class="uu"></td>
                        <td class="uu"></td>
                        <td class="uu">
                            <p style="margin: 0; padding: 0;">Banyuwangi, ......................</p>
                            <p style="margin: 0; padding: 0;">Kepala Sekolah,</p>
                            <div style="margin-top: 100px;">
                                <strong style="margin: 0; padding: 0;">(<u>.......................</u>)</strong>
                                <p style="margin: 0; padding: 0;">NIPY. ............................</p>
                            </div>
                            <p style="margin-top: 10px; padding: 0;">Orang Tua/Wali,</p>
                            <div style="margin-top: 100px;">
                                <strong style="margin: 0; padding: 0;">(<u>......................</u>)</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="uu"></td>
                        <td class="uu"></td>
                        <td class="uu"></td>
                        <td class="uu">
                            <p style="margin: 0; padding: 0;">Banyuwangi, ......................</p>
                            <p style="margin: 0; padding: 0;">Kepala Sekolah,</p>
                            <div style="margin-top: 100px;">
                                <strong style="margin: 0; padding: 0;">(<u>.......................</u>)</strong>
                                <p style="margin: 0; padding: 0;">NIPY. ............................</p>
                            </div>
                            <p style="margin-top: 10px; padding: 0;">Orang Tua/Wali,</p>
                            <div style="margin-top: 100px;">
                                <strong style="margin: 0; padding: 0;">(<u>......................</u>)</strong>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
