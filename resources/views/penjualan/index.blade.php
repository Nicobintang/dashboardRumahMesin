<!DOCTYPE html>
<html>
<head>
   <title>Dashboard Penjualan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">📊 Dashboard Penjualan Rumah Mesin</h1>
        <p class="text-muted">Laporan penjualan berdasarkan data transaksi</p>
    </div>

    <!-- Total Penjualan -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body text-center">
            <h4>Total Penjualan</h4>
            <h2 class="text-success fw-bold">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</h2>
        </div>
    </div>

        <!-- Ringkasan Statistik -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted mb-1">🧾 Total Penjualan</h6>
                    <h5 class="fw-bold text-success">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted mb-1">📦 Total Item Terjual</h6>
                    <h5 class="fw-bold">{{ $totalItem }} pcs</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted mb-1">💰 Rata-rata Harga</h6>
                    <h5 class="fw-bold">Rp {{ number_format($rataHarga, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted mb-1">📅 Rentang Data</h6>
                    <h6 class="fw-bold text-secondary">
                        {{ $tanggalAwal }} - {{ $tanggalAkhir }}
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Tanggal -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <form method="GET" action="/dashboard" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Dari Tanggal</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Sampai Tanggal</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-4 text-end">
                    <button type="submit" class="btn btn-primary px-4">Filter</button>
                    <a href="/dashboard" class="btn btn-secondary px-4">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Penjualan -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3 fw-semibold">Data Penjualan</h5>
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Tanggal Penjualan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penjualans as $item)
                        <tr>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->tanggal_penjualan }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->jumlah * $item->harga, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Grafik Penjualan -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-3">Grafik Total Penjualan</h5>
            <canvas id="penjualanChart" height="120"></canvas>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js -->
<script>
    const labels = @json($penjualans->pluck('tanggal_penjualan'));
    const data = @json($penjualans->map(fn($item) => $item->jumlah * $item->harga));

    new Chart(document.getElementById('penjualanChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Penjualan',
                data: data,
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13,110,253,0.2)',
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
<footer class="text-center mt-5 py-3 text-muted small">
    <p>© {{ date('Y') }} Dashboard Penjualan — Rumah Mesin By Nico</p>
</footer>

</body>
</html>

</html>
