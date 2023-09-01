<?= $this->extend('layouts/admin') ?>

<?= $this->section('title_page') ?>
    Add User
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

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <form name="createUserForm" method="POST" action="/users/store">
                    <div class="row mb-3 align-items-end">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" />
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
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>