<?php

namespace App\Exports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;

class JadwalsExport implements FromCollection
{
  public $jadwals;

  public function __construct($jadwals)
  {
    $this->jadwals = $jadwals;
  }
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return Jadwal::whereIn('id_jadwal', $this->jadwals)->get();
  }
}
