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

        <h1>Customer Accounts</h1>

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


        <!-- Add New Customer -->
        <p>
            <a href="<?= site_url('customers/new') ?>">
                Add New Customer
            </a>
        </p>


        <?php if (!empty($customers)): ?>

            <table>

                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>

                <?php foreach ($customers as $customer): ?>

                    <tr>

                        <td>
                            <?= esc($customer['full_name']) ?>
                        </td>

                        <td>
                            <?= esc($customer['email']) ?>
                        </td>

                        <td>
                            <?= esc($customer['phone']) ?>
                        </td>

                        <td>
                            <?= esc($customer['created_at']) ?>
                        </td>

                        <td>
                            <a href="<?= site_url('customers/edit/' . $customer['id']) ?>">
                                Edit
                            </a>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </table>

        <?php else: ?>

            <p>No customer records found.</p>

        <?php endif; ?>

    </div>

</body>
</html>