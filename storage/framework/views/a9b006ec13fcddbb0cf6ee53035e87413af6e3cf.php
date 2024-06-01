<div class="col-md-9 mx-auto">
<?php if(count($articles) > 0): ?>
    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="post-preview">
            <a href="<?php echo e(route('single', [$article->getCategory->slug, $article->slug])); ?>">
                <h2 class="post-title"><?php echo e($article->title); ?></h2>
                <img src="<?php echo e(starts_with($article->image, 'https') ? $article->image : asset($article->image)); ?>">
                <h3 class="post-subtitle"><?php echo str_limit($article->content, 75); ?></h3>
            </a>
            <p class="post-meta">Category:
                <a href="<?php echo e(route('category', $article->getCategory->slug)); ?>"><?php echo e($article->getCategory->name); ?></a>
                <span class="float-right"><?php echo e($article->created_at->diffForHumans()); ?></span>
            </p>
        </div>
        <?php if(!$loop->last): ?>
            <hr class="my-4" />
         <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo e($articles->links()); ?>

<?php else: ?>
    <div class="alert alert-danger">
        <h2>Sorry, there is no article on this category!</h2>
    </div>
<?php endif; ?>
</div>
<?php /**PATH C:\Users\Sefa\Desktop\blog\resources\views/front/widgets/articleList.blade.php ENDPATH**/ ?>