<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
.main-btn {background:blue;color:white;padding:10px;cursor:pointer;}
.dropdown, .submenu {display:none;}
</style>
</head>
<body>

<h3>Login sebagai: <?php echo $user; ?></h3>
<a href="logout.php">Logout</a>

<br><br>

<button class="main-btn" onclick="toggleMenu()">Basic Data Activity</button>

<div id="menu" class="dropdown">
    <div onclick="toggleSub()">Data Leads ▶</div>
    <div>Follow Up</div>
    <div>Appointment</div>
    <div>Show</div>
    <div>Join</div>

    <div id="submenu" class="submenu">
        <a href="?page=leads">Akses Data</a>
    </div>
</div>

<script>
function toggleMenu(){
    let m = document.getElementById("menu");
    m.style.display = m.style.display === "block" ? "none" : "block";
}
function toggleSub(){
    let s = document.getElementById("submenu");
    s.style.display = s.style.display === "block" ? "none" : "block";
}
</script>

<hr>

<?php
if (isset($_GET['page']) && $_GET['page'] == 'leads') {

    echo "<h2>Data Leads - $user</h2>";

    $query = mysqli_query($conn, "SELECT * FROM leads WHERE mc='$user'");

    echo "<table border='1'>
    <tr>
        <th>No</th><th>Date</th><th>Barcode</th><th>Nama</th>
        <th>No HP</th><th>Alamat</th><th>Source</th>
        <th>Join</th><th>Remax</th><th>MC</th>
    </tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>
            <td>$no</td>
            <td>{$row['date']}</td>
            <td>{$row['barcode']}</td>
            <td>{$row['nama']}</td>
            <td>{$row['no_hp']}</td>
            <td>{$row['alamat']}</td>
            <td>{$row['source']}</td>
            <td>{$row['status_join']}</td>
            <td>{$row['remax']}</td>
            <td>{$row['mc']}</td>
        </tr>";
        $no++;
    }

    echo "</table>";
}
?>

</body>
</html>