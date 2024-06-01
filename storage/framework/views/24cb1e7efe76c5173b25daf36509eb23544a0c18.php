<?php $__env->startSection('title', 'All Articles'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo e(route('admin.article.deleted')); ?>" class="btn btn-warning btn-sm  float-right"><i
                    class="fa fa-trash"> Deleted Articles</i></a>
            <h6 class="m-0 font-weight-bold text-primary"><strong><?php echo e($articles->count()); ?> articles found</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Article Image</th>
                        <th>Category</th>
                        <th>Hit</th>
                        <th>Creation Date</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="<?php echo e(asset($article->image)); ?>" width="200"></td>
                            <td><?php echo e($article->title); ?></td>
                            <td><?php echo e($article->getCategory->name); ?></td>
                            <td><?php echo e($article->hit); ?></td>
                            <td><?php echo e($article->created_at->diffForHumans()); ?></td>
                            <td>
                                <input class="switch" article-id="<?php echo e($article->id); ?>" type="checkbox"
                                       data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                       <?php if($article->status==1): ?> checked <?php endif; ?> data-on="Active" data-off="Passive">
                            </td>
                            <td>
                                <a target="_blank"
                                   href="<?php echo e(route('single', [$article->getCategory->slug, $article->slug])); ?>"
                                   title="View" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(route('admin.articles.edit', $article->id)); ?>" title="View"
                                   class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <form method="post" action="<?php echo e(route('admin.articles.destroy', $article->id)); ?>">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" href="#" title="Delete" class="btn btn-sm btn-danger"><i
                                            class="fa fa-times"></i></button>
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
    <script>
        $(function () {
            $('.switch').change(function () {
                id = $(this)[0].getAttribute('article-id');
                statu = $(this).prop('checked')
                $.get("<?php echo e(route('admin.article.switch')); ?>", {id: id, statu: statu}, function (data, status) {
                });
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sefa\Desktop\blog\resources\views/back/articles/index.blade.php ENDPATH**/ ?>