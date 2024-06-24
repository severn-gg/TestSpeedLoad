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
  <?= $this->include('PIC/Navigation/meta'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <!-- navbar -->
    <?= $this->include('PIC/Navigation/navbar'); ?>

    <!-- sidebar -->
    <?= $this->include('PIC/Navigation/sidebar'); ?>

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
  <?= $this->include('PIC/Navigation/script'); ?>
</body>

</html>