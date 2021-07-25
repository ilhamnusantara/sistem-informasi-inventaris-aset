<?php

namespace App\Exports;

use App\Belanja;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataAsetExport implements FromCollection, SkipsEmptyRows,  WithMapping, WithHeadings, ShouldAutoSize
{
    protected $id_jenis = null;

    function __construct($id_jenis) {
        $this->id_jenis = $id_jenis;
    }
    public function collection()
    {
        if( $this->id_jenis){
            return Belanja::whereHas('Dokumen', function($q){
                $q->where('id_jenis', '=', $this->id_jenis);
            })->with(['Dokumen.jenisBelanja'])->get();
        }else{
            return Belanja::with(['Dokumen', 'Dokumen.jenisBelanja'])->get();
        }
    }


    public function map($belanja) : array
    {

        return [
            $belanja['id_belanja'],
//            $belanja['Dokumen']['jenisBelanja']['jenis_belanja'],
            $belanja['Dokumen']['instansi'],
            $belanja['Dokumen']['keterangan_belanja'],
            $belanja['Dokumen']['rincian_belanja'],
            $belanja['satuan'],
            $belanja['volume'],
            $belanja['nominal_belanja'],
            $belanja['rekanan'],
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
            'Rincian',
            'Satuan',
            'Volume',
            'Nominal',
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
