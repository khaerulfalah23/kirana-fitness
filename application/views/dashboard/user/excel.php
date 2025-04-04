<?php
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attachment; filename=laporan-data-user.xls");
header("Pragma: no-cache");
header("Expires: ");
?>

<h3><center><?= $title; ?></center></h3>
<br/>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Gander</th>
            <th>Phone Number</th>
            <th>Created</th>
        </tr> 
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach($users as $user){ ?>
        <tr>
            <th scope="row"><?= $no++; ?></th> 
            <td><?= $user['nama']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['alamat']; ?></td>
            <td><?= $user['jkel']; ?></td>
            <td><?= $user['notelp']; ?></td>
            <td><?= date('d F Y', $user['tanggal_input']); ?></td>
        </tr>
    <?php } ?>
</table>
