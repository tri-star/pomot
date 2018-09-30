<?php
$finder = PhpCsFixer\Finder::create()
    ->name('*.php')
    ->exclude('tests')    // ここから除外フォルダー
    ->exclude('node_modules')
    ->exclude('vendor')
    ->exclude('storage')
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'ordered_imports' => true,
        'binary_operator_spaces' =>  [
            'operators' => [
                '=>' => 'align',
                '=' => null,
            ],
        ],
        'single_quote' => true,
        'trailing_comma_in_multiline_array' => true,
    ])
    ->setUsingCache(false)
    ->setFinder($finder);