<?php

namespace AppBundle\DataFixtures;


use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin')
            ->setEmail('admin@example.com')
            ->setPassword($this->passwordEncoder->encodePassword($admin, 'admin'))
            ->addRole('ROLE_ADMIN')
            ->setEnabled(true);
        $manager->persist($admin);

        $web = new User();
        $web->setUsername('web user')
            ->setEmail('web@example.com')
            ->setPassword($this->passwordEncoder->encodePassword($web, 'abcd1234'))
            ->setEnabled(true);
        $manager->persist($web);

        $manager->flush();
    }
}
