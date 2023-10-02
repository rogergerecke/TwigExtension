<?php

namespace App\Twig;

use DateTimeImmutable;
use Exception;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigDateDifference extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('date_difference', [$this, 'calculateDateDifference']),
        ];
    }

    /**
     * @throws Exception
     */
    public function calculateDateDifference($start, $end, $format = 'd')
    {
        $origin = new DateTimeImmutable($start);
        $target = new DateTimeImmutable($end);
        $interval = $origin->diff($target);
        return $interval->format($format);
    }
}
