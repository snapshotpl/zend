<?php

namespace PhpBenchmarksZend\RestApi\Controller;

use PhpBenchmarksRestData\Service;
use PhpBenchmarksZend\RestApi\Event\RandomizeLocaleEvent;
use PhpBenchmarksZend\RestApi\Transformer\RestApiTransformer;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\I18n\Translator;
use Zend\View\Model\JsonModel;

class RestApiController extends AbstractActionController
{
    /** @var RestApiTransformer */
    protected $transformer;

    public function __construct(Translator $translator, RestApiTransformer $transformer)
    {
        $this->transformer = $transformer;

        // if somebody could define this listener in module.config.php, do not hesitate to create a pull request
        // when i follow examples to do it, listener is attached, but not on right EventManager
        // spl_object_hash() of EventManager who have Listener attached
        // and spl_object_hash() of $this->getEventManager() are different
        $this->getEventManager()->attach(
            'randomizeLocale',
            function(RandomizeLocaleEvent $event) {
                $locales = ['fr_FR', 'en_GB', 'aa_BB'];
                $event->setLocale($locales[rand(0, 2)]);
            }
        );

        $event = new RandomizeLocaleEvent();
        $this->getEventManager()->triggerEvent($event);
        $translator->setLocale($event->getLocale());
        $translator->setFallbackLocale('en');
    }

    public function restAction()
    {
        return new JsonModel($this->transformer->usersToArray(Service::getUsers()));
    }
}
