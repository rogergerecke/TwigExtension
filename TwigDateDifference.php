<?php

namespace App\Twig;

use DateTimeImmutable;
use Exception;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigDateDifference extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('date_difference', [$this, 'calculateDateDifference']),
        ];
    }

    /**
     * Calculate days between given date range
     * format default %a full days
     *
     * @throws Exception
     */
    public function calculateDateDifference($start, $end, $format = '%a'): string
    {
        $origin = new DateTimeImmutable($start);
        $target = new DateTimeImmutable($end);
        $interval = $origin->diff($target);
        return $interval->format($format);
    }
}
