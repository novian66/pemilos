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
                {{-- <div class="col-md-4">
                    <div class="mt-3">
                        <div class="card card-sm p-2">
                            <canvas id="totalChart" height="100" width="100"></canvas>
                        </div>
                    </div>
                </div> --}}




                <div class="col-md-8">
                    <div class="page-pretitle mt-3">
                        {{ $election->school->nama }}
                    </div>
                    <h2 class="page-title mb-3">
                        {{ $election->title }}
                    </h2>
                    @foreach ($list_candidate as $key =>  $item)
                        <div class="card {{ $key != 0 ? 'mt-3' : ''}}">
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
             
            <br>
            <div class="row">

                <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Rekapitulasi Per Group</h3>
                      </div>
                      <div class="card-body">
                        <div class="row">
                            @foreach ($recapByCandidate as $key =>  $item)
                            <div class="col-md-4">
                                <div class="mt-3">
                                    <div class="card card-sm p-2">
                                        <canvas id="{{ $item['id-chart'] }}" height="100" width="100"></canvas>
                                    </div>
                                </div>
                            </div> 
                            @endforeach
                        </div>
                        
                      </div>
                      <div class="card-footer text-end">
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



            @foreach ($recapByCandidate as $key =>  $item)
                    var {{ $item['id-chart'] }} = document.getElementById('{{ $item["id-chart"] }}').getContext('2d');
                    var name_candidate = JSON.parse(`<?php echo $item['data_name_json']; ?>`); 
                    var voted = JSON.parse(`<?php echo $item['data_voted_json']; ?>`);
                    var color = JSON.parse(`<?php echo $item['data_color_json']; ?>`);
                    const dataRecapByCandidate{{ $item['id-chart'] }} = {
                        labels: name_candidate,
                        datasets:
                        [{
                            label: 'My First Dataset',
                            data: voted,
                            backgroundColor: color,
                            hoverOffset: 4
                        }]
                    };

                    var chart = new Chart({{ $item['id-chart'] }}, {
                        // The type of chart we want to create
                        type: 'pie',
                        data: dataRecapByCandidate{{ $item['id-chart'] }},
                        // Configuration options
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Rekapitulasi {{ $key }}'
                                }
                            }
                        },
                    });

                @endforeach


        </script>

        // <script type="text/javascript">
        //     var get_total = document.getElementById('totalChart').getContext('2d');
        //     const suara_masuk = JSON.parse(`<?php echo $suara_masuk; ?>`);
        //     const total_pemilih = JSON.parse(`<?php echo $total_pemilih; ?>`);
        //     const pria = JSON.parse(`<?php echo $pria; ?>`);
        //     const wanita = JSON.parse(`<?php echo $wanita; ?>`);

        //     // The data for our dataset
        //     const data_total = {
        //         labels: ['Total Pemilih', 'Suara Masuk', 'Laki - Laki', 'Perempuan'],
        //         datasets: [{
        //             label: 'My First Dataset',
        //             data: [
        //                 total_pemilih, suara_masuk, pria, wanita
        //             ],
        //             backgroundColor: [
        //                 '#f67019',
        //                 '#f53794',
        //                 '#537bc4',
        //                 '#acc236',
        //             ],
        //             hoverOffset: 4
        //         }]
        //     };

        //     var totalchart = new Chart(get_total, {
        //         // The type of chart we want to create
        //         type: 'doughnut',
        //         data: data_total,
        //         // Configuration options
        //         options: {
        //             responsive: true,
        //             plugins: {
        //                 legend: {
        //                     position: 'top',
        //                 },
        //                 title: {
        //                     display: true,
        //                     text: 'Diagram Pemilih'
        //                 }
        //             }
        //         },
        //     });
        // </script>
    @endsection
