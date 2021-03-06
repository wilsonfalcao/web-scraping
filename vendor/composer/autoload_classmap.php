<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'ICrawler' => $baseDir . '/src/bin/scraping/abstractions/ICrawler.php',
    'IReadsMethods' => $baseDir . '/src/bin/scraping/abstractions/IReadsMethods.php',
    'ISites' => $baseDir . '/src/bin/sites/abstractions/ISites.php',
    'SiteObject\\Amazon' => $baseDir . '/src/bin/sites/Amazon.php',
    'SiteObject\\GoodReads' => $baseDir . '/src/bin/sites/GoodReads.php',
    'abstractions\\Curl' => $baseDir . '/src/bin/scraping/abstractions/Curl.php',
    'abstractions\\Livro' => $baseDir . '/src/bin/sites/abstractions/Livro.php',
    'abstractions\\LivroFull' => $baseDir . '/src/bin/sites/abstractions/Livro.php',
    'abstractions\\LivroPrice' => $baseDir . '/src/bin/sites/abstractions/Livro.php',
    'abstractions\\Personagens' => $baseDir . '/src/bin/sites/abstractions/Livro.php',
    'abstractions\\SiteMapLivro' => $baseDir . '/src/bin/sites/abstractions/SiteMap.php',
    'abstractions\\SiteMapLivroFull' => $baseDir . '/src/bin/sites/abstractions/SiteMap.php',
    'abstractions\\SiteMapLivroPrice' => $baseDir . '/src/bin/sites/abstractions/SiteMap.php',
    'bin\\SitesCrawler' => $baseDir . '/src/bin/SitesCrawler.php',
);
