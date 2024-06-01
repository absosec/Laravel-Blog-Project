<?php $__env->startSection('title', 'All Pages'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo e(route('admin.article.deleted')); ?>" class="btn btn-warning btn-sm  float-right"><i class="fa fa-trash"> Deleted Articles</i></a>
            <h6 class="m-0 font-weight-bold text-primary"><strong><?php echo e($pages->count()); ?> pages found</strong></h6>
        </div>
        <div class="card-body">
            <div style="display: none" class="alert alert-success" id="ordersSuccess">
                Sorting updated successfully
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Arrangement</th>
                        <th>Image</th>
                        <th>Page Image</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody id="orders">
                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="page_<?php echo e($page->id); ?>">
                            <td class="text-center" style="width:5px"><i class="fa fa-arrows-alt-v handle fa-3x" style="cursor:move"></i></td>
                            <td><img src="<?php echo e(asset($page->image)); ?>" width="200"></td>
                            <td><?php echo e($page->title); ?></td>
                            <td>
                                <input class="switch" page-id="<?php echo e($page->id); ?>" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" <?php if($page->status==1): ?> checked <?php endif; ?> data-on="Active" data-off="Passive">
                            </td>
                            <td>
                                <a target="_blank" href="<?php echo e(route('page', $page->slug)); ?>" title="View" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(route('admin.page.edit', $page->id)); ?>" title="Update" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <form method="post" action="<?php echo e(route('admin.page.delete', $page->id)); ?>">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" href="#" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
    <script>
        $('#orders').sortable({
            handle:'.handle',
            update:function (){
                var order = $('#orders').sortable('serialize');
                $.get("<?php echo e(route('admin.page.order')); ?>?"+order, function (data, status){});
                $("#ordersSuccess").show();
                setTimeout(function() { $("#ordersSuccess").hide(); }, 1000);
            }
        });
    </script>
    <script>
        $(function() {
            $('.switch').change(function() {
                id = $(this)[0].getAttribute('page-id');
                statu = $(this).prop('checked')
                $.get("<?php echo e(route('admin.page.switch')); ?>", {id:id, statu:statu}, function(data, status){});
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sefa\Desktop\blog\resources\views/back/pages/index.blade.php ENDPATH**/ ?>