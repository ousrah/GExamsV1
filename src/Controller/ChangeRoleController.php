<?php

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChangeRoleController extends AbstractController
{

    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }


    #[Route('/change_role', name: 'change_role')]
    public function index(): Response
    {
        return $this->render('change_role/index.html.twig', [
            'controller_name' => 'ChangeRoleController',
        ]);
    }



    #[Route('/changeRole', name: 'changeRole')]
    public function changeRole(RequestStack $requestStack, Request $request, EntityManagerInterface $em)
    {
       
        $role = $request->request->get('role');
        $requestStack->getSession()->set('_role', $role);
        return new Response("ok");
      
    }
    


}
