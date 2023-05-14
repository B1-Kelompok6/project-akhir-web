<?php 
require "../koneksi.php";

$id= $_GET["id"];
if($id){
    $query3 = "DELETE FROM riwayat_pemesanan WHERE id_tiket = '$id'";
    $query2 = "DELETE FROM review WHERE id_tiket = '$id'";
    $query = "DELETE FROM tiket WHERE id_tiket = '$id'";
    mysqli_query($conn, $query3);
    mysqli_query($conn, $query2);
    mysqli_query($conn, $query);
echo "<script>
        alert('Data berhasil dihapus')
        document.location.href = '../crud_tiket.php';
      </script>";

}
?>