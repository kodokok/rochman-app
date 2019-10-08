<?php

use App\Klausul;
use App\ObjektifAudit;
use Illuminate\Database\Seeder;

class KlausulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objektif_audit = 'ISO 9001:2015';

        $data = [
            ['objektif_audit' => $objektif_audit, 'nama' => '4.1 Memahami Organisasi dan Konteks Organisasi'],
            ['objektif_audit' => $objektif_audit, 'nama' => '4.2 Memahami Kebutuhan dan Harapan Pihak yang Berkepentingan'],
            ['objektif_audit' => $objektif_audit, 'nama' => '4.3 Menetapkan Ruang Lingkup Sistem Manajemen Mutu'],
            ['objektif_audit' => $objektif_audit, 'nama' => '4.4 Sistem Manajemen Mutu dan Proses'],
            ['objektif_audit' => $objektif_audit, 'nama' => '5.1 Kepemimpinan dan Komitmen'],
            ['objektif_audit' => $objektif_audit, 'nama' => '5.2 Kebijakan Mutu'],
            ['objektif_audit' => $objektif_audit, 'nama' => '5.3 Peran Organisasi, Tanggung Jawab, dan Wewenang'],
            ['objektif_audit' => $objektif_audit, 'nama' => '6.1 Penanganan Risiko dan Peluang'],
            ['objektif_audit' => $objektif_audit, 'nama' => '6.2 Sasaran Mutu dan Rencana Pencapaian'],
            ['objektif_audit' => $objektif_audit, 'nama' => '6.2 Sasaran Mutu dan Rencana Pencapaian'],
            ['objektif_audit' => $objektif_audit, 'nama' => '6.3 Perubahan Yang Terencana'],
            ['objektif_audit' => $objektif_audit, 'nama' => '7.1 Sumberdaya'],
            ['objektif_audit' => $objektif_audit, 'nama' => '7.2 Kompetensi'],
            ['objektif_audit' => $objektif_audit, 'nama' => '7.3 Pelatihan'],
            ['objektif_audit' => $objektif_audit, 'nama' => '7.4 Komunikasi'],
            ['objektif_audit' => $objektif_audit, 'nama' => '7.5 Informasi yang Terdokumentasi'],
            ['objektif_audit' => $objektif_audit, 'nama' => '8.1 Perencanaan dan Pengendalian Operasional'],
            ['objektif_audit' => $objektif_audit, 'nama' => '8.2 Penetapan Persyaratan Produk dan Jasa'],
            ['objektif_audit' => $objektif_audit, 'nama' => '8.3 Desain dan Pengembangan Produk dan Jasa'],
            ['objektif_audit' => $objektif_audit, 'nama' => '8.4 Pengendalian Produk dan Jasa yang disediakan Pihak Eksternal'],
            ['objektif_audit' => $objektif_audit, 'nama' => '8.5 Produksi dan Penyediaan Jasa'],
            ['objektif_audit' => $objektif_audit, 'nama' => '8.6 Merilis Produk dan Jasa'],
            ['objektif_audit' => $objektif_audit, 'nama' => '8.7 Pengendalian Proses, Produk dan Jasa yang Tidak Sesuai'],
            ['objektif_audit' => $objektif_audit, 'nama' => '9.1 Pemantauan, Pengukuran, Analisis dan Evaluasi'],
            ['objektif_audit' => $objektif_audit, 'nama' => '9.2 Audit Internal'],
            ['objektif_audit' => $objektif_audit, 'nama' => '9.3 Management Review'],
            ['objektif_audit' => $objektif_audit, 'nama' => '10.1 Umum'],
            ['objektif_audit' => $objektif_audit, 'nama' => '10.2 Ketidaksesusaian dan Tindakan Koreksi'],
            ['objektif_audit' => $objektif_audit, 'nama' => '10.3 Perbaikan Berkelanjuta'],
            ['objektif_audit' => $objektif_audit, 'nama' => '10.3 Perbaikan Berkelanjuta'],
        ];

        foreach ($data as $klausul) {
            Klausul::create($klausul);
        }

    }
}
