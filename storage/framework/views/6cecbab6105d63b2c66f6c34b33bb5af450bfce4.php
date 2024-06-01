<?php $__env->startSection('title', 'Deleted Articles'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo e(route('admin.articles.index')); ?>" class="btn btn-primary btn-sm  float-right"><i class="fa fa-trash"> Undeleted Articles</i></a>
            <h6 class="m-0 font-weight-bold text-primary"><strong><?php echo e($articles->count()); ?> articles found</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Makale Başlığı</th>
                        <th>Category</th>
                        <th>Hit</th>
                        <th>Creation Date</th>
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
                                <a href="<?php echo e(route('admin.article.recover', $article->id)); ?>" title="Silmekten Kurtar" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i></a>
                                <form method="post" action="<?php echo e(route('admin.article.hard.delete', $article->id)); ?>">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" href="#" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
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

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sefa\Desktop\blog\resources\views/back/articles/deleted.blade.php ENDPATH**/ ?>
