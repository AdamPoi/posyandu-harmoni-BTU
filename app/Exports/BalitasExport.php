<?php

namespace App\Exports;

use App\Models\Balita;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BalitasExport implements FromCollection, WithHeadings, WithMapping
{
  public $balitas;

  public function __construct($balitas)
  {
    $this->balitas = $balitas;
  }
  /**
   * @return \Illuminate\Support\Collection
   */
  public function map($balita): array
  {
    return [
      $balita->nama,
      $balita->nama_ayah,
      $balita->nama_ibu,
      $balita->usia,
      $balita->jenis_kelamin,
      Carbon::parse($balita->tanggal_lahir)->locale('id'),
    ];
  }
  public function headings(): array
  {
    return [
      'Nama',
      'Nama Ayah',
      'Nama Ibu',
      'Usia',
      'Jenis Kelamin',
      'Tanggal Lahir'
    ];
  }
  public function collection()
  {
    return Balita::whereIn('id_balita', $this->balitas)->get();
  }
}
