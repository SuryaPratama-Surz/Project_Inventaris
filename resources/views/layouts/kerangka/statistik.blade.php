<div class="row">
    <div class="col-md-8">
    <div class="card card-round">
        <div class="card-header">
        <div class="card-head-row">
            <div class="card-title">
                                     Statistik Barang 
                <p class="text-muted">Update terakhir: {{ date('d M Y, H:i') }}</p>
            </div>
        </div>
        </div>
        <div class="card-body">
        <div class="chart-container" style="min-height: 375px">
            <canvas id="statisticsChart"></canvas>
        </div>
        <div id="myChartLegend"></div>
        </div>
    </div>
    </div>
</div>

 <div>
@php
$barangMasuk = \App\Models\BarangMasuks::sum('jumlah');
$barangKeluar = \App\Models\BarangKeluar::sum('jumlah');
$barangDipinjam = \App\Models\Peminjamans::sum('jumlah');
$barangTotal = \App\Models\DataPusats::count();
@endphp
<script>
document.addEventListener("DOMContentLoaded", function() {
var ctx = document.getElementById('statisticsChart').getContext('2d');
var statisticsChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: ['Barang Dipinjam','Jenis Barang Terdata','Barang Masuk', 'Barang Keluar' ],
    datasets: [{
        label: 'Jumlah',
        data: [
        {{ $barangDipinjam }},
        {{ $barangTotal }},
        {{ $barangMasuk }},
        {{ $barangKeluar }}
        
        ],
        backgroundColor: [
        'rgba(243, 84, 93, 0.7)',    
        'rgba(23, 125, 255, 0.7)',
        'rgba(40, 167, 69, 0.7)',
        'rgba(255, 165, 52, 1)'
        
        ],
        borderColor: [
        'rgba(243, 84, 93, 1)',
        'rgba(23, 125, 255, 1)',
        'rgba(40, 167, 69, 1)',
        'rgba(255, 165, 52, 1)'
        ],
        borderWidth: 1
    }]
    },
    options: {
    responsive: true,
    plugins: {
        legend: { display: false }
    },
    scales: {
        y: {
        beginAtZero: true,
        ticks: {
            precision:0
        }
        }
    }
    }
});
});
</script>