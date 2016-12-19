<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PatientAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('prenom', 'text');
        $formMapper->add('nom', 'text');
        $formMapper->add('dateDeNaissance', 'date');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('prenom');
        $datagridMapper->add('nom');
        $datagridMapper->add('dateDeNaissance');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('prenom');
        $listMapper->addIdentifier('nom');
        $listMapper->addIdentifier('dateDeNaissance');
    }
}