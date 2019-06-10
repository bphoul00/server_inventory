<?php

namespace App\Controller;

use App\Entity\Server;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServerController extends AbstractController
{
    /**
     * @Route("/servers",  methods={"GET"})
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function showList(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Server::class);

        /** @var Server[] $servers */
        $servers = $repository->findAll();

        return new Response(json_encode($servers));
    }

    /**
     * @Route("/servers/{id}",  methods={"GET"})
     */
    public function showOne($id)
    {
        $server = new Server();
        $server->setAddress("0.0.0.0");
        $server->setClientId("581364");

        return new Response("one");
    }

    /**
     * @Route("/servers/{id}",  methods={"POST"})
     */
    public function add($id)
    {
        $server = new Server();
        $server->setAddress("0.0.0.0");
        $server->setClientId("581364");

        return new Response("Create");
    }

    /**
     * @Route("/servers/{id}",  methods={"PUT"})
     */
    public function update($id)
    {
        $server = new Server();
        $server->setAddress("0.0.0.0");
        $server->setClientId("581364");

        return new Response("Update");
    }

}