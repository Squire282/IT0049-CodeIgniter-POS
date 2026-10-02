<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/customers">Customers</a>
        <a href="/users">Users</a>
    </nav>

    <div class="container">

        <h1>Add New User</h1>

        <?php if (session()->has('errors')): ?>

            <div class="errors">

                <?php foreach (session('errors') as $error): ?>

                    <p><?= esc($error) ?></p>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>


        <form action="<?= site_url('users/create') ?>" method="post">

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
                <label for="full_name">Full Name</label><br>

                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    value="<?= old('full_name') ?>"
                >
            </p>


            <button type="submit">
                Add User
            </button>

        </form>


        <p>
            <a href="<?= site_url('users') ?>">
                Back to Users
            </a>
        </p>

    </div>

</body>
</html>