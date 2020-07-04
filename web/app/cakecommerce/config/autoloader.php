<?php

/**
 * Implementação do autoloader segundo as especificações da PSR-4.
 * Link da PSR: https://www.php-fig.org/psr/psr-4/
 * Link da implementação: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md
 *
 * @param string $class O nome completo da classe.
 * @return void
 */

spl_autoload_register(function ($class) {
    $prefix = 'Cake\\App\\';

    $base_dir = ROOTPATH . '/src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
