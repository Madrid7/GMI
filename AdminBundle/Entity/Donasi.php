<?php

namespace GMI\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Donasi
 */
class Donasi
{
    /**
     * @var string
     */
    private $nama;

    /**
     * @var string
     */
    private $bank;

    /**
     * @var \DateTime
     */
    private $waktu;

    /**
     * @var string
     */
    private $resi;

    /**
     * @var integer
     */
    private $nominal;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set nama
     *
     * @param string $nama
     * @return Donasi
     */
    public function setNama($nama)
    {
        $this->nama = $nama;

        return $this;
    }

    /**
     * Get nama
     *
     * @return string 
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Set bank
     *
     * @param string $bank
     * @return Donasi
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return string 
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set waktu
     *
     * @param \DateTime $waktu
     * @return Donasi
     */
    public function setWaktu($waktu)
    {
        $this->waktu = $waktu;

        return $this;
    }

    /**
     * Get waktu
     *
     * @return \DateTime 
     */
    public function getWaktu()
    {
        return $this->waktu;
    }

    /**
     * Set resi
     *
     * @param string $resi
     * @return Donasi
     */
    public function setResi($resi)
    {
        $this->resi = $resi;

        return $this;
    }

    /**
     * Get resi
     *
     * @return string 
     */
    public function getResi()
    {
        return $this->resi;
    }

    /**
     * Set nominal
     *
     * @param integer $nominal
     * @return Donasi
     */
    public function setNominal($nominal)
    {
        $this->nominal = $nominal;

        return $this;
    }

    /**
     * Get nominal
     *
     * @return integer 
     */
    public function getNominal()
    {
        return $this->nominal;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Donasi
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var \DateTime
     */
    private $tanggal;


    /**
     * Set tanggal
     *
     * @param \DateTime $tanggal
     * @return Donasi
     */
    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;

        return $this;
    }

    /**
     * Get tanggal
     *
     * @return \DateTime 
     */
    public function getTanggal()
    {
        return $this->tanggal;
    }
}
