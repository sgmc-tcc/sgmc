<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class EquipamentoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('setor',EntityType::class, array(
                'class' => 'AppBundle\Entity\Setor',
                'choice_label' => 'nome'
            ))
            ->add('imageFile', VichImageType::class, array(
                'label' => 'Foto',
                'required' => true,
                'allow_delete' => false,
                'image_uri' => false,
                'download_uri' => false
            ))
            ->add('nome', TextType::class)
            ->add('tipoEquipamento', TextType::class)
            ->add('marca', TextType::class)
            ->add('modelo', TextType::class)
            ->add('descricao', TextareaType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'AppBundle\Entity\Equipamento'));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_equipamento';
    }

}