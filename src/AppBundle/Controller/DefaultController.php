<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration as Config;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Config\Route("/")
     * @Config\Template
     */
    public function indexAction()
    {
        $regionList = [
            'global' => 'global',
            'fr'     => 'france',
            'gb'     => 'great_britain',
        ];

        $localeList = [
            'en',
            'fr',
            'fr_BE',
        ];

        return [
            'region_list' => $regionList,
            'locale_list' => $localeList,
        ];
    }

    /**
     * @Config\Route("/change_locale/{_locale}")
     */
    public function changeLocaleAction()
    {
        return $this->redirectToRoute('app_default_index');
    }

    /**
     * @Config\Route("/change_localization/{localization}")
     */
    public function changeLocalizationAction()
    {
        return $this->redirectToRoute('app_default_index');
    }

}
