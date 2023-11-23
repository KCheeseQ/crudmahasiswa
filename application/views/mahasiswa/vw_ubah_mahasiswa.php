<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <br>
        <?php echo $judul; ?>
    </h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header justify-content-center">
                        Form Ubah Mahasiswa
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('mahasiswa/update'); ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>">
                            <div class="form-group">
                                 <label for="nama">Nama</label>
                                 <input type="text" name="nama" value="<?= $mahasiswa['nama'] ?>" class="form-control" id="nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="nim">Nim</label>
                                <input type="number" name="nim" value="<?= $mahasiswa['nim'] ?>" class="form-control" id="nim" placeholder="NIM">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="Laki-laki" <?php if ($mahasiswa['jenis_kelamin'] == "Laki-laki") {
                                        echo "selected";
                                    } ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if ($mahasiswa['jenis_kelamin'] == "Perempuan") {
                                        echo "selected";
                                    } ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="<?= $mahasiswa['email'] ?>" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="prodi">Prodi</label>
                                <select name="prodi" id="prodi" class="form-control">
                                    <?php foreach ($prodi as $p) : ?>
                                        <option value="<?= $p['id'];?>" <?php if ($mahasiswa['prodi'] == $p['id']){
                                            echo "selected";
                                        } ?>><?= $p['nama']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="asal_sekolah">Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" value="<?= $mahasiswa['asal_sekolah'] ?>" class="form-control" id="asal_sekolah" placeholder="Asal Sekolah">
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="number" name="no_hp" value="<?= $mahasiswa['no_hp'] ?>" class="form-control" id="no_hp" placeholder="No HP">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" value="<?= $mahasiswa['alamat'] ?>" class="form-control" id="alamat" placeholder="Alamat">
                            </div>
                            <a href="<?= base_url('mahasiswa') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Mahasiswa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>