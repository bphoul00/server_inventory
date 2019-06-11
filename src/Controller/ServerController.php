<?php

namespace App\Controller;

use App\Entity\Server;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServerController extends AbstractFOSRestController
{
    /**
     * @Route("/api/servers", name="api_servers_list", methods={"GET"})
     * @param EntityManagerInterface $em
     * @return View
     */
    public function getServers(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Server::class);

        /** @var Server[] $servers */
        $servers = $repository->findAll();

        return View::create($servers, Response::HTTP_OK);
    }

    /**
     * @Route("/api/servers/{id}", name="api_servers_one",  methods={"GET"})
     * @param                        $id
     * @param EntityManagerInterface $em
     * @return View
     * @throws EntityNotFoundException
     */
    public function getServer($id, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Server::class);

        /** @var Server $server */
        $server = $repository->find($id);
        if (!$server) {
            throw new EntityNotFoundException('Server with id '.$id.' does not exist');
        }

        return View::create($server, Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/servers", name="api_servers_add", methods={"POST"})
     * @param Request $request
     * @return View
     */
    public function createServer(Request $request)
    {
        $server = new Server();
        $address = $request->query->get('address');
        if (empty($address)) {
            throw new InvalidArgumentException('Invalid Input');
        }

        $server->setAddress($address);

        $em = $this->getDoctrine()->getManager();
        $em->persist($server);
        $em->flush();


        return View::create($server, Response::HTTP_CREATED);

    }

    /**
     * @Route("/api/servers/{id}", name="api_servers_update", methods={"POST"})
     * @param                        $id
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @return View
     * @throws EntityNotFoundException
     */
    public function updateServer($id, Request $request, EntityManagerInterface $em)
    {

        $repository = $em->getRepository(Server::class);

        /** @var Server $server */
        $server = $repository->find($id);
        if (!$server) {
            throw new EntityNotFoundException('Server with id '.$id.' does not exist');
        }

        $address = $request->query->get('address');
        if (empty($address)) {
            throw new InvalidArgumentException('Invalid Input');
        }
        $server->setAddress($address);

        $em = $this->getDoctrine()->getManager();
        $em->persist($server);
        $em->flush();


        return View::create($server, Response::HTTP_OK);

    }

}