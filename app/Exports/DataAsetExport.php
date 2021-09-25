<?php

namespace App\Exports;

use App\Belanja;
use App\Dokumen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataAsetExport implements FromCollection, SkipsEmptyRows,  WithMapping, WithHeadings, ShouldAutoSize
{
    protected $id_jenis = null;
    protected $tanggal = null;

    function __construct($id_jenis, $tanggal) {
        $this->id_jenis = $id_jenis;
        $this->tanggal = $tanggal;
    }
    public function collection()
    {

        $data = Belanja::query();
        if($this->id_jenis){
            $data->whereHas('Dokumen', function($q){
                $q->where('id_jenis', '=', $this->id_jenis);
            });
        }
        if($this->tanggal){
            $date = explode(' - ', $this->tanggal);

            $date_start = \Carbon\Carbon::parse(urldecode($date[0]))->format('Y-m-d');
            $date_end = \Carbon\Carbon::parse(urldecode($date[1]))->format('Y-m-d');
            $data->whereRaw('DATE(tanggal_sp2d) BETWEEN DATE(?) AND DATE(?)', [$date_start, $date_end]);

        }

        return $data->orderBy('tanggal_sp2d','ASC')->with(['Dokumen.jenisBelanja'])->get();

    }


    public function map($belanja) : array
    {
        return [
            $belanja['id_belanja'],
//            $belanja['Dokumen']['jenisBelanja']['jenis_belanja'],
//            $belanja['Dokumen']['instansi']['nama_instansi'],
            $belanja['instansi'],
            $belanja['Dokumen']['keterangan_belanja'],
//            $belanja['Dokumen']['rincian_belanja'],
            $belanja['satuan'],
            $belanja['volume'],
            $belanja['nominal_belanja'],
            $belanja['total_belanja'],
            $belanja['rekanan']['nama_rekanan'],
            $belanja['no_pbb_ls'],
            $belanja['tanggal_belanja'],
            $belanja['Dokumen']['no_spk'],
            $belanja['Dokumen']['tgl_spk'],
            $belanja['Dokumen']['no_bast'],
            $belanja['Dokumen']['tgl_bast'],
            $belanja['sp2d'],
            $belanja['tanggal_sp2d'],
            $belanja['Dokumen']['merk'],
            $belanja['Dokumen']['bahan'],
            $belanja['Dokumen']['type'],
            $belanja['Dokumen']['ukuran'],
        ];

    }

    public function headings() : array
    {
        return [
            'ID Belanja',
//            'Belanja',
            'Instansi',
            'Belanja',
//            'Rincian',
            'Satuan',
            'Volume',
            'Nominal Belanja',
            'Total Belanja',
            'Rekanan',
            'NO PBB/LS',
            'Tanggal Belanja',
            'No SPK',
            'Tgl SPK',
            'No BAST',
            'Tgl BAST',
            'SP2D',
            'Tanggal SP2D',
            'Merk',
            'Bahan',
            'type',
            'Ukuran'
        ];
    }
}
