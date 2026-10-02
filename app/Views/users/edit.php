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

    <?php if (session()->get('logged_in')): ?>

        <a href="/customers">Customers</a>
        <a href="/users">Users</a>
        <a href="/logout">Logout</a>

    <?php else: ?>

        <a href="/login">Login</a>

    <?php endif; ?>
</nav>

<div class="container">

    <h1>Edit User</h1>

    <?php if (session()->has('errors')): ?>

        <div class="errors">

            <?php foreach (session('errors') as $error): ?>

                <p><?= esc($error) ?></p>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>


    <?php if (!empty($user['avatar'])): ?>

        <p>Current Avatar:</p>

        <img
            src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
            alt="User Avatar"
            width="120"
            height="120"
        >

    <?php endif; ?>


    <form
        action="<?= site_url('users/update/' . $user['id']) ?>"
        method="post"
        enctype="multipart/form-data"
    >

        <?= csrf_field() ?>


        <p>
            <label for="username">Username</label><br>

            <input
                type="text"
                id="username"
                name="username"
                value="<?= old('username', $user['username']) ?>"
            >
        </p>


        <p>
            <label for="full_name">Full Name</label><br>

            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= old('full_name', $user['full_name']) ?>"
            >
        </p>


        <p>
            <label for="avatar">Profile Picture</label><br>

            <input
                type="file"
                id="avatar"
                name="avatar"
                accept=".jpg,.jpeg,.png"
            >
        </p>

        <p>
            JPG or PNG only. Maximum file size: 2MB.
        </p>


        <button type="submit">
            Update User
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