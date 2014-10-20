<?php

namespace MdJ\HoraireBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MdJ\HoraireBundle\Entity\Horaire;

class LoadMesseData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = $this->getData(file(__DIR__. '/fixtures/horaire.csv'));
        foreach($data as $key=>$row) {
            $horaire = new Horaire();
            $heureDebut = new \DateTime();
            $horaire->setHeureDebut($heureDebut->setTime($row['heure'], $row['minute'], 0));
            $horaire->setJour($row['jour']);
            $horaire->setEglise($this->getReference('eglise'.$row['ref_eglise']));
            $horaire->setLieu($this->getReference('lieu'.$row['ref_lieu']));
            $horaire->setType($row['details']);
            $manager->persist($horaire);
            $this->addReference('horaire'.$key, $horaire);
        }
        $manager->flush();
    }

    public function getData($handle)
    {
        $headers = array();
        $datas = array();

        foreach($handle as $index => $line){
            $cells = explode(';', $line);
            if( $index == 0 ) {
                foreach($cells as $cell) {
                    $headers[] = trim($cell);
                }
            } else {
                $line = array();
                foreach($cells as $edx => $cell) {
                    $line[$headers[$edx]] = $cell;
                }
                $datas[] = $line;
            }
        }
        return $datas;
    }

    public function getOrder() {
        return 3;
    }
}
