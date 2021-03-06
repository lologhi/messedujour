<?php

namespace MdJ\HoraireBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MdJ\HoraireBundle\Entity\Lieu;

class LoadLieuData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = $this->getData(file(__DIR__. '/fixtures/lieu.csv'));
        foreach($data as $key=>$row) {
            $lieu = new Lieu();
            $lieu->setNom($row['nom']);
            $lieu->setEglise($this->getReference('eglise'.$row['ref_eglise']));
            $manager->persist($lieu);
            $this->addReference('lieu'.$key, $lieu);
        }
        $manager->flush();
    }

    public function getData($handle)
    {
        $headers = array();
        $datas = array();

        foreach($handle as $index => $line){
            $cells = explode(',', $line);
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
        return 2;
    }
}
