<?php
    $koneksi=mysqli_connect('localhost','root','','finance');
    if(isset($_POST["submit"])){
        $id = $_POST["input"];
        $call = "CALL pembayaran($id)";

        // $select = mysqli_query($koneksi, "SELECT*FROM customer where id_customer = $id");
        $total = mysqli_query($koneksi,"SELECT SUM(invoice.firstPayment+invoice.remainingPayment) as total, customer.id_customer,customer.nama FROM invoice
        INNER JOIN invoice ON customer.id_customer = invoice.customerID WHERE customer.id_customer = $id");

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembayaran</title>
</head>

<body>
    <form action="" method="POST">
        <input type="number" placeholder="masukkan id" name="input">
        <button name="submit" type="submit">submit</button>
    </form>
    <?php 
    
    ?>
    <table>
        <tr>
            <th>Id </th>
            <td>: <?php echo $id ?></td>
            <th colspan="2"></th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($total)){ ?>
        <tr>
            <th>Nama</th>
            <td><?= $row["nama"]?></td>
            <th>Total</th>
            <td><?= $row["total"]?> </td>
        </tr>
        <?php } ?>
    </table>

    <table border="1" style="border-collapse: collapse;" celspacing: 5;>
        <tr>
            <th>No.</th>
            <th>Tgl</th>
            <th>Metode</th>
            <th>Jumlah</th>
        </tr>

        <?php

        ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

</body>

</html>