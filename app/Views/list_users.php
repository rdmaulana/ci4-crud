<?= $this->extend('layouts/admin') ?>

<?= $this->section('title_page') ?>
    List User
<?= $this->endSection() ?>

<?= $this->section('add_action') ?>
<a href="/users/add" class="btn btn-primary">
   Add User
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
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $row) : ?>
                        <tr>
                            <td>
                                <?= $row['id'] ?>
                            </td>
                            <td>
                                <div><?= $row['username']; ?></div>
                            </td>
                            <td class="text-muted" >
                                <?= $row['role']; ?>
                            </td>
                            <td>
                                <a href="/users/edit/<?= $row['id'] ?>">Edit |</a>
                                <a href="/users/delete/<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>