<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Group;
use AppBundle\Entity\Person;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Config;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PropertyPathController extends Controller
{
    /**
     * @Config\Route("/property-path")
     * @Config\Template
     */
    public function indexAction(Request $request)
    {
        $person = new Person();
        $person->setFirstName('Tristan');

        $group  = new Group();
        $group->setName('Theodo');

        $person->joinGroup($group);

        $form = $this->createForm('person', $person);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // do things
        }

        return [
            'form' => $form->createView(),
        ];
    }
}
