<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Barang</div>

                <div class="panel-body">
                                <div class="pull-right">
                    <button class="btn btn-info" onclick="window.print()">Cetak</button>
                    <br>
                    <br>
                </div>  	
                    <table class="table table-condensed">
                        <tr>
                            <td>Kode</td><td><?php echo e($data->kode); ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td><td><?php echo e($data->nama); ?></td>
                        </tr>
                        <tr>
                            <td>Spesifikasi</td><td><?php echo e($data->spesifikasi); ?></td>
                        </tr>
                        <?php if($data->foto !=null): ?>
                            
                        <tr>
                            <td>Foto</td><td><img class="img img-responsive" style="width: 20%;" src="<?php echo e(url('uploads/'.$data->foto)); ?>"></td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td>Lokasi</td><td><?php echo e($data->lokasi); ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td><td><?php echo e($data->kat->kategori); ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Barang</td><td><?php echo e($data->jml_barang); ?></td>
                        </tr>
                        <tr>
                            <td>Kondisi</td><td><?php echo e($data->kondisi); ?></td>
                        </tr>
                        <tr>
                            <td>Sumber Dana</td><td><?php echo e($data->sumber_dana); ?></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>