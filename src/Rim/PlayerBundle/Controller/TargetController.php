<?php

namespace Rim\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TargetController extends Controller
{
    /**
     * @Route("/process")
     * @Template()
     */
    public function processAction()
    {
        return array(
                // ...
            );    }

}
