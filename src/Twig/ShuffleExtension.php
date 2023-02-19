<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ShuffleExtension extends AbstractExtension
{
  public function getFunctions()
  {
    return [
      new TwigFunction('shuffle', [$this, 'shuffleArray']),
    ];
  }

  public function shuffleArray(array $array)
  {
    shuffle($array);
    return $array;
  }
}
