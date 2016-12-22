<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;

class AppelAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('date', 'sonata_type_date_picker', [
                'format' => 'dd/MM/yyyy',
            ])
            ->add('notes', 'textarea', [
                'required' => false,
            ]);
    }
}