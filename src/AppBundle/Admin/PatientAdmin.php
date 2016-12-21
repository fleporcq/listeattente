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
        $formMapper
            ->add('prenom', 'text')
            ->add('nom', 'text')
            ->add('dateDeNaissance', 'date', [
                'required' => false,
            ])
            ->add('telephone1', 'text', [
                'required' => false,
            ])
            ->add('telephone2', 'text', [
                'required' => false,
            ])
            ->add('telephone3', 'text', [
                'required' => false,
            ])
            ->add('adresse', 'textarea', [
                'required' => false,
            ])
            ->add('activite', 'text', [
                'required' => false,
            ])
            ->add('notes', 'textarea', [
                'required' => false,
            ]);
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