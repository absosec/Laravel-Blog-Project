<?php $__env->startSection('title', $page->title); ?>
<?php $__env->startSection('bg', $page->image); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-8 col-md-10 mx-auto">
        <?php echo $page->content; ?>

    </div>
    <?php echo $__env->make('front.widgets.categoryWidget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sefa\Desktop\blog\resources\views/front/page.blade.php ENDPATH**/ ?>