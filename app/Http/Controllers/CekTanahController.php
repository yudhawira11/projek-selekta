<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekTanahController extends Controller
{
    public function save(Request $request)
    {
        $vals = $request->only(['nitrogen', 'phosphorus', 'potassium', 'moisture']);

        // Normalize numeric inputs
        $nitrogen = isset($vals['nitrogen']) ? (float) $vals['nitrogen'] : null;
        $phosphorus = isset($vals['phosphorus']) ? (float) $vals['phosphorus'] : null;
        $potassium = isset($vals['potassium']) ? (float) $vals['potassium'] : null;
        $moisture = isset($vals['moisture']) ? (float) $vals['moisture'] : null;

        $recommendations = [];

        // Nitrogen recommendations
        if (!is_null($nitrogen)) {
            if ($nitrogen < 40) {
                $recommendations[] = [
                    'title' => 'Tambahkan Nitrogen',
                    'subtitle' => 'Nitrogen rendah',
                    'detail' => "Nilai N Anda {$nitrogen}%. Pertimbangkan pemupukan N (mis. urea, kompos kaya nitrogen) untuk meningkatkan pertumbuhan tanaman.",
                    'source' => 'Soil Sense Advisor'
                ];
            } elseif ($nitrogen < 60) {
                $recommendations[] = [
                    'title' => 'Pemeliharaan Nitrogen',
                    'subtitle' => 'Nitrogen sedang',
                    'detail' => "Nilai N Anda {$nitrogen}%. Tambahkan bahan organik untuk menjaga ketersediaan N.",
                    'source' => 'Soil Sense Advisor'
                ];
            }
        }

        // Phosphorus recommendations
        if (!is_null($phosphorus)) {
            if ($phosphorus < 35) {
                $recommendations[] = [
                    'title' => 'Tambah Fosfor',
                    'subtitle' => 'Fosfor rendah',
                    'detail' => "Nilai P Anda {$phosphorus}%. Aplikasi pupuk fosfat (mis. TSP) atau bahan organik dapat membantu meningkatkan ketersediaan P.",
                    'source' => 'Soil Sense Advisor'
                ];
            }
        }

        // Potassium recommendations
        if (!is_null($potassium)) {
            if ($potassium < 35) {
                $recommendations[] = [
                    'title' => 'Tambahkan Kalium',
                    'subtitle' => 'Kalium rendah',
                    'detail' => "Nilai K Anda {$potassium}%. Gunakan pupuk K (mis. KCl) atau abu tanaman untuk memperbaiki K.",
                    'source' => 'Soil Sense Advisor'
                ];
            }
        }

        // Moisture recommendations
        if (!is_null($moisture)) {
            if ($moisture < 40) {
                $recommendations[] = [
                    'title' => 'Perbaiki Pengairan',
                    'subtitle' => 'Kelembaban rendah',
                    'detail' => "Kelembaban tanah {$moisture}%. Pertimbangkan penyiraman terjadwal atau mulsa untuk mempertahankan kelembaban.",
                    'source' => 'Soil Sense Advisor'
                ];
            } elseif ($moisture > 80) {
                $recommendations[] = [
                    'title' => 'Kelembaban Tinggi',
                    'subtitle' => 'Drainase',
                    'detail' => "Kelembaban tanah {$moisture}%. Pastikan drainase baik untuk mencegah pembusukan akar.",
                    'source' => 'Soil Sense Advisor'
                ];
            }
        }

        // Generic recommendation when none triggered
        if (count($recommendations) === 0) {
            $recommendations[] = [
                'title' => 'Pemeliharaan Umum',
                'subtitle' => 'Tanah seimbang',
                'detail' => 'Nilai nutrisi dan kelembaban berada dalam kisaran baik. Pertahankan praktik pemupukan organik dan rotasi tanaman.',
                'source' => 'Soil Sense Advisor'
            ];
        }

        // Prepare view data
        $viewData = array_merge($vals, ['recommendations' => $recommendations]);
        return view('hasil_cek_tanah', $viewData);
    }
}
