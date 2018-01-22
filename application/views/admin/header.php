<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <base href="<?=base_url();?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin | Dashboard</title>
  <link href="assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="assets/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="assets/admin/css/sb-admin.css" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="admin/index">Udemy Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin/index">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="admin/categories">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Categories</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="admin/sub_categories">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Sub Categories</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="admin/courses">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Courses</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="admin/users">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a href="auth/logout" class="nav-link" >
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
