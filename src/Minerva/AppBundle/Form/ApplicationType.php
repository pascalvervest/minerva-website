<?php

declare(strict_types=1);

namespace Minerva\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * ApplicationType form
 *
 * @package Minerva\AppBundle\Form
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class ApplicationType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'application.entity.name'
            ])
            ->add('age', NumberType::class, [
                'label' => 'application.entity.age'
            ])
            ->add('location', TextType::class, [
                'label' => 'application.entity.location'
            ])
            ->add('charactername', TextType::class, [
                'label' => 'application.entity.charactername'
            ])
            ->add('class', TextType::class, [
                'label' => 'application.entity.class'
            ])
            ->add('armory', TextType::class, [
                'label' => 'application.entity.armory'
            ])
            ->add('battletag', TextType::class, [
                'label' => 'application.entity.battletag'
            ])
            ->add('mainspec', TextType::class, [
                'label' => 'application.entity.mainspec'
            ])
            ->add('offspec', TextType::class, [
                'label' => 'application.entity.offspec'
            ])
            ->add('offspec', TextType::class, [
                'label' => 'application.entity.offspec'
            ])
            ->add('experience', TextareaType::class, [
                'label' => 'application.entity.offspec'
            ])
            ->add('gametime', TextareaType::class, [
                'label' => 'application.entity.gametime'
            ])
            ->add('communication', TextareaType::class, [
                'label' => 'application.entity.communication'
            ])
            ->add('criticism', TextareaType::class, [
                'label' => 'application.entity.criticism'
            ])
            ->add('effort', TextareaType::class, [
                'label' => 'application.entity.effort'
            ])
            ->add('availability', TextareaType::class, [
                'label' => 'application.entity.availability'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'application.entity.btn_save',
                'attr' => [
                    'class' => 'button'
                ]
            ])
        ;
    }
}
