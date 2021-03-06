<?php

namespace GMI\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GMI\UserBundle\Entity\User;
use GMI\AdminBundle\Entity\Donasi;
use GMI\AdminBundle\Entity\Berita;
use GMI\AdminBundle\Entity\Jadwal;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p FROM GMIAdminBundle:Berita p ORDER BY p.id DESC')
                ->setMaxResults(6);
        $berita = $query->getResult();
        return $this->render('GMIUserBundle:Default:index.html.twig', array('berita' => $berita));
    }

    public function newspageAction($id)
    {
        $berita = $this->getDoctrine()->getRepository('GMIAdminBundle:Berita')->find($id);
        return $this->render('GMIUserBundle:Default:newspage.html.twig', array('berita' => $berita));
    }

    public function jadwalpageAction()
    {
        $jadwal = $this->getDoctrine()->getRepository('GMIAdminBundle:Jadwal')->findAll();
        return $this->render('GMIUserBundle:Default:jadwalpage.html.twig', array('jadwal' => $jadwal));
    }

    public function userhomeAction()
    {
        return $this->render('GMIUserBundle:User:userhome.html.twig');
    }

    public function konfirmasiAction(Request $request)
    {
        if($request->getMethod()=='POST'){
            $nama=$request->get('nama');
            $bank=$request->get('bank');
            $tanggal=$request->get('tanggal');
            $waktu=$request->get('waktu');
            $resi=$request->get('resi');
            $nominal=$request->get('nominal');
            $status=$request->get('status');

            $konf = new Donasi();
            $konf->setNama($nama);
            $konf->setBank($bank);
            $konf->setTanggal(new \DateTime("$tanggal"));
            $konf->setWaktu(new \DateTime("$waktu"));
            //$konf->setWaktu($waktu);
            $konf->setResi($resi);
            $konf->setNominal($nominal);
            $konf->setStatus($status);
            
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($konf);
            $em->flush();
            return $this->redirect($this->generateUrl('konfirmasi_page'));
        }

        return $this->render('GMIUserBundle:User:formkonfirmasi.html.twig');
    }

    public function donasisayaAction()
    {
        $user = $this->getUser()->getName();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT SUM(p.nominal) FROM GMIAdminBundle:Donasi p WHERE p.nama = :name AND p.status = 1');
        $total = $query->setParameter('name', $user)->getSingleScalarResult();
        //$jlh = $query->getSingleScalarResult();

        $donasi = $this->getDoctrine()->getRepository('GMIAdminBundle:Donasi')->findBy(array('nama' => $user, 'status' => 1), array('id' => 'desc'));
        return $this->render('GMIUserBundle:User:donasisaya.html.twig', array('donasi' => $donasi, 'total' => $total));
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
