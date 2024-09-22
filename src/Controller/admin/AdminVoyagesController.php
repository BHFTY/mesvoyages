<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller\admin;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Visite;
use App\Form\VisiteType;

class AdminVoyagesController extends AbstractController {

/**
 *
 *  @var VisiteRepository
 */
private $repository;

/**
 * @param VisiteRepository $repository
 */
public function __construct(VisiteRepository $repository) {
    $this->repository = $repository;
}

 #[Route('/admin', name: 'admin.voyages')]
    public function index(): Response {
        $visites = $this->repository->findAllOrderBy('datecreation', 'DESC');
        return $this->render("admin/admin.voyages.html.twig",[
            'visites'  =>$visites
    ]);
    }
    
    #[Route('/admin/edit/{id}', name: 'admin.voyages.edit')]
    public function edit(int $id,Request $request): Response {
        $visite = $this->repository->find($id);
        $formVisite = $this->createForm(VisiteType::class, $visite);
        
        $formVisite->handleRequest($request);
        if($formVisite ->isSubmitted() && $formVisite->isValid()){
            $this->repository->add($visite);
            return $this->redirectToRoute('admin.voyages');
        }
        return $this->render("admin/admin.voyage.edit.html.twig",[
            'visite' => $visite,
            'formvisite'  =>$formVisite->createView()
        ]);
    }
}

     
     

