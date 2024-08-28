<!DOCTYPE html>
<html lang="en">

<head>
  <!-- meta -->
  <?= $this->include('Template/globalMeta'); ?>
  <?= $this->include('Admin/Navigation/meta'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <!-- navbar -->
    <?= $this->include('Admin/Navigation/navbar'); ?>

    <!-- sidebar -->
    <?= $this->include('Admin/Navigation/sidebar'); ?>

    <!-- content -->
    <div id="content" class="content-wrapper">
      <?= $this->renderSection('content') ?>
    </div>

    <!-- footer -->
    <?= $this->include('Template/footer'); ?>

  </div>
  <!-- ./wrapper -->

  <!-- script -->
  <?= $this->include('Template/globalScript'); ?>
  <?= $this->include('Admin/Navigation/script'); ?>

</body>

</html>