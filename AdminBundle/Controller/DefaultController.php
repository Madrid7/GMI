<?php

namespace GMI\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GMI\AdminBundle\Entity\FosUser;
use GMI\AdminBundle\Entity\Berita;

class DefaultController extends Controller
{
	public function indexAction()
    {
    	return $this->render('GMIAdminBundle:Default:index.html.twig');
    }

    public function adminpageAction()
    {
    	return $this->render('GMIAdminBundle:Admin:adminpage.html.twig');
    }

    public function inputberitaAction(Request $request)
    {
    	if ($request->isMethod('POST')) {
		    
		    	$judul=$request->get('judul');
	            $isi=$request->get('isi');
	            $penulis=$request->get('penulis');
	            
	            $news = new Berita();
	            $news->setTanggal(new \DateTime("now"));
	            $news->setJudul($judul);
	            $news->setIsi($isi);
	            $news->setSumber($penulis);
	            
	            $em = $this->getDoctrine()->getEntityManager();
	            $em->persist($news);
	            $em->flush();
	            return $this->redirect($this->generateUrl('gmi_admin_homepage'));
	        
		}
    }
}
