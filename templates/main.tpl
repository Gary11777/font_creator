<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create and customize bitmap fonts with Font Creator">
    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css" />
    <title>Font Creator v.1</title>
</head>
<body>
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="skip-link visually-hidden">Skip to main content</a>
    
    <!-- header +++ -->
    <header>
        <div class="container">
            <div class="row">
                <a href="{FILE_ID}" class="logo"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <div class="row">
                <nav class="main_menu_nav">
                    <ul>
                        {MENU_POINT="main_menu"}
                    </ul>
                </nav>
            </div>
            <div class="row">
                <hr class="hr_menu">
                <nav class="second_menu_nav">
                    <ul>
                        {MENU_POINT="second_menu"}
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- header --- -->

    <!-- main +++ -->
    <main id="main-content" class="main">
        <!-- main container +++ -->
        <div class="container">
            <div class="row">
                <div class="col-20">
                    <div id="left_menu">
                        <button class="left-menu">1</button>
                        <button class="left-menu">2</button>
                        <button class="left-menu">3</button>

                        <button class="left-menu">4</button>
                        <button class="left-menu">5</button>
                        <button class="left-menu">6</button>

                        <button class="left-menu">7</button>
                        <button class="left-menu">8</button>
                        <button class="left-menu">9</button>

                        <button class="left-menu">10</button>
                        <button class="left-menu">11</button>
                        <button class="left-menu">12</button>

                        <button class="left-menu">13</button>
                        <button class="left-menu">14</button>
                        <button class="left-menu">15</button>
                    </div>
                </div>
                <div class="col-40">
                    <p class="name_of_block">Character editor: width=8 height=8</p>
                    <table class="matrix8">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="col-40"></div>
            </div>
            <div class="row">
                <div class="col-20"></div>
                <div class="col-40">
                    <div id="result_code">

                    </div>
                </div>
                <div class="col-40"></div>
            </div>
        </div>
        <!-- main container --- -->
    </div>
    </main>
    <!-- main --- -->

    <!-- footer +++ -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-20">
                    <p>&copy; <?= date('Y') ?> Font Creator</p>
                </div>
                <div class="col-40"></div>
                <div class="col-40"></div>
            </div>
        </div>
    </footer>
    <!-- footer --- -->

    <!-- Scripts at the end for better performance -->
    <script src="js/matrix.js" defer></script>
</body>
</html>