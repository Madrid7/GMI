<?php

namespace GMI\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GMIUserBundle:Default:Template.html.twig');
    }

    public function userhomeAction()
    {
        return $this->render('GMIUserBundle:User:userhome.html.twig');
    }

    public function konfirmasiAction()
    {
        return $this->render('GMIUserBundle:User:formkonfirmasi.html.twig');
    }

    public function donasisayaAction()
    {
        return $this->render('GMIUserBundle:User:donasisaya.html.twig');
    }

    public function profilAction()
    {
        return $this->render('GMIUserBundle:User:profil.html.twig');
    }

    public function ubahprofilAction()
    {
        return $this->render('GMIUserBundle:User:ubahprofil.html.twig');
    }
}
