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
        </tbody>
    </table> 
    
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>