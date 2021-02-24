<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">Arkademy</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Tugas 10 (bonus) <span class="sr-only">(current)</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="content mt-5">
        <div class="container">
            <button  onClick="addData('<?= base_url() ?>')" data-target="#modalData" data-toggle="modal" class="btn btn-outline-primary mb-2">Tambah Data</button>
            <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-<?= $this->session->flashdata('type'); ?> ">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            <?php } ?>
            <table class="table table-striped mt-3">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
                <?php $i = 1;
                foreach ($data_produk as $row) { ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row['nama_produk'] ?></td>
                        <td><?= $row['keterangan'] ?></td>
                        <td>Rp <?= number_format($row['harga'], 0, ".", ".") ?></td>
                        <td><?= $row['jumlah'] ?></td>
                        <td>
                            <center>
                                <button onClick="updateData('<?= base_url() ?>','<?= $row['nama_produk'] ?>','<?= $row['keterangan'] ?>','<?= $row['harga'] ?>','<?= $row['jumlah'] ?>','<?= $row['id'] ?>')" data-toggle="modal" data-target="#modalData" class="btn btn-outline-success">Edit</button>
                                <button data-target="#modalDelete" data-toggle="modal" onClick="deleteData('<?= base_url() ?>','<?= $row['id'] ?>')" class="btn btn-outline-danger">Hapus</button>
                            </center>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelModal">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="form" method="post">
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="keterangan" id="keterangan" class="form-control">
                                    </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2">Harga Produk</label>
                            <div class="col-sm-10">
                                <input type="number" name="harga" id="harga" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="number" name="jumlah" id="jumlah" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="id_produk" id="id_produk">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelModal">Hapus Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Anda Yakin ingin menghapus data tersebut?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a id="btn_delete"  class="btn btn-primary">Hapus Data</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
    function addData(baseUrl) {
        document.getElementById("form").action = baseUrl + 'produk/addProduk';
        document.getElementById("nama_produk").value = "";
        document.getElementById("keterangan").innerHTML = "";
        document.getElementById("harga").value = "";
        document.getElementById("jumlah").value = "";
        document.getElementById("id_produk").value = "";
        document.getElementById("labelModal").innerHTML = "Tambah Produk";
    }
    
    function updateData(baseUrl,nama,keterangan,harga,jumlah,id){

        document.getElementById("form").action = baseUrl + 'produk/updateProduk';
        document.getElementById("nama_produk").value = nama;
        document.getElementById("keterangan").innerHTML = keterangan;
        document.getElementById("harga").value = harga;
        document.getElementById("jumlah").value = jumlah;
        document.getElementById("id_produk").value = id;
        document.getElementById("labelModal").innerHTML = "Edit Produk";
    }

    function deleteData(baseUrl,id){
        document.getElementById("btn_delete").href= baseUrl +'produk/deleteProduk/'+id;
    }
</script>

</html>