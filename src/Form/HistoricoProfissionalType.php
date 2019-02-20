<?php

namespace App\Form;

use App\Entity\HistoricoProfissional;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HistoricoProfissionalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomeEmpresa')
            ->add('dataEntrada', DateType::class,[
                'widget'=>'single_text',
            ])
            ->add('dataSaida', DateType::class,[
                'widget'=>'single_text'
            ])
            ->add('empregoAtual', CheckboxType::class, [
                'required'=> 'false'

            ])
            ->add(  'atribuicoes', TextareaType::class,[
                'label'=> 'Atribuições'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HistoricoProfissional::class,
        ]);
    }
}
