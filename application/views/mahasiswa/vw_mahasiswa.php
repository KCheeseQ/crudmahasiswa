<div class="contain-fluid">
  <h1 class="h3 mb-4 text-gray-8"><?php echo $judul; ?></h1>
  <div class="row">
    <div class="col-md-6"><a href="<?= base_url('mahasiswa/tambah') ?>" class="btn btn-info mb-2">Tambah Mahasiswa</a></div>
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Nim</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($mahasiswa as $us) : ?>
          <tr>
            <td><?= $i; ?>.</td>
            <td><?=$us['nama'];?></td>
            <td><?=$us['nim'];?></td>
            <td><?=$us['email'];?></td>
            <td>
              <a href="<?= base_url('mahasiswa/hapus/') . $us['id']; ?>" class="btn btn-danger">hapus</a>
              <a href="<?= base_url('mahasiswa/edit/') . $us['id']; ?>" class="btn btn-warning">edit</a>
              <a href="<?= base_url('mahasiswa/detail/') . $us['id']; ?>" class="btn btn-info">detail</a>
            </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>