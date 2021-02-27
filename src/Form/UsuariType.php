<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use App\Entity\Usuari;


class UsuariType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('login', TextType::class)
        ->add('password', TextType::class)
        ->add('email', EmailType::class)
        ->add('save', SubmitType::class, array('label' => 'Enviar'));
        }
}
?>