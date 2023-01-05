<script src="<?php echo GENERAL_JS; ?>page.js"></script>
<script src="<?php echo BOWER_JS; ?>jquery.min.js"></script>
<script src="<?php echo BOWER_JS; ?>bootstrap.min.js"></script>
<script src="<?php echo GENERAL_JS; ?>alertify.min.js"></script>
<script src="<?php echo GENERAL_JS; ?>popper.min.js"></script>
<script src="<?php echo GENERAL_JS; ?>bootstrap.min.js"></script>
<script src="<?php echo GENERAL_JS; ?>general.js"></script>
<script src="<?php echo ADMIN_JS; ?>ajaxGet.js"></script>
<script src="<?php echo ADMIN_JS; ?>ajaxPost.js"></script>
<script src="<?php echo ADMIN_JS; ?>create.js"></script>
<script src="<?php echo ADMIN_RENDER; ?>renderCreate.js"></script>
<script src="<?php echo ADMIN_RENDER; ?>renderUpdate.js"></script>
<script src="<?php echo ADMIN_RENDER; ?>renderRead.js"></script>
<script src="<?php echo ADMIN_RENDER; ?>renderSearch.js"></script>
<script src="<?php echo ADMIN_JS; ?>admin.js"></script>
<script src="<?php echo ADMIN_JS; ?>upload.js"></script>

<?php if(isset($_SESSION['message'])): ?>
    <script type="text/javascript">
        messageManagement(<?php echo json_encode($_SESSION['message']); ?>);
    </script>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>


