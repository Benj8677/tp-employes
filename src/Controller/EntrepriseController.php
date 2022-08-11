<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployesType;
use App\Repository\EmployesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntrepriseController extends AbstractController
{
    #[Route('/', name: 'app_entreprise')]
    public function index(EmployesRepository $repo): Response
    {
        $employes = $repo->findAll();

        return $this->render('entreprise/index.html.twig', [
            'tabEmployes' => $employes,
        ]);
    }

    #[Route('/new', name: 'addEmp')]
    #[Route('/edit/{id}', name: 'updEmp')]
    public function form(Request $superglobals, EntityManagerInterface $manager, Employes $employes = null)
    {

        if (!$employes)
        {
            $employes = new Employes;
        }

        $form = $this->createForm(EmployesType::class, $employes);

        $form->handleRequest($superglobals);


        if ($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($employes);
            $manager->flush();
            
            if ($employes->getId() !== null)
            {
                $id = $employes->getId();
                $this->addFlash('success', "L'employé n°$id a bien été modifié !");
            }
            else
            {
                $this->addFlash('success', "L'employé a bien été ajouté !");
            }


            return $this->redirectToRoute("app_entreprise", [
                'id' => $employes->getId()
            ]);
        }

        return $this->renderForm("entreprise/form.html.twig", [
            'formEmployes' => $form,
            'editMode' => $employes->getId() !== null
        ]);
    }

       
    #[Route('/del/{id}', name: 'delEmp')]
    public function delete(EntityManagerInterface $manager, $id, EmployesRepository $repo)
    {
        $employes = $repo->find($id);

        $manager->remove($employes);

        $manager->flush();

        $this->addFlash('success', "L'employé n°$id a bien été supprimé !");

        return $this->redirectToRoute('app_entreprise');
    }
}


