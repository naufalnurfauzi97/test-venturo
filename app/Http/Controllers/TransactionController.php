<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $responseData = Http::get("https://tes-web.landa.id/intermediate/transaksi?tahun=" . $request->tahun);
        $responseMenu = Http::get("https://tes-web.landa.id/intermediate/menu");
        $jsonData = $responseData->json();
        $arrayData = json_decode($responseData, true);
        $arrayMenu = json_decode($responseMenu, true);
        // $menu = array_unique(array_column($arrayData, "menu"));
        $menu = [];
        foreach ($arrayMenu as $key => $value) {
            if ($value['kategori'] == 'makanan') {
                $menu['makanan'][] = $value['menu'];
            } else {
                $menu['minuman'][] = $value['menu'];
            }
        }

        $collection = ['tahun' => $request->tahun, 'makanan' => [], 'minuman' => []];
        // dd($menu);
        if (!empty($arrayData)) {
            foreach ($menu['makanan'] as $menuItem) {
                $collection['makanan'][$menuItem] = [
                    'jan' => 0,
                    'feb' => 0,
                    'mar' => 0,
                    'apr' => 0,
                    'mei' => 0,
                    'jun' => 0,
                    'jul' => 0,
                    'ags' => 0,
                    'sep' => 0,
                    'okt' => 0,
                    'nov' => 0,
                    'des' => 0,
                    'total' => 0,
                ];
                foreach ($arrayData as $data) {
                    if ($data['menu'] == $menuItem) {
                        $month = date("n", strtotime($data["tanggal"]));
                        $collection['makanan'][$menuItem]["total"] += $data["total"];
                        switch ($month) {
                            case 1:
                                $collection['makanan'][$menuItem]["jan"] += $data["total"];
                                break;
                            case 2:
                                $collection['makanan'][$menuItem]["feb"] += $data["total"];
                                break;
                            case 3:
                                $collection['makanan'][$menuItem]["mar"] += $data["total"];
                                break;
                            case 4:
                                $collection['makanan'][$menuItem]["apr"] += $data["total"];
                                break;
                            case 5:
                                $collection['makanan'][$menuItem]["mei"] += $data["total"];
                                break;
                            case 6:
                                $collection['makanan'][$menuItem]["jun"] += $data["total"];
                                break;
                            case 7:
                                $collection['makanan'][$menuItem]["jul"] += $data["total"];
                                break;
                            case 8:
                                $collection['makanan'][$menuItem]["ags"] += $data["total"];
                                break;
                            case 9:
                                $collection['makanan'][$menuItem]["sep"] += $data["total"];
                                break;
                            case 10:
                                $collection['makanan'][$menuItem]["okt"] += $data["total"];
                                break;
                            case 11:
                                $collection['makanan'][$menuItem]["nov"] += $data["total"];
                                break;
                            case 12:
                                $collection['makanan'][$menuItem]["des"] += $data["total"];
                                break;
                        }
                    }
                }
            }

            foreach ($menu['minuman'] as $menuItem) {
                $collection['minuman'][$menuItem] = [
                    'jan' => 0,
                    'feb' => 0,
                    'mar' => 0,
                    'apr' => 0,
                    'mei' => 0,
                    'jun' => 0,
                    'jul' => 0,
                    'ags' => 0,
                    'sep' => 0,
                    'okt' => 0,
                    'nov' => 0,
                    'des' => 0,
                    'total' => 0,
                ];
                foreach ($arrayData as $data) {
                    if ($data['menu'] == $menuItem) {
                        $month = date("n", strtotime($data["tanggal"]));
                        $collection['minuman'][$menuItem]["total"] += $data["total"];
                        switch ($month) {
                            case 1:
                                $collection['minuman'][$menuItem]["jan"] += $data["total"];
                                break;
                            case 2:
                                $collection['minuman'][$menuItem]["feb"] += $data["total"];
                                break;
                            case 3:
                                $collection['minuman'][$menuItem]["mar"] += $data["total"];
                                break;
                            case 4:
                                $collection['minuman'][$menuItem]["apr"] += $data["total"];
                                break;
                            case 5:
                                $collection['minuman'][$menuItem]["mei"] += $data["total"];
                                break;
                            case 6:
                                $collection['minuman'][$menuItem]["jun"] += $data["total"];
                                break;
                            case 7:
                                $collection['minuman'][$menuItem]["jul"] += $data["total"];
                                break;
                            case 8:
                                $collection['minuman'][$menuItem]["ags"] += $data["total"];
                                break;
                            case 9:
                                $collection['minuman'][$menuItem]["sep"] += $data["total"];
                                break;
                            case 10:
                                $collection['minuman'][$menuItem]["okt"] += $data["total"];
                                break;
                            case 11:
                                $collection['minuman'][$menuItem]["nov"] += $data["total"];
                                break;
                            case 12:
                                $collection['minuman'][$menuItem]["des"] += $data["total"];
                                break;
                        }
                    }
                }
            }
        }

        array_map(function ($item) {
            $item['jan'] = ($item['jan'] != 0) ? number_format($item['jan'], 0, ".", ",") : '';
            $item['feb'] = ($item['feb'] != 0) ? number_format($item['feb'], 0, ".", ",") : '';
            $item['mar'] = ($item['mar'] != 0) ? number_format($item['mar'], 0, ".", ",") : '';
            $item['apr'] = ($item['apr'] != 0) ? number_format($item['apr'], 0, ".", ",") : '';
            $item['mei'] = ($item['mei'] != 0) ? number_format($item['mei'], 0, ".", ",") : '';
            $item['jun'] = ($item['jun'] != 0) ? number_format($item['jun'], 0, ".", ",") : '';
            $item['jul'] = ($item['jul'] != 0) ? number_format($item['jul'], 0, ".", ",") : '';
            $item['ags'] = ($item['ags'] != 0) ? number_format($item['ags'], 0, ".", ",") : '';
            $item['sep'] = ($item['sep'] != 0) ? number_format($item['sep'], 0, ".", ",") : '';
            $item['okt'] = ($item['okt'] != 0) ? number_format($item['okt'], 0, ".", ",") : '';
            $item['nov'] = ($item['nov'] != 0) ? number_format($item['nov'], 0, ".", ",") : '';
            $item['des'] = ($item['des'] != 0) ? number_format($item['des'], 0, ".", ",") : '';
            // echo $item['jan'];
        }, $collection['makanan']);
        // foreach ($collection['makanan'] as $key => $item) {
        //     print_r($key . ' ' . $item["jan"] . '<br>');
        // }
        // dd($collection);
        // die;
        // dd($jsonData);
        return view("index", compact('collection'));
    }

    public function indexTable()
    {
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
        //
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
