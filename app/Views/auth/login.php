<section class="login-section">
    <div class="login-card">
        <p class="page-label">POS AUTHENTICATION</p>
        <h1>Staff Login</h1>

        <p class="page-description">
            Enter your staff account credentials to continue.
        </p>

        <?php $errors = session()->getFlashdata('errors'); ?>

        <?php if (! empty($errors)): ?>
            <div class="error-message">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= esc(old('username')) ?>"
                    autocomplete="username"
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="current-password"
                >
            </div>

            <button type="submit" class="login-button">
                Log In
            </button>
        </form>
    </div>
</section>

<style>
    .login-section {
        display: flex;
        justify-content: center;
        padding: 60px 20px;
    }

    .login-card {
        box-sizing: border-box;
        width: 100%;
        max-width: 480px;
        padding: 36px;
        border-radius: 12px;
        background: #ffffff;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.10);
    }

    .page-label {
        margin: 0 0 8px;
        font-size: 13px;
        letter-spacing: 2px;
    }

    .login-card h1 {
        margin: 0 0 10px;
        font-size: 34px;
    }

    .page-description {
        margin-bottom: 26px;
        color: #555555;
    }

    .error-message {
        margin-bottom: 20px;
        padding: 14px 18px;
        border-left: 4px solid #b42318;
        background: #fef3f2;
        color: #7a271a;
    }

    .error-message ul {
        margin: 0;
        padding-left: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-weight: 600;
    }

    .form-group input {
        box-sizing: border-box;
        width: 100%;
        padding: 12px;
        border: 1px solid #cccccc;
        border-radius: 6px;
        font-size: 16px;
    }

    .login-button {
        width: 100%;
        padding: 13px 20px;
        border: none;
        border-radius: 6px;
        background: #151515;
        color: #ffffff;
        font-size: 16px;
        cursor: pointer;
    }
</style>