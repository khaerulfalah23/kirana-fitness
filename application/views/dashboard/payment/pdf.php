<h3>
    <center><?= $title; ?></center>
</h3>
<br/><br/>
<table border="1" width="100%">
        <tr>
        <th class="text-center">No</th>
        <th>User</th>
        <th>Paket</th>
        <th>Status</th>
        <th>Berakhir</th>
        </tr>
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
</table>