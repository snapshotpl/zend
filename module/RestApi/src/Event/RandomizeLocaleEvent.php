<?php

namespace PhpBenchmarksZend\RestApi\Event;

use Zend\EventManager\Event;

class RandomizeLocaleEvent extends Event
{
    /** @var string */
    protected $locale;

    public function getName()
    {
        return 'randomizeLocale';
    }

    /**
     * @param string $locale
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /** @return string */
    public function getLocale()
    {
        return $this->locale;
    }
}
