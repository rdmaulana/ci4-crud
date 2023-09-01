<?= $this->extend('layouts/admin') ?>

<?= $this->section('title_page') ?>
    Add Employee
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

                <form name="createEmployeeForm" method="POST" action="/employee/store" enctype="multipart/form-data">
                    <div class="row mb-3 align-items-end">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="row mb-3 align-items-end">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" />
                    </div>
                    <div class="row mb-3 align-items-end">
                        <label class="form-label">Position</label>
                        <select class="form-select" name="position">
                            <option value="staff">Staff</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>
                    <div class="row mb-3 align-items-end">
                        <label class="form-label">Photo</label>
                        <input type="file" class="form-control" name="photo" />
                    </div>
                    <button type="submit" class="btn btn-primary">Add Employee</button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>