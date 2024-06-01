<!-- Main Content-->

<?php $__env->startSection('title', $article->title); ?>
<?php $__env->startSection('bg', $article->image); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-9 mx-auto">
        <?php echo $article->content; ?>

        <br><br>
        <span class="text-danger">Views: <b><?php echo e($article->hit); ?></b></span>
    </div>
    <?php echo $__env->make('front.widgets.categoryWidget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sefa\Desktop\blog\resources\views/front/single.blade.php ENDPATH**/ ?>