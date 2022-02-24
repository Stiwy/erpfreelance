<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('filter_name', [$this, 'doSomething']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('customerStatus', [$this, 'customerStatus']),
            new TwigFunction('phoneFormat', [$this, 'phoneFormat']),
        ];
    }

    public function customerStatus($customer): string
    {
        return '<div class="rounded-xl bg-yellow-500 px-3 inline-block">To DO: à faire</div>';
    }

    public function phoneFormat($phone): string
    {
        $numbers = str_split($phone, 2);
        return implode(' ', $numbers);
    }
}
