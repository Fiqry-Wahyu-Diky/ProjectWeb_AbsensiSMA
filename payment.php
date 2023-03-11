<?php 
    $conn = mysqli_connect("localhost", "root", "", "finance");

    $hasil="SELECT customer.id_customer,customer.nama, payments.paymentDate, 
    SUM(invoice.firstPayment+invoice.remainingPayment) AS Total,
    SUM(invoice.firstPayment) AS Jumlah,
    SUM(invoice.remainingPayment) AS Kurang,payments.metode FROM customer 
    INNER JOIN invoice ON customer.id_customer=invoice.customerID INNER JOIN payments ON invoice.invoiceID=payments.invoice_id WHERE customer.id_customer='$id';"

?>

