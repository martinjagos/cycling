<?php

echo $this->extend("layout/master");
echo $this->section("content");


?>

    <form action="<?php base_url("/dashboard/update-race/") ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field() ?>

        <!-- Real Name -->
        <div class="form-group">
            <label for="real_name">Real Name</label>
            <input type="text" name="real_name" id="real_name" class="form-control" value="<?= old('real_name') ?>" required>
            <div class="text-danger">
                <?= isset($validation) ? $validation->getError('real_name') : '' ?>
            </div>
        </div>

        <!-- Year -->
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" id="year" class="form-control" value="<?= old('year') ?>" required>
            <div class="text-danger">
                <?= isset($validation) ? $validation->getError('year') : '' ?>
            </div>
        </div>

        <!-- Start Date -->
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="<?= old('start_date') ?>" required>
            <div class="text-danger">
                <?= isset($validation) ? $validation->getError('start_date') : '' ?>
            </div>
        </div>

        <!-- End Date -->
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="<?= old('end_date') ?>" required>
            <div class="text-danger">
                <?= isset($validation) ? $validation->getError('end_date') : '' ?>
            </div>
        </div>

        <!-- Sex -->
        <div class="form-group">
            <label for="sex">Sex</label>
            <select name="sex" id="sex" class="form-control">
                <option value="" <?= old('sex') === '' ? 'selected' : '' ?>>Select Sex</option>
                <option value="M" <?= old('sex') === 'M' ? 'selected' : '' ?>>Male</option>
                <option value="W" <?= old('sex') === 'W' ? 'selected' : '' ?>>Female</option>
            </select>
            <div class="text-danger">
                <?= isset($validation) ? $validation->getError('sex') : '' ?>
            </div>
        </div>

        <!-- Logo Upload -->
        <div class="form-group">
            <label for="logo">Upload Logo</label>
            <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
            <div class="text-danger">
                <?= isset($validation) ? $validation->getError('logo') : '' ?>
            </div>
        </div>

        <!-- Country -->
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" id="country" class="form-control" value="<?= old('country') ?>" required>
            <div class="text-danger">
                <?= isset($validation) ? $validation->getError('country') : '' ?>
            </div>
        </div>

        <!-- UCI Tour -->
        <div class="form-group">
            <label for="uci_tour">UCI Tour</label>
            <input type="text" name="uci_tour" id="uci_tour" class="form-control" value="<?= old('uci_tour') ?>" required>
            <div class="text-danger">
                <?= isset($validation) ? $validation->getError('uci_tour') : '' ?>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
<?php echo $this->endSection();