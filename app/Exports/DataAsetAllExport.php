<?php

namespace App\Exports;

use App\Belanja;
use App\Dokumen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataAsetAllExport implements FromCollection, SkipsEmptyRows,  WithMapping, WithHeadings, ShouldAutoSize
{
    protected $tanggal = null;
    function __construct($tanggal) {
        $this->tanggal = $tanggal;
    }
    public function collection()
    {

        $data = Belanja::query();
        if($this->tanggal){
            $date = explode(' - ', $this->tanggal);
            $date_start = \Carbon\Carbon::parse(urldecode($date[0]))->format('Y-m-d');
            $date_end = \Carbon\Carbon::parse(urldecode($date[1]))->format('Y-m-d');
            $data->whereRaw('DATE(tanggal_sp2d) BETWEEN DATE(?) AND DATE(?)', [$date_start, $date_end]);

        }
        return $data->orderBy('tanggal_sp2d','ASC')->with(['Dokumen'])->get();


    }

    public function map($belanja) : array
    {
        return [
            $belanja['id_belanja'],
            $belanja['Dokumen']['instansi'],
            $belanja['Dokumen']['keterangan_belanja'],
            $belanja['satuan'],
            $belanja['volume'],
            $belanja['nominal_belanja'],
            $belanja['total_belanja'],
            $belanja['Dokumen']['no_spk'],
            $belanja['Dokumen']['tgl_spk'],
            $belanja['Dokumen']['no_bast'],
            $belanja['Dokumen']['tgl_bast'],
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
            'Instansi',
            'Belanja',
            'Satuan',
            'Volume',
            'Nominal Belanja',
            'Total Belanja',
            'No SPK',
            'Tgl SPK',
            'No BAST',
            'Tgl BAST',
            'Merk',
            'Bahan',
            'type',
            'Ukuran'
        ];
    }
}
