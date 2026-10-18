<?php
$daftar_mahasiswa = [
    [
        "nim" => "2502601",
        "nama" => "Khoerul Sheva Marsyah Fika",
        "jurusan" => "Pendidikan Sistem dan Teknologi Informasi",
        "email" => "macacantik@upi.edu",
        "nilai" => 100,
        "grade" => "A"
    ],
    [
        "nim" => "2502197",
        "nama" => "Zahra Apriyani Sanjaya",
        "jurusan" => "Pendidikan Guru Sekolah Dasar",
        "email" => "aprilcantik@upi.edu",
        "nilai" => 85,
        "grade" => "B"
    ],
    [
        "nim" => "2502851",
        "nama" => "Fatia Nuri Ramdani",
        "jurusan" => "Mekatronika dan Kecerdasan Buatan",
        "email" => "fatiacantik@upi.edu",
        "nilai" => 90,
        "grade" => "A"
    ],
    [
        "nim" => "2502018",
        "nama" => "Salma Ashilah",
        "jurusan" => "Sistem Telekomunikasi",
        "email" => "salmacantik@upi.edu",
        "nilai" => 85,
        "grade" => "B"
    ],
    [
        "nim" => "2501881",
        "nama" => "Delia Mutiara",
        "jurusan" => "Pendidikan Guru Paud Dasar",
        "email" => "deliacantik@upi.edu",
        "nilai" => 95,
        "grade" => "A"
    ]
];

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page == 'detail') {
    include 'detail.php';
    exit;
}

if ($page == 'form') {
    include 'form_pesan.php';
    exit;
}

if ($page == 'hasil') {
    include 'hasil_pesan.php';
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Daftar Nilai Mahasiswa</h2>
    <p>✦ Mini Website PHP Dasar</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Nilai</th>
                <th>Grade</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1;
            foreach ($daftar_mahasiswa as $data) :
                if ($data['nilai'] >= 87) {
                    $status = "Lulus";
                    $kelas_status = "status-lulus";
                } else {
                    $status = "Tidak Lulus";
                    $kelas_status = "status-tidak";
                }

                $link = "index.php?page=detail"
                      . "&nim=" . urlencode($data['nim'])
                      . "&nama=" . urlencode($data['nama'])
                      . "&jurusan=" . urlencode($data['jurusan'])
                      . "&email=" . urlencode($data['email'])
                      . "&nilai=" . urlencode($data['nilai'])
                      . "&grade=" . urlencode($data['grade'])
                      . "&status=" . urlencode($status);
            ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nim']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['jurusan']; ?></td>
                <td><b><?= $data['nilai']; ?></b></td>
                <td><?= $data['grade']; ?></td>
                <td>
                    <span class="badge <?= $kelas_status; ?>"><?= $status; ?></span>
                </td>
                <td>
                    <a class="btn-detail" href="<?= $link; ?>">Lihat Detail</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>

    <a class="btn-detail" href="index.php?page=form">Isi Form Pesan</a>
</div>

</body>
</html>