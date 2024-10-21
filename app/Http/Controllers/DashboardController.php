<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'p*.required' => 'Wajib di isi'
        ];

        $request->validate(
            array_fill_keys(
                array_map(fn($i) => 'p' . $i, range(1, 6)),
                'required'
            ),
            $messages
        );

        // Mengambil semua data dari request kecuali "_token"
        $inputData = $request->except('_token');

        $jawaban = [];

        foreach ($inputData as $key => $value) {
            switch ($value) {
                case 'A':
                    $jawaban[$key] = 2;
                    break;
                case 'B':
                    $jawaban[$key] = 1;
                    break;
            }
        }

        $Urgensi = [0.6, 0.4];

        $Beras_kencur = ($jawaban['p1'] * $Urgensi[0]) + ($jawaban['p2'] * $Urgensi[1]);
        $kunir_asem = ($jawaban['p3'] * $Urgensi[0]) + ($jawaban['p2'] * $Urgensi[1]);
        $temulawak = ($jawaban['p4'] * $Urgensi[0]) + ($jawaban['p5'] * $Urgensi[1]);
        $jahe = ($jawaban['p6'] * $Urgensi[0]) + ($jawaban['p2'] * $Urgensi[1]);

        $total = $Beras_kencur + $kunir_asem + $temulawak + $jahe;

        $presentase_BerasKencur = ($Beras_kencur / $total) * 100;
        $presentase_KunirAsem = ($kunir_asem / $total) * 100;
        $presentase_Temulawak = ($temulawak / $total) * 100;
        $presentase_Jahe = ($jahe / $total) * 100;

        $tampilHasil_BerasKencur = ['Beras Kencur', 'Nampaknya anda kurang nafsu makan atau Sedang menjaga imun tubuh', $presentase_BerasKencur];
        $tampilHasil_Kunir_asem = ['Kunir Asem', 'Nampaknya anda sedang Pegelinu atau Sedang menjaga imun tubuh', $presentase_KunirAsem];
        $tampilHasil_Temulawak = ['Temulawak', 'Nampaknya anda mengalamai gangguan Lambung atau gangguan pencernaan', $presentase_Temulawak];
        $tampilHasil_Jahe = ['Jahe', 'Nampaknya anda sedang masuk angin', $presentase_Jahe];

        $data = [
            $tampilHasil_BerasKencur,
            $tampilHasil_Kunir_asem,
            $tampilHasil_Temulawak,
            $tampilHasil_Jahe,
        ];

        $data = collect($data)->sortByDesc(function ($item) {
            return $item[2];
        })->values()->all();

        $firebaseData = [
            'Jamu' => $data[0][0], // Mengambil nilai 'Beras Kencur'
            'Keterangan' => $data[0][1],
            'Nilai' => $data[0][2],
        ];

        $response = Http::put('https://dahatech-5f699-default-rtdb.asia-southeast1.firebasedatabase.app/data.json', $firebaseData);

        return view('Hasil', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
