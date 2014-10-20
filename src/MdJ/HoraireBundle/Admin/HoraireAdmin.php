<?php

namespace MdJ\HoraireBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class HoraireAdmin extends Admin {

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('eglise')
            ->add('lieu')
            ->add('jour')
            ->add('heureDebut')
            ->add('heureFin')
            ->add('type')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('eglise')
            ->add('lieu')
            ->add('jour')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('eglise')
            ->add('lieu')
            ->addIdentifier('jour')
            ->add('heureDebut')
            ->add('heureFin')
        ;
    }

} 