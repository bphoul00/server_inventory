<?php


namespace App\Controller;

use App\Entity\Server;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administrative")
 */
class AdministrativeController extends AbstractController
{

    /**
     * @Route("/index", name="administrative_index", methods={"GET"})
     * @return Response
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function index()
    {
/*
        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'http://127.0.0.1:8000/api/servers');
        dd($response);

        return $this->render('administrative/index.html.twig', [
            'test' => $response,
        ]);
*/
    }

    /**
     * @Route("/add", name="administrative_add", methods={"GET","POST"})
     * @return Response
     */
    public function add( )
    {
        return $this->render('administrative/add.html.twig');
    }

    /**
     * @Route("/edit/{id}", name="administrative_edit", methods={"GET","POST"})
     * @return Response
     */
    public function edit($id)
    {
        return $this->render('administrative/edit.html.twig');
    }
}
