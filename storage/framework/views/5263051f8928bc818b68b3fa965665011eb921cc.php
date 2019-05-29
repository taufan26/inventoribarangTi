<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Aplikasi Inventari Barang TI')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('on-server/js/fontawesome-all.min.js')); ?>"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                <?php if(Auth::user()): ?>
                    

                    <ul class="nav navbar-nav navbar-left">
                    <li><a href="<?php echo e(url('/supplier')); ?>">Supplier</a></li>
                    <?php if(Auth::user()->role==1): ?>
                    <li><a href="<?php echo e(url('/users')); ?>">User</a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo e(url('/kategori')); ?>">Kategori</a></li>
                    <li><a href="<?php echo e(url('/barang')); ?>">Barang</a></li>


                    <?php if(Auth::user()->role==1): ?>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Laporan <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                   <li><a href="<?php echo e(url('/laporan/barang-masuk')); ?>">Barang Masuk</a></li>
                                   <li><a href="<?php echo e(url('/laporan/barang-keluar')); ?>">Barang Keluar</a></li>
                                   <li><a href="<?php echo e(url('/laporan/peminjaman-barang')); ?>">Peminjaman Barang</a></li>
                                </ul>
                            </li>

                                                                    <li><a href="<?php echo e(url('/database')); ?>">Database</a></li>
                                                <?php endif; ?>
                    </ul>
                <?php endif; ?>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>

                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>



<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus</h4>
      </div>
      <div class="modal-body">
        <h4>Apakah Anda Akan Menghapus Data Ini?</h4>
      </div>
      <div class="modal-footer">
    <form action="" style="display: inline-block;" method="post" id="form-confirm">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('DELETE')); ?>

                                <button class="btn btn-danger" type="submit"> OK</button>
    </form>

      </div>
    </div>

  </div>
</div>

<?php echo $__env->yieldPushContent('data'); ?>

    </div>

    <!-- Scripts -->

                <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript">
        $.ajaxSetup({
    headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $(".delete-btn").click(function(){
            var act = $(this).attr('data-action');
            $("#form-confirm").attr('action',act);
        });
    });
    </script>
<?php echo $__env->yieldPushContent('script'); ?>
</body>
</html>
