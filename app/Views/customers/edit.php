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

        <h1>Edit Customer</h1>

        <?php if (session()->has('errors')): ?>

            <div class="errors">

                <?php foreach (session('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <form
            action="<?= site_url('customers/update/' . $customer['id']) ?>"
            method="post"
        >

            <?= csrf_field() ?>

            <p>
                <label for="full_name">Full Name</label><br>

                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    value="<?= old('full_name', $customer['full_name']) ?>"
                >
            </p>

            <p>
                <label for="email">Email</label><br>

                <input
                    type="text"
                    id="email"
                    name="email"
                    value="<?= old('email', $customer['email']) ?>"
                >
            </p>

            <p>
                <label for="phone">Phone</label><br>

                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="<?= old('phone', $customer['phone']) ?>"
                >
            </p>

            <button type="submit">Update Customer</button>

        </form>

        <p>
            <a href="<?= site_url('customers') ?>">Back to Customers</a>
        </p>

    </div>

</body>
</html>