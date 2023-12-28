<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Transaksi</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="card" style="margin: 2rem 0rem">
                <div class="card-header">
                    Venturo - Laporan penjualan tahunan per menu
                </div>
                <div class="card-body">
                        <form action="{{route('transaction.index')}}" method="get">
                            <div class="row">
                                <div class="col-2">
                                    <select id="my-select" class="form-control" name="tahun">
                                        <option value="">Pilih Tahun</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>    
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-primary" type="submit">Tampilkan</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table class="table table-bordered" style="font-size: 12px" id="transactionTable">
                            <thead class="table-dark">
                                <tr>
                                    <th rowspan="2" class="align-middle text-center" >Menu</th>
                                    <th colspan="13" class="text-center">Periode Pada @if (!empty($collection))
                                        {{$collection['tahun']}}
                                    @endif</th>
                                </tr>
                                <tr>
                                    <th>Jan</th>
                                    <th>Feb</th>
                                    <th>Mar</th>
                                    <th>Apr</th>
                                    <th>Mei</th>
                                    <th>Jun</th>
                                    <th>Jul</th>
                                    <th>Ags</th>
                                    <th>Sep</th>
                                    <th>Okt</th>
                                    <th>Nov</th>
                                    <th>Des</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($collection))
                                    <td style="background: lightgrey" colspan="14"><b>Makanan</b></td>
                                    @foreach ($collection['makanan'] as $kM => $vM)
                                    <tr>
                                        <td>{{$kM}}</td>
                                        <td>{{($vM['jan']!=0)?number_format($vM['jan'],0,'.',','):''}}</td>
                                        <td>{{($vM['feb']!=0)?number_format($vM['feb'],0,'.',','):''}}</td>
                                        <td>{{($vM['mar']!=0)?number_format($vM['mar'],0,'.',','):''}}</td>
                                        <td>{{($vM['apr']!=0)?number_format($vM['apr'],0,'.',','):''}}</td>
                                        <td>{{($vM['mei']!=0)?number_format($vM['mei'],0,'.',','):''}}</td>
                                        <td>{{($vM['jun']!=0)?number_format($vM['jun'],0,'.',','):''}}</td>
                                        <td>{{($vM['jul']!=0)?number_format($vM['jul'],0,'.',','):''}}</td>
                                        <td>{{($vM['ags']!=0)?number_format($vM['ags'],0,'.',','):''}}</td>
                                        <td>{{($vM['sep']!=0)?number_format($vM['sep'],0,'.',','):''}}</td>
                                        <td>{{($vM['okt']!=0)?number_format($vM['okt'],0,'.',','):''}}</td>
                                        <td>{{($vM['nov']!=0)?number_format($vM['nov'],0,'.',','):''}}</td>
                                        <td>{{($vM['des']!=0)?number_format($vM['des'],0,'.',','):''}}</td>
                                        <td><b>{{($vM['total']!=0)?number_format($vM['total'],0,'.',','):''}}</b></td>
                                    </tr>
                                    @endforeach
                                    <td style="background: lightgrey" colspan="14"><b>Minuman</b></td>
                                    @foreach ($collection['minuman'] as $kM => $vM)
                                    <tr>
                                        <td>{{$kM}}</td>
                                        <td>{{($vM['jan']!=0)?number_format($vM['jan'],0,'.',','):''}}</td>
                                        <td>{{($vM['feb']!=0)?number_format($vM['feb'],0,'.',','):''}}</td>
                                        <td>{{($vM['mar']!=0)?number_format($vM['mar'],0,'.',','):''}}</td>
                                        <td>{{($vM['apr']!=0)?number_format($vM['apr'],0,'.',','):''}}</td>
                                        <td>{{($vM['mei']!=0)?number_format($vM['mei'],0,'.',','):''}}</td>
                                        <td>{{($vM['jun']!=0)?number_format($vM['jun'],0,'.',','):''}}</td>
                                        <td>{{($vM['jul']!=0)?number_format($vM['jul'],0,'.',','):''}}</td>
                                        <td>{{($vM['ags']!=0)?number_format($vM['ags'],0,'.',','):''}}</td>
                                        <td>{{($vM['sep']!=0)?number_format($vM['sep'],0,'.',','):''}}</td>
                                        <td>{{($vM['okt']!=0)?number_format($vM['okt'],0,'.',','):''}}</td>
                                        <td>{{($vM['nov']!=0)?number_format($vM['nov'],0,'.',','):''}}</td>
                                        <td>{{($vM['des']!=0)?number_format($vM['des'],0,'.',','):''}}</td>
                                        <td><b>{{($vM['total']!=0)?number_format($vM['total'],0,'.',','):''}}</b></td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        
    </body>
</html>
<script type="module">

    // $('#transactionTable').show()
</script>