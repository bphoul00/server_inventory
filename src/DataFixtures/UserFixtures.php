<?php

namespace App\DataFixtures;

use App\Entity\ApiToken;
use App\Entity\Server;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
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
        for ($index = 0; $index <= 10; $index++) {
            $user = new User();
            $user->setEmail(sprintf("test%d@test.com", $index));
            $user->setActive(true);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                "123456"
            ));

            $server = new Server();
            $server->setAddress((sprintf("0.0.0.%d", $index)));

            $manager->persist($user);
            $manager->persist($server);
        }
        $manager->flush();
    }
}
