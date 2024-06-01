<?php if(isset($categories)): ?>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                Categories
            </div>
            <div class="list-group">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item <?php if(Request::segment(2)==$category->slug): ?> active <?php endif; ?>">
                        <a <?php if(Request::segment(2)!=$category->slug): ?> href="<?php echo e(route('category', $category->slug)); ?>"<?php endif; ?>><?php echo e($category->name); ?></a><span
                            class="badge bg-danger float-right text-white"><?php echo e($category->articleCount()); ?></span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\Sefa\Desktop\blog\resources\views/front/widgets/categoryWidget.blade.php ENDPATH**/ ?>