<!-- Main Content-->

<?php $__env->startSection('title', 'İletisim'); ?>
<?php $__env->startSection('bg', 'https://st2.depositphotos.com/3343907/7659/i/950/depositphotos_76595719-stock-photo-contact-me-text-concept.jpg'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-8">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <p>You can contact us</p>
        <form method="POST" action="<?php echo e(route('contact.post')); ?>">
            <?php echo csrf_field(); ?>
            <div class="control-group">
                <div class="form-group  controls">
                    <label>Name & Surname</label>
                    <input type="text" class="form-control" value="<?php echo e(old('name')); ?>" placeholder="Your name & surname" name="name" required >
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group  controls">
                    <label>E-mail address</label>
                    <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="Your e-mail address" name="email" required >
                </div>
            </div>
            <div class="control-group">
                <div class="form-group col-xs-12  controls">
                    <label>Subject</label>
                    <select class="form-control" name="topic">
                        <option <?php if(old('topic') == "Info"): ?> selected <?php endif; ?>>Info</option>
                        <option <?php if(old('topic') == "Support"): ?> selected <?php endif; ?>>Support</option>
                        <option <?php if(old('topic') == "General"): ?> selected <?php endif; ?>>Genel</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group  controls">
                    <label>Your message</label>
                    <textarea rows="5" name="message" class="form-control" placeholder="Your message"><?php echo e(old('message')); ?></textarea>
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sefa\Desktop\blog\resources\views/front/contact.blade.php ENDPATH**/ ?>