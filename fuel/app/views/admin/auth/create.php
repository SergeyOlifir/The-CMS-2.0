<div class="container">
    <div class="login-container">
        <div id="output"></div>
        
        <div class="form-box">
            <?= Fuel\Core\Form::open();?>
                <input name="username" type="text" placeholder="username">
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <button class="btn btn-info btn-block login" type="submit">Create</button>
            <?= Fuel\Core\Form::close(); ?>
        </div>
    </div>
</div>