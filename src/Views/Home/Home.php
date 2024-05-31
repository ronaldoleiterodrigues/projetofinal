<?php require_once 'Views/Shared/Header.php'; ?>
<div class="body wd-100 hg-full bg-p3-paper  ">

                <div class="login-container">
                    <form class="login-form" action="#" method="post">
                        <h2>Login</h2>
                        <div class="input-group">
                            <input type="text" id="username" name="usuario" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="input-group">
                            <input type="password" id="password" name="senha" required>
                            <label for="password">Password</label>
                        </div>
                        <button type="submit">Login</button>
                    </form>
                </div>
</div>
<?php require_once 'Views/Shared/Footer.php'; ?>