<?php

namespace AppBundle\Admin;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;

class ProjectAdmin extends AbstractAdmin
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
                ->add('description', CKEditorType::class, [
                        'attr'  => [
                            'class' => 'shortDesc',
                        ],
                ])
                ->add('challenge', CKEditorType::class)
                ->add('imageTemplate', ModelListType::class,
                    [
                        'required' => false,
                        'help'     => 'Perfect: Width = 1920, Height = 576; 
                                       Normal: Width = 1600, Height = 480',
                    ],
                    [
                        'placeholder'     => 'No image selected',
                        'provider'        => 'sonata.media.provider.image',
                        'link_parameters' => [
                            'context' => 'projectTemplate',
                        ],
                    ]
                )
                ->add('imageLogo', ModelListType::class,
                    [
                        'required' => false,
                        'help'     => 'Max-Width = 160',
                    ],
                    [
                        'placeholder'     => 'No image selected',
                        'provider'        => 'sonata.media.provider.image',
                        'link_parameters' => [
                            'context' => 'projectLogo',
                        ],
                    ]
                )
                ->add('solutions')
                ->add('weight')
                ->add('status', null, [
                    'required' => false,
                ])
                ->add('displayOnHome', null, [
                    'label' => 'Display on home',
                    'required' => false,
                ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('weight')
            ->add('status', null, [
                'label' => 'Enabled',
            ])
            ->add('displayOnHome');
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name')
            ->add('status', null, [
                'label' => 'Enabled',
            ])
            ->add('displayOnHome', null, [
                'label' => 'Display on Home page',
            ]);
    }
}
