<?php


namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;


/**
 * @Route("/administrative")
 */
class AdministrativeController extends AbstractController
{
    /**
     * @Route("/index", name="administrative_index", methods={"GET"})
     * @param RouterInterface $router
     * @return Response
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function index(RouterInterface $router)
    {
        /**@var User $user */
        $user = $this->getUser();

        $httpClient = HttpClient::create(['auth_bearer' =>  $user->getApiToken()]);
        $response = $httpClient->request('GET', $this->url(). $router->generate('api_servers_list'));

        $servers =json_decode($response->getContent());

        return $this->render('administrative/index.html.twig', [
            'servers' => $servers,
            'email' => $user->getEmail()
        ]);
    }

    /**
     * @Route("/add", name="administrative_add", methods={"GET","POST"})
     * @param Request $request
     * @param RouterInterface $router
     * @return RedirectResponse|Response
     * @throws TransportExceptionInterface
     */
    public function add(Request $request, RouterInterface $router)
    {
        $address = $request->get('address');
        /**@var User $user */
        $user = $this->getUser();
        if ($address) {
            $httpClient = HttpClient::create(['auth_bearer' =>  $user->getApiToken()]);
            $response = $httpClient->request(
                'POST',
                $this->url(). $router->generate('api_servers_add'),
                [
                    'query' => ['address' => $address ]
                ]
            );
            if ($response->getStatusCode() == 201) {
                $this->addFlash('success', "The server has been created successfully.");

                return $this->redirectToRoute('administrative_index');
            }
        }
        return $this->render('administrative/add.html.twig', [
            'address' => $address,
            'email' => $user->getEmail()

        ]);
    }

    /**
     * @Route("/edit/{id}", name="administrative_edit", methods={"GET","POST"})
     * @param $id
     * @param Request $request
     * @param RouterInterface $router
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function edit($id, Request $request, RouterInterface $router)
    {
        $address = $request->get('address');
        /**@var User $user */
        $user = $this->getUser();
        $httpClient = HttpClient::create(['auth_bearer' =>  $user->getApiToken()]);
        $serverJson = $httpClient->request(
            'GET',
            $this->url(). $router->generate('api_servers_find_one',["id" => $id])
        );
        $server =json_decode($serverJson->getContent());

        if ($address) {;
            $httpClient = HttpClient::create(['auth_bearer' =>  $user->getApiToken()]);
            $response = $httpClient->request(
                'POST',
                $this->url(). $router->generate('api_servers_update',["id" => $id]),
                [
                    'query' => ['address' => $address ]
                ]
            );
            if ($response->getStatusCode() == 200) {
                $this->addFlash('success', "The server has been updated successfully.");

                return $this->redirectToRoute('administrative_index');
            }
        }
        return $this->render('administrative/edit.html.twig',[
            "id" => $id,
            'email' => $user->getEmail(),
            "server" => $server
        ]);
    }

    /**
     * @return string
     */
    public function url(){
        //TODO remove this line
        return "http://127.0.0.1:8001";
        if (isset($_SERVER['HTTPS'])) {
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } else {
            $protocol = 'http';
        }
        dd($_SERVER['HTTP_HOST']);

        return $protocol . "://" . $_SERVER['HTTP_HOST'];
    }
}
