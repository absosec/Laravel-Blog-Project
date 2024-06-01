<!-- Footer-->
</div>
</div>
<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    <?php $socials = ['facebook', 'twitter', 'github', 'linkedin', 'youtube', 'instagram']; ?>
                    <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($config->$social != null): ?>
                            <li class="list-inline-item">
                                <a target="_blank" href="<?php echo e($config->$social); ?>">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-<?php echo e($social); ?> fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="small text-center text-muted fst-italic">Copyright &copy; <?php echo e(date('Y')); ?> - <?php echo e($config->title); ?></div>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="<?php echo e(asset('front/')); ?>/js/scripts.js"></script>
</body>
</html>
<?php /**PATH C:\Users\Sefa\Desktop\blog\resources\views/front/layouts/footer.blade.php ENDPATH**/ ?>