<?php

namespace App\Exports;

use App\Models\IbuHamil;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class IbuHamilsExport implements FromCollection, WithHeadings, WithMapping
{
  public $ibuHamils;

  public function __construct($ibuHamils)
  {
    $this->ibuHamils = $ibuHamils;
  }
  /**
   * @return \Illuminate\Support\Collection
   */
  public function map($ibuHamil): array
  {
    return [
      $ibuHamil->nama,
      $ibuHamil->alamat,
      $ibuHamil->no_telepon,
      $ibuHamil->usia_kandungan,
      Carbon::parse($ibuHamil->tanggal_hamil)->locale('id'),
      Carbon::parse($ibuHamil->tanggal_lahir)->locale('id'),
    ];
  }
  public function headings(): array
  {
    return [
      'Nama',
      'Alamat',
      'No Telepon',
      'Usia Kandungan',
      'Tanggal Hamil',
      'Tanggal Lahiran'
    ];
  }
  public function collection()
  {
    return IbuHamil::whereIn('id_ibuHamil', $this->ibuHamils)->get();
  }
}
