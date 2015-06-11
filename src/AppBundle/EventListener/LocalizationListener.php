<?php

namespace AppBundle\EventListener;

use L10nBundle\Business\L10nProvider;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LocalizationListener implements EventSubscriberInterface
{
    /**
     * @var L10nProvider
     */
    private $l10nProvider;

    /**
     * @param L10nProvider $l10nProvider
     */
    public function __construct(L10nProvider $l10nProvider)
    {
        $this->l10nProvider = $l10nProvider;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        if ($localization = $request->attributes->get('localization')) {
            $request->getSession()->set('localization', $localization);
        }

        if ($localization = $request->getSession()->get('localization')) {
            $this->l10nProvider->setDefaultLocalization($localization);
        }
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => [['onKernelRequest', 17]],
        ];
    }
}
