@extends('layouts.admin')

@section('content')

<!-- Ringkasan Statistik -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        @php
            $stats = [
                ['icon' => 'fa-chart-line', 'label' => 'Siswa Keterima', 'value' => $keterima],
                ['icon' => 'fa-chart-bar', 'label' => 'Siswa Ketolak', 'value' => $jumlahDitolak],
                ['icon' => 'fa-chart-area', 'label' => 'Total Siswa', 'value' => $jumlahSiswa],
                ['icon' => 'fa-chart-pie', 'label' => 'Jumlah Eskul', 'value' => $jumlahEskul],
            ];
        @endphp

        @foreach ($stats as $stat)
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa {{ $stat['icon'] }} fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">{{ $stat['label'] }}</p>
                        <h6 class="mb-0">{{ $stat['value'] }}</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Chart Section -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary text-center rounded p-4">
                <h6 class="mb-4">Statistik Penerimaan per Eskul</h6>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary text-center rounded p-4">
                <h6 class="mb-4">Total Diterima vs Ditolak</h6>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <div class="d-flex align-items-center justify-content-between">
            <p class="mb-2">© <a href="#">TheSilentRoot</a> // encrypted & silent since 2025.</p>
            <p class="mb-0">Designed by <a href="#"><i>{{ Auth::user()->name }}</i></a> <span>ESKUL</span></p>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const eskulLabels = ['Basket', 'Futsal', 'PMR', 'Pramuka', 'Paskibra'];
    const diterima = [10, 15, 8, 12, 6];
    const ditolak = [2, 1, 3, 0, 4];

    const ctx1 = document.getElementById('worldwide-sales').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: eskulLabels,
            datasets: [
                {
                    label: 'Diterima',
                    data: diterima,
                    backgroundColor: 'rgba(40, 167, 69, 0.8)',
                },
                {
                    label: 'Ditolak',
                    data: ditolak,
                    backgroundColor: 'rgba(220, 53, 69, 0.8)',
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                }
            },
            scales: {
                x: {
                    ticks: { color: 'white' }
                },
                y: {
                    beginAtZero: true,
                    ticks: { color: 'white' }
                }
            }
        }
    });

    const ctx2 = document.getElementById('salse-revenue').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Diterima', 'Ditolak'],
            datasets: [{
                data: [
                    diterima.reduce((a, b) => a + b, 0),
                    ditolak.reduce((a, b) => a + b, 0)
                ],
                backgroundColor: [
                    'rgba(40, 167, 69, 0.8)',
                    'rgba(220, 53, 69, 0.8)'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                }
            }
        }
    });
</script>
@endsection
