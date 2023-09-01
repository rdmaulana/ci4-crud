<?= $this->extend('layouts/admin') ?>

<?= $this->section('title_page') ?>
    Edit User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?> <!-- Menambahkan penanganan pesan kesalahan -->
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <form name="editUserForm" method="POST" action="/users/update/<?= $userData['id']; ?>">
                    <div class="row mb-3 align-items-end">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $userData['username']; ?>" />
                    </div>
                    <div class="row mb-3 align-items-end">
                        <label class="form-label">Passowrd</label>
                        <input type="password" class="form-control" name="password" />
                    </div>
                    <div class="row mb-3 align-items-end">
                        <label class="form-label">Retype Password</label>
                        <input type="password" class="form-control" name="retype_password" />
                    </div>
                    <div class="row mb-3 align-items-end">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role">
                            <option value="user" <?= ($userData['role'] === 'user') ? 'selected' : ''; ?>>User</option>
                            <option value="admin" <?= ($userData['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>