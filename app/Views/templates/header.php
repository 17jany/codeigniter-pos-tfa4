<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title) ?> | Simple POS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #171717;
            background-color: #f3f4f6;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 14px 8%;
            background-color: #171717;
        }

        .brand {
            margin-right: auto;
            color: #ffffff;
            font-size: 17px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        nav a {
            padding: 9px 14px;
            color: #e5e5e5;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.2s ease;
        }

        nav a:hover,
        nav a.active {
            color: #171717;
            background-color: #e5e7eb;
            transform: translateY(-2px);
        }

        .logged-in-user {
            padding: 9px 8px;
            color: #d4d4d4;
            font-size: 14px;
        }

        nav .logout-link {
            color: #ffffff;
            background-color: #b42318;
        }

        nav .logout-link:hover {
            color: #ffffff;
            background-color: #8f1c13;
        }

        main {
            width: min(1100px, 88%);
            min-height: calc(100vh - 190px);
            margin: 45px auto;
        }

        h1 {
            margin: 0 0 15px;
            color: #171717;
            font-size: 38px;
        }

        h2 {
            color: #262626;
        }

        .eyebrow {
            margin-bottom: 12px;
            color: #525252;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        .subtitle {
            max-width: 750px;
            color: #525252;
            line-height: 1.7;
        }

        .hero {
            padding: 52px;
            background-color: #ffffff;
            border-left: 6px solid #171717;
            border-radius: 10px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        }

        .hero h1 {
            max-width: 750px;
            font-size: 43px;
            line-height: 1.15;
        }

        .button {
            display: inline-block;
            margin-top: 16px;
            padding: 11px 18px;
            color: #ffffff;
            background-color: #171717;
            text-decoration: none;
            border: 1px solid #171717;
            border-radius: 6px;
            transition: 0.2s ease;
        }

        .button:hover {
            color: #171717;
            background-color: #e5e7eb;
            border-color: #a3a3a3;
            transform: translateY(-2px);
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 24px;
        }

        .card {
            padding: 24px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 9px;
            transition: 0.2s ease;
        }

        .card:hover {
            background-color: #f5f5f5;
            border-color: #a3a3a3;
            box-shadow: 0 7px 16px rgba(0, 0, 0, 0.08);
            transform: translateY(-4px);
        }

        .card h2 {
            margin: 0 0 10px;
            font-size: 19px;
        }

        .card p {
            margin: 0;
            color: #555555;
            line-height: 1.6;
        }

        .card-link {
            color: inherit;
            text-decoration: none;
        }

        .table-section {
            padding: 32px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
            overflow-x: auto;
        }

        .record-count {
            display: inline-block;
            margin: 8px 0 0;
            padding: 7px 12px;
            color: #404040;
            background-color: #eeeeee;
            border-radius: 20px;
            font-size: 14px;
        }

        table {
            width: 100%;
            min-width: 650px;
            margin-top: 22px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            border-bottom: 1px solid #dddddd;
            text-align: left;
        }

        th {
            color: #ffffff;
            background-color: #171717;
        }

        tbody tr {
            transition: 0.2s ease;
        }

        tbody tr:hover {
            background-color: #eeeeee;
        }

        .number {
            color: #525252;
            font-weight: bold;
        }

        .role {
            display: inline-block;
            padding: 5px 10px;
            color: #262626;
            background-color: #e5e5e5;
            border: 1px solid #d4d4d4;
            border-radius: 20px;
            font-size: 14px;
        }

        .empty-message {
            padding: 30px;
            color: #666666;
            text-align: center;
        }

        footer {
            padding: 22px;
            color: #737373;
            text-align: center;
            border-top: 1px solid #dddddd;
        }

        @media (max-width: 750px) {
            nav {
                flex-wrap: wrap;
            }

            .brand {
                width: 100%;
                margin-bottom: 5px;
            }

            .logged-in-user {
                width: 100%;
                padding: 6px 0;
            }

            main {
                width: 92%;
                margin: 25px auto;
            }

            .hero {
                padding: 30px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .card-grid {
                grid-template-columns: 1fr;
            }

            .table-section {
                padding: 22px;
            }
        }
    </style>
</head>

<body>
    <nav>
        <span class="brand">SIMPLE POS</span>

        <a
            href="<?= site_url('/') ?>"
            class="<?= $title === 'Home' ? 'active' : '' ?>"
        >
            Home
        </a>

        <a
            href="<?= site_url('about') ?>"
            class="<?= $title === 'About' ? 'active' : '' ?>"
        >
            About
        </a>

        <?php if (session()->get('isLoggedIn')): ?>
            <a
                href="<?= site_url('customers') ?>"
                class="<?= $title === 'Customer Accounts' ? 'active' : '' ?>"
            >
                Customers
            </a>

            <a
                href="<?= site_url('users') ?>"
                class="<?= $title === 'User Accounts' ? 'active' : '' ?>"
            >
                Users
            </a>

            <span class="logged-in-user">
                <?= esc(session()->get('full_name')) ?>
            </span>

            <a
                href="<?= site_url('logout') ?>"
                class="logout-link"
            >
                Logout
            </a>
        <?php else: ?>
            <a
                href="<?= site_url('login') ?>"
                class="<?= $title === 'Login' ? 'active' : '' ?>"
            >
                Login
            </a>
        <?php endif; ?>
    </nav>

    <main>