<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        body {
            font-family: "Courier New", Courier, monospace;
            font-size: 2rem;
        }

        .txtelegantshadow {
            font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
            padding-top: 40px;
            color: #c4ff02 !important;
            background-color: #dd2717 !important;
            letter-spacing: .15em;
            text-shadow: 1px -1px 0 #ac413e, -1px 2px 1px #737272, -2px 4px 1px #767474, -3px 6px 1px #787777, -4px 8px 1px #7b7a7a, -5px 10px 1px #7f7d7d, -6px 12px 1px #828181, -7px 14px 1px #868585, -8px 16px 1px #8b8a89, -9px 18px 1px #8f8e8d, -10px 20px 1px #949392, -11px 22px 1px #b3ba2d, -12px 24px 1px #9e9c9c, -13px 26px 1px #a3a1a1, -14px 28px 1px #b71313, -15px 30px 1px #adabab, -16px 32px 1px #b2b1b0, -17px 34px 1px #b7b6b5, -18px 36px 1px #bcbbba, -19px 38px 1px #c1bfbf, -20px 40px 1px #c6c4c4, -21px 42px 1px #cbc9c8, -22px 44px 1px #cfcdcd, -23px 46px 1px #d4d2d1, -24px 48px 1px #d8d6d5, -25px 50px 1px #dbdad9, -26px 52px 1px #dfdddc, -27px 54px 1px #41d930, -28px 56px 1px #e4e3e2;
        }

        .txtelegantshadow h1 {
            font-size: 5rem;
        }

        h2 {
            font-size: 3rem;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="p-5 txtelegantshadow bg-primary text-white text-center">
        <h1>WELCOME TO AJAX</h1>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= BASE_URL ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>?act=users">Quản lý User</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <?php require_once PATH_VIEW . $view . '.php' ?>
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
    </div>
</body>

</html>