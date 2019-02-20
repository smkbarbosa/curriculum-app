<?php

namespace App\Form;

use App\Entity\Candidato;
use App\Entity\Tecnologias;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Extension\Core\Type\BirthdayTypeTest;
use Symfony\Component\Form\Tests\Extension\Core\Type\TextTypeTest;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, [
                'label' => 'Nome',
                'attr' => [
                    'placeholder' => 'Informe seu nome'
                ]
            ])
            ->add('idade', TextType::class, [
                'label' => 'Idade',
                'attr' => [
                    'placeholder' => 'Informe sua idade'
                ]
            ])
            ->add('sexo', ChoiceType::class, [
                'label' => 'Sexo',
                'choices'=> ['Masculino'=>'no', 'Feminino'=>'no'],
            ])
            ->add('dataNascimento', BirthdayType::class,[
                'widget'=>'single_text'
            ])
            ->add('pretensaoSalarial', TextType::class, [
                'label' => 'Pretensão Salarial',
                'attr' => [
                    'placeholder' => 'Informe sua pretensão salarial'
                ]
            ])
            ->add('foto', FileType::class)
            ->add('cargo', CargoType::class)
            ->add('endereco', EnderecoType::class)
            ->add('historico', HistoricoProfissionalType::class)
            ->add('tecnologias', TecnologiasType::class)
            ->add('btn_submit', SubmitType::class, [
                'label' => 'Enviar'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidato::class,
        ]);
    }
}
