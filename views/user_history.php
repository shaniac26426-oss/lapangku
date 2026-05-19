<?php
// Ambil riwayat pemesanan pengguna
require_once '../config/db.php';

// Misal dalam user_history.php, ambil data dan biaya booking
$query = "SELECT r.*, f.*, HitungTotalBiaya(r.field_id, TIMESTAMPDIFF(HOUR, r.start_time, r.end_time)) AS biaya
          FROM reservations r
          JOIN fields f ON r.field_id = f.id
          WHERE r.user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
while ($row = $stmt->fetch()) {
    echo "Biaya sewa: Rp " . number_format($row['biaya'], 0, ',', '.') . "<br>";
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan | RentSport</title>
</head>
<body>

<div class="container">
    <h2 class="text-center">Riwayat Pemesanan</h2>

    <?php foreach ($reservations as $reservation): ?>
        <div class="reservation-item">
            <h4>Lapangan: <?php echo $reservation['field_name']; ?></h4>
            <p>Waktu Mulai: <?php echo $reservation['start_time']; ?></p>
            <p>Waktu Selesai: <?php echo $reservation['end_time']; ?></p>
            <p>Status: <?php echo $reservation['status']; ?></p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
