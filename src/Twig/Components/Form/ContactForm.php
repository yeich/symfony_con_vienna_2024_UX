<?php

namespace App\Twig\Components\Form;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class ContactForm extends AbstractController
{

    use ComponentWithFormTrait;
    use DefaultActionTrait;

    #[LiveProp]
    public array $initialData = [];

    #[LiveAction]
    public function submit() {
        $this->submitForm();

        $data = $this->getForm()->getData();
        dd($data);
    }

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(ContactFormType::class, $this->initialData);
    }
}