<?php

namespace MdJ\HoraireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $horaires = $this->getDoctrine()->getRepository('MdJHoraireBundle:Horaire')->findBy(array(), null, 10);

        return $this->render('MdJHoraireBundle:Default:index.html.twig', array('horaires' => $horaires));
    }
}
