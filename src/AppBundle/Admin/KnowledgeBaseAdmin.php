<?php

namespace AppBundle\Admin;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class KnowledgeBaseAdmin extends AbstractAdmin
{
    /**
     * {@inheritdoc}
     */
    protected $datagridValues = [
        '_page'       => 1,
        '_sort_order' => 'ASC',
        '_sort_by'    => 'name',
    ];

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('issue')
            ->add('answer', CKEditorType::class, [
                'attr'  => [
                    'class' => 'shortDesc',
                ],
            ])
            ->add('collection', 'sonata_type_model', array('required' => false))
            ->add('tags')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('custom', 'string', array(
                'template' => 'knowledge_base\list_custom_field.html.twig',
                'label' => 'Entity',
                'sortable' => 'name',
            ))
            ->add('created');
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('tags', null, array('field_options' => array('expanded' => true, 'multiple' => true)))
            ->add('collection');
    }
}
