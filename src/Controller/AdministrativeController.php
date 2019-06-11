<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use GuzzleHttp\Client;


/**
 * @Route("/administrative")
 */
class AdministrativeController extends AbstractController
{

    /**
     * @Route("/index", name="administrative_index", methods={"GET"})
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index()
    {

        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'http://www.mocky.io/v2/5cff0b5d3200000f0045f2c9');
        $servers =json_decode($response->getContent());

        return $this->render('administrative/index.html.twig', [
            'servers' => $servers,
        ]);

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
