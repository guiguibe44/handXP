<?php


namespace App\Admin;


use App\Entity\Categorie;
use App\Entity\Niveau;
use App\Entity\Poste;
use App\Entity\Type;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\Form\Type\BooleanType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use function Sodium\add;

final class ExerciceAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Résumé')
                ->with('titre', ['class' => 'col-md-5'])
                ->add('nom', TextType::class)
                ->add('numero',TextType::class,[
                    'required' => false,
                ])
                ->end()
                ->with('Objectifs', ['class' => 'col-md-7'])
                ->add('objectif',TextareaType::class,[
                'required' => false,
            ])

/*                ->add('objectif',CKEditorType::class,['config' => array(
        'uiColor' => '#ffffff',
    ),])*/

                ->end()
            ->end()
            ->tab('Avant')
                ->with('Démarrage', ['class' => 'col-md-6'])
                ->add('demarrage',TextareaType::class,[
                    'required' => false,
                ])
                ->end()
                ->with('Consignes', ['class' => 'col-md-6'])
                ->add('consigne',TextareaType::class,[
                    'required' => false,
                ])
                ->end()
            ->end()
            ->tab('Pendant')
                ->with('Conseils', ['class' => 'col-md-6'])
                ->add('conseil',TextareaType::class,[
                    'required' => false,
                ])
                ->end()
                ->with('Régulations', ['class' => 'col-md-6'])
                ->add('regulation',TextareaType::class,[
                    'required' => false,
                ])
                ->end()
            ->end()
            ->tab('infos')
                ->with('organisation', ['class' => 'col-md-6'])
                ->add('nb_participant',NumberType::class,[
                    'required' => false,
                ])
                ->add('nb_gardien',NumberType::class,[
                    'required' => false,
                ])
                ->add('duree',NumberType::class,[
                    'required' => false,
                ])
                ->end()
                ->with('organisation', ['class' => 'col-md-6'])
                ->add('gratuit',BooleanType::class)
                ->end()
            ->end()
            ->tab('Classement')


            ->with('Type', ['class' => 'col-md-6'])
            ->add('type',EntityType::class,[
                //'required' => false,
                'class' => Type::class,
                'choice_label' => 'nom',
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => false,
            ])
            ->end()
            ->with('poste', ['class' => 'col-md-6'])
            ->add('poste',EntityType::class,[
                // looks for choices from this entity
                'class' => Poste::class,
                'choice_label' => 'nom',
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => false,
            ])
            ->end()
            ->with('categorie', ['class' => 'col-md-6'])
            ->add('categorie',EntityType::class,[
                // looks for choices from this entity
                'class' => Categorie::class,
                'choice_label' => 'nom',
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => false,
            ])
            ->end()
            ->with('niveau', ['class' => 'col-md-6'])
            ->add('niveau',EntityType::class,[
                // looks for choices from this entity
                'class' => Niveau::class,
                'choice_label' => 'nom',
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => false,
            ])
            ->end()
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nom');
    }
}