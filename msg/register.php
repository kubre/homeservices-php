<?php if (isset($_GET['msg'])): ?>
<div class="container" style="margin-top: 30px">

    <?php if ($_GET['msg'] == 'success'): ?>
    <div class="alert alert-success">
        <h4>Registering</h4>
        <p>Service provider registered.</p>
    </div>

    <?php elseif ($_GET['msg'] == 'failed'): ?>
    <div class="alert alert-danger">
        <h4>Failed</h4>
        <p>Problem while Registering! Please try again later!</p>
    </div>

    <?php elseif ($_GET['msg'] == 'file'): ?>
    <div class="alert alert-danger">
        <h4>Problem While Uploding Photo</h4>
        <p>Problem while Uploding Photo! Please Try again later!</p>
    </div>
    <?php endif; ?>

</div>
<?php endif;
