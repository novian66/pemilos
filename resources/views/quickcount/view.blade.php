@extends('layouts.theme.master')
@section('title')
    QuickCount
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-4">
                    <div class="mt-3">
                        <div class="card card-sm p-2">
                            <canvas id="myChart" height="100" width="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-3">
                        <div class="card card-sm p-2">
                            <canvas id="totalChart" height="100" width="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="page-pretitle mt-3">
                        {{ $election->school->nama }}
                    </div>
                    <h2 class="page-title mb-3">
                        {{ $election->title }}
                    </h2>
                    @foreach ($list_candidate as $item)
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="avatar"
                                                style="background-image: url({{ asset('dist/img/candidate/' . $item->poster) }})"></span>
                                        </div>
                                        <div class="col">
                                            <div class="card-title">{{ $item->nama }}</div>
                                            <div class="card-subtitle">Paslon : {{ $item->urutan }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-actions">
                                    <button type="button" class="btn">
                                        Suara : {{ count($item->hitung) }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
        <script type="text/javascript">
            var ctx = document.getElementById('myChart').getContext('2d');
            const paslon = JSON.parse(`<?php echo $paslon; ?>`);
            const suara = JSON.parse(`<?php echo $suara; ?>`);

            // The data for our dataset
            const data = {
                labels: paslon,
                datasets: [{
                    label: 'My First Dataset',
                    data: suara,
                    backgroundColor: ['#4dc9f6',
                        '#f67019',
                        '#f53794',
                        '#537bc4',
                        '#acc236',
                        '#166a8f',
                        '#00a950',
                        '#58595b',
                        '#8549ba'
                    ],
                    hoverOffset: 4
                }]
            };

            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'doughnut',
                data: data,
                // Configuration options
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Rekapitulasi'
                        }
                    }
                },
            });
        </script>

        <script type="text/javascript">
            var get_total = document.getElementById('totalChart').getContext('2d');
            const suara_masuk = JSON.parse(`<?php echo $suara_masuk; ?>`);
            const total_pemilih = JSON.parse(`<?php echo $total_pemilih; ?>`);

            // The data for our dataset
            const data_total = {
                labels: ['Total Pemilih', 'Suara Masuk'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [
                        total_pemilih, suara_masuk
                    ],
                    backgroundColor: [
                        '#00a950',
                        '#58595b',
                        '#8549ba'
                    ],
                    hoverOffset: 4
                }]
            };

            var totalchart = new Chart(get_total, {
                // The type of chart we want to create
                type: 'doughnut',
                data: data_total,
                // Configuration options
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Diagram Pemilih'
                        }
                    }
                },
            });
        </script>
    @endsection
