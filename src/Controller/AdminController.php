<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller;
use App\Repository\EnvironnementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AdminController
 *
 * @author Cohen
 */
class AdminController extends AbstractController
 {
    private EnvironnementRepository $repository;
    
    public function __construct(EnvironnementRepository $repository) {
    $this->repository = $repository;
}
    
    #[Route('/admin/environnements', name: 'admin.environnements')]
    public function environnements(): Response{
        $environnements =$this->repository->findAll();
        return $this->render("admin/admin.environnements.html.twig", [
            'environnements' =>$environnements
       ]);
    }
}
