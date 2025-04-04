<!DOCTYPE html> 
<html> 
<head> 
    <title></title>
    
    <style type="text/css">
        .table-data{
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td{
            border:1px solid black;
            font-size: 11pt;
            font-family:Verdana;
            padding: 10px 10px 10px 10px;
        }
        h3{
            font-family:Verdana;
        }
    </style> 

</head> 
<body> 
    <h3><center><?= $title; ?></center></h3> <br/>
    <table class="table-data">
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
    
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>