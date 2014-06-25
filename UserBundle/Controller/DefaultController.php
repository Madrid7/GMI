<?php

namespace GMI\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GMI\UserBundle\Entity\User;

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

    public function ubahprofilAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($request->getMethod()=='POST'){
            
            $userManager = $this->get('fos_user.user_manager');
            $name = $request->get('name');
            $sex = $request->get('sex');
            $address = $request->get('address');
            $town = $request->get('town');
            $cp = $request->get('cp');
            
            $user->setName($name);
            $user->setSex($sex);
            $user->setAddress($address);
            $user->setTown($town);
            $user->setCp($cp);
            $userManager->updateUser($user);
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirect($this->generateUrl('profil_page'));
        }

        return $this->render('GMIUserBundle:User:ubahprofil.html.twig');
    }
}
