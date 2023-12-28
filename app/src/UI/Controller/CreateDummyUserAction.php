<?php

declare(strict_types=1);

namespace App\UI\Controller;

use App\Application\Command\CreateUser;
use App\UI\Form\Dto\UserDto;
use App\UI\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class CreateDummyUserAction extends AbstractController
{
    #[Route('/api/create-user')]
    public function __invoke(Request $request, MessageBusInterface $messageBus): Response
    {
        $userDto = new UserDto();

        $form = $this->createForm(UserType::class, $userDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userDto = $form->getData();

            $command = new CreateUser($userDto->getFirstName(), $userDto->getSurname(), $userDto->getEmail());

            $messageBus->dispatch($command);
        }

        return $this->render('createUserForm.html.twig', [
            'form' => $form,
        ]);
    }
}
