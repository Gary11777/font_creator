<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create and customize bitmap fonts with Font Creator">
    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="images/favicon.ico" sizes="any">
    <title>Font Creator v.1 - Bitmap Font Designer</title>
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
                        <div class="row">
                            <button class="left-menu" data-value="1" aria-label="Tool 1">1</button>
                            <button class="left-menu" data-value="2" aria-label="Tool 2">2</button>
                            <button class="left-menu" data-value="3" aria-label="Tool 3">3</button>
                        </div>
                        <div class="row">
                            <button class="left-menu" data-value="4" aria-label="Tool 4">4</button>
                            <button class="left-menu" data-value="5" aria-label="Tool 5">5</button>
                            <button class="left-menu" data-value="6" aria-label="Tool 6">6</button>
                        </div>
                        <div class="row">
                            <button class="left-menu" data-value="7" aria-label="Tool 7">7</button>
                            <button class="left-menu" data-value="8" aria-label="Tool 8">8</button>
                            <button class="left-menu" data-value="9" aria-label="Tool 9">9</button>
                        </div>
                        <div class="row">
                            <button class="left-menu" data-value="10" aria-label="Tool 10">10</button>
                            <button class="left-menu" data-value="11" aria-label="Tool 11">11</button>
                            <button class="left-menu" data-value="12" aria-label="Tool 12">12</button>
                        </div>
                        <div class="row">
                            <button class="left-menu" data-value="13" aria-label="Tool 13">13</button>
                            <button class="left-menu" data-value="14" aria-label="Tool 14">14</button>
                            <button class="left-menu" data-value="15" aria-label="Tool 15">15</button>
                        </div>
                    </div>
                </div>
                <div class="col-40">
                    <h2 class="name_of_block">Character editor: width=8 height=8</h2>
                    <!-- Pixel grid for character editing -->
                    <table id="pixel-grid" class="matrix8" role="grid" aria-label="8x8 pixel editor grid">
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