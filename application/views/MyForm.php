<?php if (validation_errors()): ?>
   <div class="alert alert-error">
      <?php echo validation_errors(); ?>
   </div>
<?php endif; ?>