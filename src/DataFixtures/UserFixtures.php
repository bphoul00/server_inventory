<?php

namespace App\DataFixtures;

use App\Entity\ApiToken;
use App\Entity\Server;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Migrations\Version\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
{
    $this->passwordEncoder = $passwordEncoder;
}

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("test@test.com");
        $user->setActive(true);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            "123456"
            ));

        $server = new Server();
        $server->setAddress("0.0.0.0");

        $manager->persist($user);
        $manager->persist($server);


        $manager->flush();
    }
}
