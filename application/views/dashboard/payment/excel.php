<?php
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attachment; filename=laporan-pembayaran-kirana-fitness.xls");
header("Pragma: no-cache");
header("Expires: ");
?>

<h3><center><?= $title; ?></center></h3>
<br/>
<table border="1" width="100%">
    <thead>
        <tr>
        <th class="text-center">No</th>
        <th>User</th>
        <th>Paket</th>
        <th>Status</th>
        <th>Berakhir</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    foreach ($payment as $p): ?>
        <tr>
        <td class="text-center"><?= $i++ ?></td>
        <td><?= $p['nama'] ?></td>
        <td><?= $p['durasi'] ?></td>
        <td><?= $p['status'] ?></td>
        <td><?= $p['jtempo'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
