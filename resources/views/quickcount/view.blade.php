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
                <div class="col-md-8">
                    <div class="mt-3">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            {{ $election->school->nama }}
                        </div>
                        <h2 class="page-title mb-3">
                            {{ $election->title }}
                        </h2>
                        <div class="row">
                            @foreach ($list_candidate as $item)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body p-4 text-center">
                                            <span class="avatar avatar-xl mb-3 avatar-rounded"
                                                style="background-image: url({{ asset('dist/img/candidate/'. $item->poster) }})"></span>
                                            <h3 class="m-0 mb-1">{{ $item->nama }}</h3>
                                            <div class="text-muted">Urutan Ke : {{ $item->urutan }}</div>
                                            <div class="mt-3">
                                                <span class="badge bg-sencodary-lt">Jumlah Suara :
                                                    {{ count($item->hitung) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
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
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
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
                layout: {
                    padding: 10,
                },
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Precipitation in Toronto'
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Precipitation in mm'
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Month of the Year'
                        }
                    }]
                }
            }
        });
    </script>
@endsection
