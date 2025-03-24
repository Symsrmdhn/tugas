<div class="col-md-12" style="margin-bottom: 200px;">
            <div class="card card-primary" >
              <div class="card-header" style="background-color: #8fb883">
                <h3 class="card-title" >Riwayat Penukaran</h3>

                <div class="card-tools">
                  <a href="<?= base_url('daurulang/add')?>" type="button" class="btn btn- btn-sm"><i class="fas fa-plus"></i>
                  Add</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> success!';
                    echo $this->session->flashdata('pesan');
                    echo'</h5></div>';
                }
                ?>
                <table class="table table-bordered" id="example1">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama pengguna</th>
                            <th>Email</th>
                            <th>Bukti</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                         foreach ($pengguna as $key => $value) { ?>
                        <tr>
                        <td> <?= $no++; ?> </td>
                            <td> <?= $value->nama_pelanggan ?> </td>
                            <td> <?= $value->email ?> </td>
                            <td class='text-center'>
                                <img src="<?= base_url('assets/bukti/' . htmlspecialchars($value->bukti, ENT_QUOTES, 'UTF-8')) ?>" width="150px">
                            </td>
                            <td class='text-center'> <?php 
                                if ($value->status == 1) {
                                  echo '<span class="badge bg-danger">belum ter verifikasi</span>';
                                } else{
                                    echo '<span class="badge bg-success">terverivikasi</span>';
                                }
                                ?>
                            </td>
                            <td class='text-center'>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_bukti?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

    <!-- /.modal delete  -->
    <?php foreach ($pengguna as $key => $value) { ?>

<div class="modal fade" id="delete<?= $value ->id_bukti?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Delete bukti daur ulang ini</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>apakah anda yakin ingin menghapus data ini.... </h5>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href='<?= base_url('daurulang/delete/' .$value->id_bukti)?>' class="btn btn-primary">Delete</a>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>