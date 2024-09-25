<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VisiteRepository;

/**
 * Description of AccueilController
 *
 * @author Cohen
 */
class AccueilController extends AbstractController  {
    
    /**
     * 
     * @var VisiteRepository
     */
    private $repository;
    
    /**
     * 
     * @param VisiteRepository $repository
     */
    public function __construct(VisiteRepository $repository){
        $this->repository = $repository;
    }
    
    #[Route('/', name: 'accueil')]
    public function index(): Response{
    $visites = $this->repository->findAllLasted(2); // On charge les visites avant de rendre la vue
    return $this->render("pages/accueil.html.twig", [
        'visites' => $visites // On passe la variable visites à la vue
    ]);
}

}
