<?= $this->extend('layouts/admin') ?>

<?= $this->section('title_page') ?>
    List Employee
<?= $this->endSection() ?>

<?= $this->section('add_action') ?>
<a href="/employee/add" class="btn btn-primary">
    Add Employee
</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="col-12">
        <div class="card">
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?> 
            <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Join Date</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawai as $row) : ?>
                        <tr>
                            <td>
                                <div class="d-flex py-1 align-items-center">
                                    <span class="avatar me-2" style="background-image: url(<?= site_url('display-image/' . $row['photo']) ?>)"></span>
                                </div>
                            </td>
                            <td>
                                <?= $row['created_at'] ?>
                            </td>
                            <td>
                                <div><?= $row['name']; ?></div>
                            </td>
                            <td>
                                <div><?= $row['email']; ?></div>
                            </td>
                            <td class="text-muted" >
                                <?= $row['position']; ?>
                            </td>
                            <td>
                                <a href="/employee/edit/<?= $row['id'] ?>">Edit |</a>
                                <a href="/employee/delete/<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>