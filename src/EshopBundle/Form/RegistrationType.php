<?php

namespace EshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use EshopBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType,
 Symfony\Component\Form\Extension\Core\Type\EmailType,
 Symfony\Component\Form\Extension\Core\Type\RepeatedType,
 Symfony\Component\Form\Extension\Core\Type\PasswordType,
 Symfony\Component\Form\Extension\Core\Type\SubmitType,
 Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrationType
 *
 * @author marelu
 */
class RegistrationType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setMethod("post")
                ->add("name", TextType::class, array(
                        "label" => "Jméno",
                        "attr" => array("class" => "form-control")
                    ))
                ->add("surname", TextType::class, array(
                        "label" => "Příjmení",
                        "attr" => array("class" => "form-control")
                    ))
                ->add("email", EmailType::class, array(
                        "label" => "Email",
                        "attr" => array("class" => "form-control")
                    ))
                ->add("address", TextType::class, array(
                        "label" => "Adresa",
                        "attr" => array("class" => "form-control"),
                        "required" => FALSE
                    ))
                ->add("phone", NumberType::class, array(
                        "label" => "Telefoní číslo",
                        "attr" => array("class" => "form-control"),
                        "required" => FALSE
                    ))
                ->add("password", RepeatedType::class, array(
                        "type" => PasswordType::class,
                        "options" => array("attr" =>array("class" => "form-control")),
                        "first_options"  => array("label" => "Heslo"),
                        "second_options"  => array("label" => "Heslo znovu"),
                        "invalid_message" => "Zadaná hesla se neshodují!"
                    ))
                ->add("register", SubmitType::class, array(
                        "label" => "Zaregistrovat se",
                        "attr" => array("class" => "btn btn-success float-right",
                            "id" => "btn-register")
                    ));
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
           "data_class" => User::class
        ));
    }
    
    public function getName()
    {
        return "eshop_form_registration";
    }
}
