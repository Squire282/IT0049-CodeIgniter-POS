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

        <h1>User Accounts</h1>

        <!-- Success Message -->
        <?php if (session()->has('success')): ?>

            <div class="success">
                <p><?= esc(session('success')) ?></p>
            </div>

        <?php endif; ?>


        <!-- Error Message -->
        <?php if (session()->has('error')): ?>

            <div class="errors">
                <p><?= esc(session('error')) ?></p>
            </div>

        <?php endif; ?>


        <!-- Add New User -->
        <p>
            <a href="<?= site_url('users/new') ?>">
                Add New User
            </a>
        </p>


        <?php if (!empty($users)): ?>

            <table>

                <tr>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>

                <?php foreach ($users as $user): ?>

                    <tr>

                        <td>

                            <?php if (!empty($user['avatar'])): ?>

                                <img
                                    src="<?= base_url(
                                        'uploads/avatars/' .
                                        $user['avatar']
                                    ) ?>"
                                    alt="Avatar"
                                    width="70"
                                    height="70"
                                >

                            <?php else: ?>

                                <img
                                    src="<?= base_url(
                                        'uploads/avatars/placeholder.png'
                                    ) ?>"
                                    alt="Placeholder Avatar"
                                    width="70"
                                    height="70"
                                >

                            <?php endif; ?>

                        </td>


                        <td>
                            <?= esc($user['username']) ?>
                        </td>


                        <td>
                            <?= esc($user['full_name']) ?>
                        </td>


                        <td>
                            <?= esc($user['created_at']) ?>
                        </td>


                        <td>

                            <a href="<?= site_url(
                                'users/edit/' . $user['id']
                            ) ?>">
                                Edit
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </table>

        <?php else: ?>

            <p>No user records found.</p>

        <?php endif; ?>

    </div>

</body>
</html>