<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $fillable = [
    'tracking_code', 'jenis_pelanggaran', 'indikasi_apa', 'lokasi_kejadian',
    'waktu_kejadian', 'nama_terlapor', 'nuptk_terlapor', 'kronologis',
    'nama_pelapor', 'nis', 'nuptk_pelapor', 'email', 'no_hp', 'is_anonymous', 'status', 'catatan_admin'
];

public function evidences() {
    return $this->hasMany(ReportEvidence::class);
}

}
