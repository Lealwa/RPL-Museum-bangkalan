<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject }}</title>
</head>
<body>
    <h1>{{ $subject }}</h1>
    <p>Terima kasih atas pembayaran Anda. Berikut adalah detail tiket Anda:</p>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID Tiket</th>
                <th>Nama Acara</th>
                <th>Kadaluarsa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket['ticket_id'] }}</td>
                <td>{{ $ticket['event_name'] }}</td>
                <td>{{ $ticket['event_date'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>ID Pemesanan: {{ $pemesanan_id }}</p>
</body>
</html>
