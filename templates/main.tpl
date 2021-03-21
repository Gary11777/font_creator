<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
    <!-- <link rel="shortcut icon" href="pic/favicon.ico" /> -->
    <title>Font Creator v.1</title>
</head>
<body>
    <!-- header +++ -->
    <header>
        <div class="container">
            <div class="row">
                <a href="{FILE_ID}" class="logo"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <div class="row">
                <nav class="main_menu_nav">
                    <ul>
                        {FILE="main_menu.tpl"}
                    </ul>
                </nav>
            </div>
            <div class="row">
                <hr class="hr_menu">
                <nav class="second_menu_nav">
                    <ul>
                        {FILE="second_menu.tpl"}
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- header --- -->

    <!-- main +++ -->
    <div class="main">
        <!-- main container +++ -->
        <div class="container">
            <div class="row">
                <div class="col-1-3"></div>
                <div class="col-2-3"></div>
            </div>
            <div class="row">
                <div class="col-1-2"></div>
                <div class="col-1-2"></div>
            </div>
            <div class="row">
                <div class="col-1-4"></div>
                <div class="col-1-4"></div>
                <div class="col-1-2"></div>
            </div>
        </div>
        <!-- main container --- -->
    </div>
    <!-- main --- -->

    <!-- footer +++ -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-1-3"></div>
                <div class="col-1-3"></div>
                <div class="col-1-3"></div>
            </div>
    </footer>
    <!-- footer --- -->
</body>
</html>