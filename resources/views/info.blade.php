<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/info.css">
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
        
        <h2>Data Transaksi</h2>
        <table id="transactionTable">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Nama</th>
                    <th>Nomor WA</th>
                    <th>Jumlah Pembelian</th>
                    <th>Tindakan</th>
                </tr>
            </thead>

            @foreach($history as $psn)
            <tbody>
                <td>{{ $psn->id }}</td>
                <td>
                    {{ $psn->nama }}
                </td>
                <td>
                    {{ $psn->no }}
                </td>
                <td>
                    {{ $psn->total_tiket }}
                </td>
                <td class="actions">
                    <form action="{{ route('info') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ $psn->id }}" name="tiketID" hidden>
                        <button type="submit" name="delete">Hapus</button>
                    </form>
                </td>
            </tbody>
            @endforeach
        </table>

        <div class="pagination" id="pagination">
            <!-- Nomor halaman akan dimasukkan di sini oleh JavaScript -->
        </div>
        
        <h2>Transaksi yang Sedang Berlangsung</h2>
        <table id="ongoingTransactionTable">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Nama</th>
                    <th>Nomor WA</th>
                    <th>Jumlah Pembelian</th>
                    <th>Total Pembayaran</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            @foreach($pemesanan as $psn)
            @if($psn->status == '1')
            <tbody>
                <td>{{ $psn->id }}</td>
                <td>
                    {{ $psn->Pengguna->name }}
                </td>
                <td>
                    {{ $psn->Pengguna->no }}
                </td>
                <td>
                    {{ $psn->total_tiket }}
                </td>
                <td>
                    {{ $psn->total_harga }}
                </td>
                <td class="actions">
                    <form action="{{ route('info.accept') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ $psn->id }}" name="tiketID" hidden>
                        <input type="text" value="{{ $psn->tiket_id }}" name="IDtiket" hidden>
                        <button type="submit" name="accept">Accept</button>
                        <button type="submit" name="delete">Hapus</button>
                    </form>
                </td>
            </tbody>
            @endif
            @endforeach
        </table>
    </div>

    <script>
        // Contoh data transaksi
        const transactions = [
            { id: 1, name: 'Alice', wa: '081234567890', amount: '5', actions: '' },
            { id: 2, name: 'Bob', wa: '081234567891', amount: '3', actions: '' },
            { id: 3, name: 'Charlie', wa: '081234567892', amount: '8', actions: '' },
            { id: 4, name: 'David', wa: '081234567893', amount: '2', actions: '' },
            { id: 5, name: 'Eve', wa: '081234567894', amount: '10', actions: '' },
            { id: 6, name: 'Frank', wa: '081234567895', amount: '7', actions: '' },
            { id: 7, name: 'Grace', wa: '081234567896', amount: '4', actions: '' },
            { id: 8, name: 'Heidi', wa: '081234567897', amount: '9', actions: '' },
            { id: 9, name: 'Ivan', wa: '081234567898', amount: '6', actions: '' },
            { id: 10, name: 'Judy', wa: '081234567899', amount: '1', actions: '' }
        ];

        const ongoingTransactions = [
            { id: 11, name: 'Kevin', wa: '081234567810', amount: '4', actions: '' },
            { id: 12, name: 'Laura', wa: '081234567811', amount: '6', actions: '' }
        ];

        const rowsPerPage = 5;
        let currentPage = 1;

        function renderTable(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const paginatedItems = transactions.slice(start, end);

            const tableBody = document.getElementById('transactionTableBody');
            tableBody.innerHTML = '';

            paginatedItems.forEach(transaction => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${transaction.id}</td>
                    <td>${transaction.name}</td>
                    <td>${transaction.wa}</td>
                    <td>${transaction.amount}</td>
                    <td class="actions">
                        <button onclick="editTransaction(${transaction.id})">Edit</button>
                        <button onclick="deleteTransaction(${transaction.id})">Hapus</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            const totalPages = Math.ceil(transactions.length / rowsPerPage);
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.innerText = i;
                if (i === page) {
                    button.classList.add('active');
                }
                button.onclick = () => changePage(i);
                pagination.appendChild(button);
            }
        }

        function renderOngoingTransactions() {
            const tableBody = document.getElementById('ongoingTransactionTableBody');
            tableBody.innerHTML = '';

            ongoingTransactions.forEach(transaction => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${transaction.id}</td>
                    <td>${transaction.name}</td>
                    <td>${transaction.wa}</td>
                    <td>${transaction.amount}</td>
                    <td class="actions">
                        <button onclick="acceptTransaction(${transaction.id})">Accept</button>
                        <button onclick="declineTransaction(${transaction.id})">Decline</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        function changePage(page) {
            currentPage = page;
            renderTable(page);
        }

        function editTransaction(id) {
            alert('Edit transaksi dengan ID: ' + id);
        }

        function deleteTransaction(id) {
            const index = transactions.findIndex(transaction => transaction.id === id);
            if (index !== -1) {
                transactions.splice(index, 1);
                renderTable(currentPage);
                const totalPages = Math.ceil(transactions.length / rowsPerPage);
                if (currentPage > totalPages) {
                    changePage(totalPages);
                }
            }
        }

        function acceptTransaction(id) {
            alert('Transaksi dengan ID: ' + id + ' telah diterima.');
        }

        function declineTransaction(id) {
            const index = ongoingTransactions.findIndex(transaction => transaction.id === id);
            if (index !== -1) {
                ongoingTransactions.splice(index, 1);
                renderOngoingTransactions();
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderTable(currentPage);
            renderOngoingTransactions();
        });
    </script>
</body>
</html>
