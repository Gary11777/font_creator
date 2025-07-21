<?php

declare(strict_types=1);

/**
 * Main entry point for the Font Creator application
 * 
 * @package FontCreator
 */

// Enable error reporting for development
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Set default timezone
date_default_timezone_set('UTC');

// Set security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');

// Register autoloader
spl_autoload_register(function (string $className): void {
    $file = __DIR__ . '/class/' . $className . '.class.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

try {
    // Initialize template
    $template = new Template();

    // Load menu points
    $menuPointsFile = __DIR__ . '/db/menu_points.php';
    if (!file_exists($menuPointsFile)) {
        throw new RuntimeException('Menu points configuration file not found');
    }
    
    $menuPoints = require $menuPointsFile;
    if (!is_array($menuPoints)) {
        throw new RuntimeException('Invalid menu points configuration');
    }

    // Set main template
    $mainTemplate = 'templates/main.tpl';
    if (!file_exists(__DIR__ . '/' . $mainTemplate)) {
        throw new RuntimeException("Main template file '{$mainTemplate}' not found");
    }
    $template->setMainTemplate($mainTemplate);
    
    // Set menu points
    $template->setMenuPoints($menuPoints);

    // Process and output the page
    $template->processTemplate();
    echo $template->getFinalPage();
    
} catch (Throwable $e) {
    // Log the error (in a real app, use a proper logger)
    error_log('Error: ' . $e->getMessage());
    
    // Display user-friendly error page
    if (!headers_sent()) {
        header('HTTP/1.1 500 Internal Server Error');
    }
    
    // In production, show a generic error message
    if (ini_get('display_errors')) {
        echo '<h1>An error occurred</h1>';
        echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
    } else {
        echo '<h1>An error occurred</h1>';
        echo '<p>Please try again later or contact support if the problem persists.</p>';
    }
}