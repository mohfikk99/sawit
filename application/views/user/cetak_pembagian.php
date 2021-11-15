<?php

$id_login = $login['id'];

$petani = $nama['id_pembagian'];

$akses = "SELECT * 
            FROM pembagian_lahan JOIN anggota
            ON pembagian_lahan.id_anggota = anggota.id
            WHERE id_login = $id_login 
            AND id_pembagian = $petani";

$akhir = $this->db->query($akses)->result_array()


?>


<div class="container_fluid turun bawah">


    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables kelompok petani</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Transaksi</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Lahan</th>
                            <th scope="col">Hasil Akhir</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($akhir as $n) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $n['transaksi'] ?></td>
                                <td><?= $n['nama'] ?></td>
                                <td><?= $n['lahan'] ?></td>
                                <td><b><?= number_format($n['hasil_akhir'], 0, ',', '.')  ?></b></td>
                                <td>
                                    <a class="btn btn-sm btn-success">Selesai</a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        window.print();
    </script>

</div>