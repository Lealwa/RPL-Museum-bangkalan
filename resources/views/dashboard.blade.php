<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="left">
            <a href="/dashboard">Statistik</a>
            <a href="/info">Tiket</a>
        </div>
        <form action="{{ route('akun.logout') }}" method="post">
        @csrf
        <button type="submit" name="logout">Log Out</button>
        </form>
    </div>

    <div class="content">
        <h1>Dashboard Admin</h1>
        
        <h2>Data Tabel</h2>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah Pengunjung</th>
                    <th>Tiket Terjual</th>
                    <th>Pemasukan</th>
                    <th>Pengeluaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($newPemesanan as $pemesanan)
                <tr>
                    <td>{{ date('Y-m-d', strtotime($pemesanan['tanggal'])) }}</td>
                    <td>{{ $pemesanan['total_tiket'] }}</td>
                    <td>{{ $pemesanan['total_tiket']}}</td>
                    <td>{{ $pemesanan['total_harga'] }}</td>
                    <td>0</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2 id="statistik">Diagram Pemasukan dan Pengeluaran</h2>
        <canvas id="financeChart" width="400" height="200"></canvas>

        <h2 id="tiket">Diagram Jumlah Pengunjung dan Tiket Terjual</h2>
        <canvas id="visitorChart" width="400" height="200"></canvas>
    </div>

    <script>
        // Convert PHP data to JavaScript
        const newPemesanan = @json(array_values($newPemesanan));

        // Extract labels (dates) and data (totals) from newPemesanan
        const labels = newPemesanan.map(item => item.tanggal);
        const pemasukanData = newPemesanan.map(item => item.total_harga);
        const pengeluaranData = newPemesanan.map(item => item.total_tiket);  // Assuming total_tiket as pengeluaran for example

        // Data untuk chart keuangan
        const financeCtx = document.getElementById('financeChart').getContext('2d');
        const financeData = {
            labels: labels,
            datasets: [
                {
                    label: 'Pemasukan',
                    data: pemasukanData,
                    backgroundColor: 'rgba(255, 206, 86, 0.6)',
                },
                {
                    label: 'Pengeluaran',
                    data: pengeluaranData,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                }
            ]
        };
        const financeConfig = {
            type: 'bar',
            data: financeData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        };
        new Chart(financeCtx, financeConfig);

        // Data untuk chart pengunjung dan tiket
        const visitorCtx = document.getElementById('visitorChart').getContext('2d');
        const visitorData = {
            labels: labels, // Using the same labels (dates) as financeData
            datasets: [
                {
                    label: 'Jumlah Pengunjung',
                    data: newPemesanan.map(item => item.total_tiket), // Assuming total_tiket as jumlah pengunjung for example
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                },
                {
                    label: 'Tiket Terjual',
                    data: newPemesanan.map(item => item.total_tiket), // Assuming total_tiket as tiket terjual for example
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                }
            ]
        };
        const visitorConfig = {
            type: 'bar',
            data: visitorData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        };
        new Chart(visitorCtx, visitorConfig);
    </script>
</body>
</html>
