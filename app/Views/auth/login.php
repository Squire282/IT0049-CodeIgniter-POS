<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

    <div class="container">

        <h1>POS Login</h1>

        <?php if (session()->has('errors')): ?>

            <div class="errors">

                <?php foreach (session('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>

            </div>

        <?php endif; ?>


        <?php if (session()->has('error')): ?>

            <div class="errors">
                <p><?= esc(session('error')) ?></p>
            </div>

        <?php endif; ?>


        <form action="<?= site_url('login') ?>" method="post">

            <?= csrf_field() ?>

            <p>
                <label for="username">Username</label><br>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= old('username') ?>"
                >
            </p>


            <p>
                <label for="password">Password</label><br>

                <input
                    type="password"
                    id="password"
                    name="password"
                >
            </p>


            <button type="submit">
                Login
            </button>

        </form>

    </div>

</body>
</html>