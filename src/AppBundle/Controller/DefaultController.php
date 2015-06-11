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
        return [];
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
