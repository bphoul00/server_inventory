<?php

namespace App\Controller;

use App\Entity\Server;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServerController extends AbstractController
{
    /**
     * @Route("/api/servers",  methods={"GET"})
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function showList(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Server::class);

        /** @var Server[] $servers */
        $servers = $repository->findAll();

        return $this->json($servers);
    }

    /**
     * @Route("/api/servers/{id}",  methods={"GET"})
     * @param $id
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function showOne($id, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Server::class);

        /** @var Server $server */
        $server = $repository->find($id);

        return $this->json($server);
    }

    /**
     * @Route("/api/servers/{id}",  methods={"POST"})
     * @param $id
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function add($id, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Server::class);

        /** @var Server $server */
        $server = $repository->find($id);

        return $this->json($server);
    }

    /**
     * @Route("/api/servers/{id}",  methods={"PUT"})
     * @param $id
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function update($id, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Server::class);

        /** @var Server $server */
        $server = $repository->find($id);

        return $this->json($server);
    }

}