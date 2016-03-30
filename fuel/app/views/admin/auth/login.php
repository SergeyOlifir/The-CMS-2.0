<div class="container">
    <div class="login-container">
        <div id="output"></div>
        <div class="avatar">
            <?= \Fuel\Core\Asset::img('aninimus.jpg', array('class' => 'main-avatar')); ?>
        </div>
        <div class="form-box">
            <?= Fuel\Core\Form::open();?>
                <input name="username" type="text" placeholder="username">
                <input name="password" type="password" placeholder="password">
                <button class="btn btn-info btn-block login" type="submit">Login</button>
            <?= Fuel\Core\Form::close(); ?>
        </div>
    </div>
</div>