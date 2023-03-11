<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "finance");

    $result = mysqli_query($koneksi, "SELECT id_customer, nama FROM customer");
    $identitas = mysqli_fetch_object($result);

    $resultcoba = mysqli_query($koneksi, "SELECT paymentDate, metode, ammount FROM customer
                        JOIN invoice ON invoice.customerID = customer.id_customer
                        JOIN payments ON invoice.invoiceID = payments.invoice_id
                        WHERE customer.id_customer = 5 AND invoice.invoiceID = 1");
    // $hasilcoba = mysqli_fetch_object($resultcoba);
    $payments = [];
    while($row = mysqli_fetch_object($resultcoba)){
        $payments[] = $row;
    }
    $result = mysqli_query($koneksi, "SELECT SUM(ammount) AS total FROM customer
            JOIN invoice ON invoice.customerID = customer.id_customer
            JOIN payments ON invoice.invoiceID = payments.invoice_id
            WHERE customer.id_customer = 5 AND invoice.invoiceID = 1");
    $totalSudahDibayar = (int)mysqli_fetch_assoc($result)["total"];

    $result = mysqli_query($koneksi, "SELECT firstPayment + remainingPayment AS total FROM customer
            JOIN invoice ON invoice.customerID = customer.id_customer
            WHERE customer.id_customer = 5 AND invoice.invoiceID = 1
            GROUP BY customer.id_customer");
        // die(mysqli_error($koneksi));
    $totalBayar = (int)mysqli_fetch_assoc($result)["total"];   
    
    $kurang = $totalBayar - $totalSudahDibayar;
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Laporan Pembayaran</title>
</head> 

<body>
    <?php 
    
    ?>
    <div class="container mt-3">
        <h6>Id : <?php echo $identitas->id_customer ?></td>
        <h6>Nama :<?php echo $identitas -> nama ?></h6> 
        <h6>Total :<?php echo $totalBayar  ?></h6> 


<table class="table table-info">
    <tr align="center">
        <th>ID</th>
        <th>Tanggal Bayar</th>
        <th>Metode Pembayaran</th>
        <th>Jumlah Pembayaran</th>
    </tr>

    <?php
    foreach($payments as $payment):
    ?>
    
    <tr align="center">
        <td><?= $identitas->id_customer ?></td>
        <td><?= $payment->paymentDate?></td>
        <td><?= $payment-> metode ?></td>
        <td><?= $payment-> ammount ?></td>
    </tr>
        <?php endforeach;?>
    
</table>

<h6>Total Dibayar : <?php echo $totalSudahDibayar ?></h6>
<h6>Kurang : <?php echo $kurang ?></h6>
    </div>

</body>

</html>