<?php

namespace GMI\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GMI\AdminBundle\Entity\FosUser;
use GMI\AdminBundle\Entity\Berita;
use GMI\AdminBundle\Entity\Donasi;
use GMI\AdminBundle\Entity\Korban;
use GMI\AdminBundle\Entity\Jadwal;
use GMI\UserBundle\Entity\User;

class DefaultController extends Controller
{
	public function indexAction()
    {
    	return $this->render('GMIAdminBundle:Default:index.html.twig');
    }

    public function adminhomeAction()
    {
    	return $this->render('GMIAdminBundle:Admin:adminhome.html.twig');
    }

    public function memberAction()
    {
    	$member = $this->getDoctrine()->getRepository('GMIUserBundle:User')->findBy(array(), array('name' => 'desc'));
    	return $this->render('GMIAdminBundle:Admin:member.html.twig', array('member' => $member));
    }

    public function deletememberAction(Request $request, $id)
    {
        $member = $this->getDoctrine()->getRepository('GMIUserBundle:User')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($member);
        $em->flush();
           
        return $this->redirect($this->generateUrl('member_adminpage'));
    }

    public function inboxAction()
    {
    	$donasi = $this->getDoctrine()->getRepository('GMIAdminBundle:Donasi')->findByStatus((0), array('id' => 'desc'));
    	return $this->render('GMIAdminBundle:Admin:inbox.html.twig', array('donasi' => $donasi));
    }

    public function editinboxAction(Request $request, $id)
    {
        $donasi = $this->getDoctrine()->getRepository('GMIAdminBundle:Donasi')->find($id);
        if($request->getMethod()=='POST'){
            $status=$request->get('status');
            $donasi->setStatus($status);
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirect($this->generateUrl('inbox_adminpage'));
        }
           
        return $this->render('GMIAdminBundle:Admin:editinbox.html.twig', array('donasi' => $donasi));
    }

    public function deleteinboxAction(Request $request, $id)
    {
        $donasi = $this->getDoctrine()->getRepository('GMIAdminBundle:Donasi')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($donasi);
        $em->flush();
           
        return $this->redirect($this->generateUrl('inbox_adminpage'));
    }

    public function laporanAction()
    {
    	$donasi = $this->getDoctrine()->getRepository('GMIAdminBundle:Donasi')->findByStatus((1), array('id' => 'desc'));
    	return $this->render('GMIAdminBundle:Admin:laporan.html.twig', array('donasi' => $donasi));
    }

    public function deletelaporanAction(Request $request, $id)
    {
        $donasi = $this->getDoctrine()->getRepository('GMIAdminBundle:Donasi')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($donasi);
        $em->flush();
           
        return $this->redirect($this->generateUrl('laporan_adminpage'));
    }

    public function korbanAction(Request $request)
    {
    	if($request->getMethod()=='POST'){
		    
		    	$name=$request->get('name');
	            $sex=$request->get('sex');
	            $address=$request->get('address');
	            $disease=$request->get('disease');
	            
	            $kor = new Korban();
	            $kor->setName($name);
	            $kor->setSex($sex);
	            $kor->setAddress($address);
	            $kor->setDisease($disease);
	            
	            $em = $this->getDoctrine()->getManager();
	            $em->persist($kor);
	            $em->flush();
	            return $this->redirect($this->generateUrl('korban_page'));
	    }

    	$korban = $this->getDoctrine()->getRepository('GMIAdminBundle:Korban')->findAll();
    	return $this->render('GMIAdminBundle:Admin:penerima.html.twig', array('korban' => $korban));
    }

    public function deletekorbanAction(Request $request, $id)
    {
        $korban = $this->getDoctrine()->getRepository('GMIAdminBundle:Korban')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($korban);
        $em->flush();
           
        return $this->redirect($this->generateUrl('korban_adminpage'));
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
			return $this->redirect($this->generateUrl('berita_adminpage'));
		}
		$berita = $this->getDoctrine()->getRepository('GMIAdminBundle:Berita')->findBy(array(), array('id'=>'desc'));
		return $this->render('GMIAdminBundle:Admin:berita.html.twig', array('berita' => $berita));	    
	}

	public function deleteberitaAction(Request $request, $id)
    {
        $berita = $this->getDoctrine()->getRepository('GMIAdminBundle:Berita')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($berita);
        $em->flush();
           
        return $this->redirect($this->generateUrl('berita_adminpage'));
    }

	public function inputjadwalAction(Request $request)
    {
    	if ($request->isMethod('POST')) {

			$judul=$request->get('judul');
			$tgl=$request->get('tgl');
			$waktu=$request->get('waktu');
			$alamat=$request->get('alamat');
			$panitia=$request->get('panitia');
			$cp=$request->get('cp');

			$event = new Jadwal();
			$event->setTanggal(new \DateTime("now"));
			$event->setJudul($judul);
			$event->setTanggalEvent(new \DateTime($tgl));
			$event->setWaktuEvent(new \DateTime($waktu));
			$event->setAlamat($alamat);
			$event->setPanitia($panitia);
			$event->setCp($cp);

			$em = $this->getDoctrine()->getEntityManager();
			$em->persist($event);
			$em->flush();
			return $this->redirect($this->generateUrl('jadwal_adminpage'));
		}
		$jadwal = $this->getDoctrine()->getRepository('GMIAdminBundle:Jadwal')->findBy(array(), array('id'=>'desc'));
		return $this->render('GMIAdminBundle:Admin:jadwal.html.twig', array('jadwal' => $jadwal));	    
	}

	public function deletejadwalAction(Request $request, $id)
    {
        $jadwal = $this->getDoctrine()->getRepository('GMIAdminBundle:Jadwal')->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($jadwal);
        $em->flush();
           
        return $this->redirect($this->generateUrl('jadwal_adminpage'));
    }
}
