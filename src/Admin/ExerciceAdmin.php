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
use function Sodium\add;

final class ExerciceAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Résumé')
                ->with('titre', ['class' => 'col-md-5'])
                ->add('nom', TextType::class)
                ->add('numero',TextType::class)
                ->end()
                ->with('Objectifs', ['class' => 'col-md-7'])
                ->add('objectif',TextareaType::class)
                ->end()
            ->end()
            ->tab('Avant')
                ->with('Mise en place', ['class' => 'col-md-6'])
                ->add('miseEnPlace',TextareaType::class)
                ->end()
                ->with('Consignes', ['class' => 'col-md-6'])
                ->add('consigne',TextareaType::class)
                ->end()
            ->end()
            ->tab('Pendant')
                ->with('Conseils', ['class' => 'col-md-6'])
                ->add('conseil',TextareaType::class)
                ->end()
                ->with('Régulations', ['class' => 'col-md-6'])
                ->add('regulation',TextareaType::class)
                ->end()
            ->end()
            ->tab('infos')
                ->with('organisation', ['class' => 'col-md-6'])
                ->add('nb_participant',NumberType::class)
                ->add('nb_gardien',NumberType::class)
                ->add('duree',NumberType::class)
                ->end()
                ->with('organisation', ['class' => 'col-md-6'])
                ->add('gratuit',BooleanType::class)
                ->add('statut',ChoiceType::class)
                ->end()
            ->end()
            ->tab('Classement')
            ->add('type',EntityType::class,[
                // looks for choices from this entity
                'class' => Type::class,
                'choice_label' => 'nom',
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('poste',EntityType::class,[
                // looks for choices from this entity
                'class' => Poste::class,
                'choice_label' => 'nom',
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('categorie',EntityType::class,[
                // looks for choices from this entity
                'class' => Categorie::class,
                'choice_label' => 'nom',
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('niveau',EntityType::class,[
                // looks for choices from this entity
                'class' => Niveau::class,
                'choice_label' => 'nom',
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
            ])
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