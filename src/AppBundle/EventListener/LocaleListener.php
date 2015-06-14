<?php

namespace AppBundle\EventListener;

use L10nBundle\Business\L10nProvider;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LocaleListener implements EventSubscriberInterface
{
    /**
     * @var string
     */
    private $defaultLocale;

    /**
     * @var L10nProvider
     */
    private $l10nProvider;

    /**
     * @param string       $defaultLocale
     * @param L10nProvider $l10nProvider
     */
    public function __construct(
        $defaultLocale,
        L10nProvider $l10nProvider
    ) {
        $this->defaultLocale = $defaultLocale;
        $this->l10nProvider  = $l10nProvider;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        // try to see if the locale has been set as a _locale routing parameter
        if ($locale = $request->attributes->get('_locale')) {
            $request->getSession()->set('_locale', $locale);
        // if no explicit locale has been set on this request, use one from the session
        } else {
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }
        $this->l10nProvider->setDefaultLocale($request->getLocale());
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            // must be registered before the default Locale listener
            KernelEvents::REQUEST => [['onKernelRequest', 17]],
        ];
    }
}
