<?php

namespace MdJ\HoraireBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MdJ\HoraireBundle\Entity\Eglise;

class LoadEgliseData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = $this->getData(file(__DIR__. '/fixtures/eglise.csv'));
        foreach($data as $key=>$row) {
            $eglise = new Eglise();
            $eglise->setNom($row['nom']);
            $eglise->setCodePostal($row['code_postal']);
            $eglise->setVille($row['ville']);
            $manager->persist($eglise);
            $this->addReference('eglise'.$key, $eglise);
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
        return 1;
    }
}
