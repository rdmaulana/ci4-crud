<?= $this->extend('layouts/admin') ?>

<?= $this->section('title_page') ?>
    Edit Employee
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

            <form name="editEmployeeForm" method="POST" action="/employee/update/<?= $employee['id'] ?>" enctype="multipart/form-data">
                <div class="row mb-3 align-items-end">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $employee['name'] ?>" />
                </div>
                <div class="row mb-3 align-items-end">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="<?= $employee['email'] ?>" />
                </div>
                <div class="row mb-3 align-items-end">
                    <label class="form-label">Position</label>
                    <select class="form-select" name="position">
                        <option value="staff" <?= ($employee['position'] == 'staff') ? 'selected' : '' ?>>Staff</option>
                        <option value="manager" <?= ($employee['position'] == 'manager') ? 'selected' : '' ?>>Manager</option>
                    </select>
                </div>
                <div class="row mb-3 align-items-end">
                    <label class="form-label">Photo</label>
                    <input type="file" class="form-control" name="photo" value="<?= $employee['photo'] ?>" />
                    <p>Existing file: <?= $employee['photo'] ?></p>
                </div>
                <button type="submit" class="btn btn-primary">Update Employee</button>
            </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>