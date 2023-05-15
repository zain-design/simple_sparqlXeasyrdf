<?php
require 'vendor/autoload.php';

\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
\EasyRdf\RdfNamespace::set('d', 'http://www.semanticweb.org/asus/ontologies/2022/11/perpustakaan#');
$sparql = new EasyRdf\Sparql\Client('http://localhost:3030/perpustakaan/query');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <title>Latihan</title>
</head>

<body>
    <?php
    $data = $sparql->query(
        'SELECT ?judul ?halaman ?ISBN ?tahun ?writers ?namaPenulis ?alamatPenulis ?publishers ?namaPenerbit ?alamatPenerbit WHERE {' .
            '?books	 d:Judul ?judul.' .
            'OPTIONAL {' .
            '?books	 d:Halaman ?halaman.' .
            '?books	 d:ISBN ?ISBN.' .
            '?books	 d:Tahun_Terbit ?tahun.' .
            '?books	 d:diterbitkan ?publishers.' .
            '?publishers d:Nama_Penerbit ?namaPenerbit.' .
            '?publishers d:Alamat_Penerbit ?alamatPenerbit.' .
            '}' .
            '}'
    );
    ?>
    <div class="container container-fluid my-3">
        <h4>Data Informasi Buku</h4>
        <table class="table table-bordered table-hover tect-center table-responsive">
            <thead class="table-dark align-middle">
                <tr>
                    <th>Judul</th>
                    <th>Halaman</th>
                    <th>ISBN</th>
                    <th>Tahun Terbit</th>
                    <th>Nama Penerbit</th>
                    <th>Alamat Penerbit</th>

                </tr>
            </thead>
            <tbody class="align-middle">
                <?php $i = 0; ?>
                <?php foreach ($data as $data) : ?>
                    <tr>
                        <td><?= $data->judul ?></td>
                        <td><?= $data->halaman ?></td>
                        <td><?= $data->ISBN ?></td>
                        <td><?= $data->tahun ?></td>
                        <td><?= $data->namaPenerbit ?></td>
                        <td><?= $data->alamatPenerbit ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>