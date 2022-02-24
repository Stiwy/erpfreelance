<?php

namespace App\Controller;

use App\Classes\Search;
use App\Form\SearchType;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    public function index(string $entity, Request $request): Response
    {
        $search = new Search();

        switch ($entity) {
            case 'customer':
                $form = $this->createForm(SearchType::class, $search, [
                    'action' => $this->generateUrl('search_customer'),
                    'placeholder' => 'Rechercher un client ...'
                ]);
                break;

            default:
                dd('Erreur');
        }

        return $this->renderForm('_searchBar.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('rechercher/client', name: 'search_customer', methods: ['POST'])]
    public function customer(Request $request, CustomerRepository $customerRepository): Response
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('customer/index.html.twig', [
                'customers' => $customerRepository->findBySearch($search->getValue())
            ]);
        }

        return $this->render('customer/index.html.twig', [
            'customers' => $customerRepository->findAll()
        ]);
    }
}
