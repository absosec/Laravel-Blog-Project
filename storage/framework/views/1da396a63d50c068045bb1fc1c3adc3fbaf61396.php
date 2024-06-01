<?php $__env->startSection('title', $page->title . ' sayfasını güncelle'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('admin.page.edit.post', $page->id)); ?>" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>Page Image</label>
                    <input type="text" name="title" value="<?php echo e($page->title); ?>" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label>Makale Fotoğrafı</label><br>
                    <img src="<?php echo e(asset($page->image)); ?>" width="300" class="img-thumbnail rounded">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Makale İçeriği</label>
                    <textarea rows="4" name="content" id="editor" class="form-control" required><?php echo $page->content; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Makaleyi Güncelle</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote(
                {'height': 300}
            );
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sefa\Desktop\blog\resources\views/back/pages/update.blade.php ENDPATH**/ ?>