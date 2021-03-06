<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data Barang</div>

                <div class="panel-body">	


                <a class="btn btn-primary" href="<?php echo e($page); ?>/create">Tambah Data</a>

                <div class="pull-right">
                    <form action="<?php echo e(url($page.'/cari')); ?>" method="get">
                        <input type="text" name="q" class="form-control" placeholder="Cari Data">
                    </form>
                </div>
                <table class="table table-striped">
                <thead>
                <th>#</th>
                	<th>Nama</th>
                	<th>Jumlah Barang</th>
                    <th>Aksi</th>
                </thead>
                	<tbody>
                    <?php if(count($data) == 0): ?>
                        
                        <tr>
                            <td colspan="6"><center>Data Tidak Ada</center></td>
                        </tr>
                    <?php endif; ?>
                	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<tr>
                			<td><?php echo e($d->kode); ?></td>
                			<td><?php echo e($d->nama); ?></td>
                            <td><?php echo e($d->jml_barang); ?></td>

                            <td>

                            <a href="<?php echo e($page.'/'.$d->kode); ?>" class="btn btn-info">Detail</a>
                			<a href="<?php echo e($page.'/'.$d->kode.'/edit'); ?>" class="btn btn-success">Edit</a>
                                <button data-toggle="modal" data-target="#confirmModal" data-action="<?php echo e(url($page.'/'.$d->kode)); ?>" class="btn btn-danger delete-btn">Hapus</button>
                			</td>
                		</tr>
                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	</tbody>
                </table>
	<center><?php echo e($data->links()); ?></center>
		
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>