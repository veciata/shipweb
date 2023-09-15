<?php

namespace App\Form;

use App\Entity\ShipmentEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use function PHPSTORM_META\type;

class KargoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nereden',ChoiceType::class, [
                'choices'  => [
                    'Türkiye' => 0,
                    'Avrupa' => 1,
                    'Asya' => 2,                    
                ],
                'required'=>true,])
            ->add('nereye',ChoiceType::class, [
                'choices'  => [
                    'Türkiye' => 0,
                    'Avrupa' => 1,
                    'Asya' => 2,                    
                ],
                'required'=>true,])
            ->add('sender')
            ->add('receiver')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ShipmentEntity::class,
        ]);
    }
}
