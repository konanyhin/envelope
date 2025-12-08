<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

return (new Config())
    ->setParallelConfig(ParallelConfigFactory::detect()) // @TODO 4.0 no need to call this manually
    ->setRiskyAllowed(false)
    ->setRules([
        '@PhpCsFixer' => true,
        'concat_space' => [
            'spacing' => 'one'
        ],
    ])
    ->setFinder(
        (new Finder())
            // 💡 root folder to check
            ->in(__DIR__ . '/src')
    );
