<?php $__env->startSection('title', $category->name . ' Category'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.widgets.articleList', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('front.widgets.categoryWidget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sefa\Desktop\blog\resources\views/front/category.blade.php ENDPATH**/ ?>