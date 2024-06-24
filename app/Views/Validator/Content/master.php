<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- meta -->
  <?= $this->include('Template/globalMeta'); ?>
  <?= $this->include('Validator/Navigation/meta'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <!-- navbar -->
    <?= $this->include('Validator/Navigation/navbar'); ?>

    <!-- sidebar -->
    <?= $this->include('Validator/Navigation/sidebar'); ?>

    <!-- content -->
    <div class="content-wrapper">
      <?= $this->renderSection('content') ?>
    </div>

    <!-- footer -->
    <?= $this->include('Template/footer'); ?>

  </div>
  <!-- ./wrapper -->

  <!-- script -->
  <?= $this->include('Template/globalScript'); ?>
  <?= $this->include('Validator/Navigation/script'); ?>
</body>

</html>