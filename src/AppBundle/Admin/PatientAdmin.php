<?php
namespace AppBundle\Admin;

use AppBundle\Entity\Appel;
use AppBundle\Entity\Patient;
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
            ->add('dateDeNaissance', 'sonata_type_date_picker', [
                'required' => false,
                'format' => 'dd/MM/yyyy',
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
            ])
            ->add('troubles', 'sonata_type_model', [
                'required' => false,
                'multiple' => true,
                'btn_add' => false,
            ])
            ->add('appels', 'sonata_type_collection', [
                'by_reference' => false,
            ], [
                'edit' => 'inline',
                'inline' => 'table',
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

    /**
     * @param Patient $patient
     */
    public function prePersist($patient)
    {

        foreach ($patient->getAppels() as $appel) {
            /** @var Appel $appel */
            $appel->setPatient($patient);
        }
    }

    /**
     * @param Patient $patient
     */
    public function preUpdate($patient)
    {
        $this->prePersist($patient);
    }
}