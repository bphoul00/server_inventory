<?php

namespace App\Controller;

use App\Entity\Server;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ServerController extends AbstractController
{
    /**
     * @Route("/api/servers", name="api_servers_list", methods={"GET"})
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function showList(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Server::class);

        /** @var Server[] $servers */
        $servers = $repository->findAll();

        return $this->json($servers, 200);
    }

    /**
     * @Route("/api/servers/{id}", name="api_servers_one",  methods={"GET"})
     * @param $id
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function showOne($id, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Server::class);

        /** @var Server $server */
        $server = $repository->find($id);

        return $this->json($server, 200);
    }

    /**
     * @Route("/api/servers", name="api_servers_add", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function add(Request $request)
    {
        $server = new Server();
        if ($request->isMethod('POST')) {
            $server->setAddress($request->query->get('address'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($server);
            $em->flush();
        }

        return $this->json($server, 201);
    }

    /**
     * @Route("/api/servers/{id}", name="api_servers_update", methods={"POST"})
     * @param $id
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function update($id, Request $request, EntityManagerInterface $em)
    {

        $repository = $em->getRepository(Server::class);

        /** @var Server $server */
        $server = $repository->find($id);

        if ($request->isMethod('POST')) {
            $server->setAddress($request->query->get('address'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($server);
            $em->flush();
        }
        return $this->json($server, 200);
    }

}