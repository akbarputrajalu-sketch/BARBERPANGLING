<?php
// Booking CRUD handler (simple, no separate API)
// Uses table `user` with columns: id, nama, No_telepon, layanan, Capster, Tanggal
require_once APP_PATH . 'app/config/database.php';

$message = '';
$error = '';
$editingBooking = null;

// DELETE (via ?delete=ID)
if (isset($_GET['delete'])) {
	$delId = (int) $_GET['delete'];
	if ($delId > 0) {
		$stmt = $koneksi->prepare("DELETE FROM user WHERE id = ?");
		$stmt->bind_param('i', $delId);
		if ($stmt->execute()) {
			$message = 'Booking berhasil dihapus.';
		} else {
			$error = 'Gagal menghapus booking: ' . $stmt->error;
		}
		$stmt->close();
	}
}

// EDIT (load data to prefill form)
if (isset($_GET['edit'])) {
	$editId = (int) $_GET['edit'];
	if ($editId > 0) {
		$stmt = $koneksi->prepare("SELECT id, nama, No_telepon, layanan, Capster, Tanggal FROM user WHERE id = ? LIMIT 1");
		$stmt->bind_param('i', $editId);
		$stmt->execute();
		$res = $stmt->get_result();
		$editingBooking = $res->fetch_assoc();
		$stmt->close();
	}
}

// CREATE / UPDATE (form POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Debug: log POST data
	error_log('🔍 POST received: ' . json_encode($_POST));
	
	$id = isset($_POST['id']) && $_POST['id'] !== '' ? (int) $_POST['id'] : 0;
	$nama = isset($_POST['nama']) ? escapeInput($_POST['nama']) : '';
	$no = isset($_POST['No_telepon']) ? escapeInput($_POST['No_telepon']) : '';
	$layanan = isset($_POST['layanan']) ? escapeInput($_POST['layanan']) : '';
	// Read selected capster from form radio named 'barber' (JS uses name="barber")
	$capster = isset($_POST['barber']) ? escapeInput($_POST['barber']) : '';
	$date = isset($_POST['date']) ? escapeInput($_POST['date']) : '';
	$time = isset($_POST['time']) ? escapeInput($_POST['time']) : '';

	// Build Tanggal as "YYYY-MM-DD HH:MM" if time provided, else date only
	$Tanggal = $date;
	if (!empty($time)) {
		$Tanggal = $date . ' ' . $time;
	}

	// Debug: log extracted values
	error_log("📝 Values: nama=$nama, no=$no, layanan=$layanan, capster=$capster, date=$date, time=$time");

	// Basic validation
	if ($nama === '' || $no === '' || $layanan === '' || $capster === '' || $date === '') {
		$error = 'Mohon isi semua field wajib. (nama=' . $nama . ', no=' . $no . ', layanan=' . $layanan . ', capster=' . $capster . ', date=' . $date . ')';
		error_log('❌ Validation failed: ' . $error);
	} else {
		if ($id > 0) {
			// Update
			$stmt = $koneksi->prepare("UPDATE user SET nama = ?, No_telepon = ?, layanan = ?, Capster = ?, Tanggal = ? WHERE id = ?");
			$stmt->bind_param('sssssi', $nama, $no, $layanan, $capster, $Tanggal, $id);
			if ($stmt->execute()) {
				$message = 'Booking berhasil diperbarui.';
			} else {
				$error = 'Gagal mengupdate booking: ' . $stmt->error;
			}
			$stmt->close();
			// Reload edited booking for form
			$stmt2 = $koneksi->prepare("SELECT id, nama, No_telepon, layanan, Capster, Tanggal FROM user WHERE id = ? LIMIT 1");
			$stmt2->bind_param('i', $id);
			$stmt2->execute();
			$res2 = $stmt2->get_result();
			$editingBooking = $res2->fetch_assoc();
			$stmt2->close();
		} else {
			// Insert
			$stmt = $koneksi->prepare("INSERT INTO user (nama, No_telepon, layanan, Capster, Tanggal) VALUES (?, ?, ?, ?, ?)");
			if (!$stmt) {
				$error = 'Prepare error: ' . $koneksi->error;
				error_log('❌ ' . $error);
			} else {
				$stmt->bind_param('sssss', $nama, $no, $layanan, $capster, $Tanggal);
				if ($stmt->execute()) {
					$message = 'Booking berhasil disimpan.';
					error_log('✅ Insert success: ' . $message);
				} else {
					$error = 'Gagal menyimpan booking: ' . $stmt->error;
					error_log('❌ ' . $error);
				}
				$stmt->close();
			}
		}
	}
}

// Fetch all bookings
$bookings = [];
$res = $koneksi->query("SELECT id, nama, No_telepon, layanan, Capster, Tanggal FROM user ORDER BY id DESC");
if ($res) {
	while ($row = $res->fetch_assoc()) {
		$bookings[] = $row;
	}
}
?>

<!-- Booking Page (view) -->
<section class="section">
	<div class="container">
		<div class="section-title">
			<h2>Booking <span class="highlight">Online</span></h2>
			<p>Reservasi mudah dan cepat untuk pengalaman barbershop terbaik</p>
		</div>

		<?php if ($message): ?>
			<div class="alert success"><?php echo htmlspecialchars($message); ?></div>
		<?php endif; ?>
		<?php if ($error): ?>
			<div class="alert error"><?php echo htmlspecialchars($error); ?></div>
		<?php endif; ?>

		<?php include COMPONENTS_PATH . 'booking-section.php'; ?>

		<hr>

		<h3>Daftar Booking</h3>
		<div class="table-wrapper">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama</th>
						<th>No. Telepon</th>
						<th>Layanan</th>
						<th>Capster</th>
						<th>Tanggal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($bookings) === 0): ?>
						<tr><td colspan="7">Belum ada booking.</td></tr>
					<?php else: ?>
						<?php foreach ($bookings as $b): ?>
							<tr>
								<td><?php echo (int)$b['id']; ?></td>
								<td><?php echo htmlspecialchars($b['nama']); ?></td>
								<td><?php echo htmlspecialchars($b['No_telepon']); ?></td>
								<td><?php echo htmlspecialchars($b['layanan']); ?></td>
								<td><?php echo htmlspecialchars($b['Capster']); ?></td>
								<td><?php echo htmlspecialchars($b['Tanggal']); ?></td>
								<td>
									<a class="btn-small" href="<?php echo BASE_URL; ?>?page=booking&edit=<?php echo (int)$b['id']; ?>">Edit</a>
									<a class="btn-small btn-danger" href="<?php echo BASE_URL; ?>?page=booking&delete=<?php echo (int)$b['id']; ?>" onclick="return confirm('Hapus booking ini?');">Hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
