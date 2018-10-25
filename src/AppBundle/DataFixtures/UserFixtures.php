<?php

namespace AppBundle\DataFixtures;


use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{

    const WEB_USER_REF = 'web-user';

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @inheritdoc
     */
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin')
            ->setEmail('admin@example.com')
            ->setSalt(rand(1000, 9999))
            ->setPassword($this->passwordEncoder->encodePassword($admin, 'admin'))
            ->addRole('ROLE_ADMIN')
            ->setEnabled(true);
        $manager->persist($admin);

        $web = new User();
        $web->setUsername('web user')
            ->setEmail('web@example.com')
            ->setSalt(rand(1000, 9999))
            ->setPassword($this->passwordEncoder->encodePassword($web, 'abcd1234'))
            ->setEnabled(true);
        $manager->persist($web);

        $this->addReference(static::WEB_USER_REF, $web);

        $manager->flush();
    }

    /**
     * @inheritdoc
     */
    public function getOrder()
    {
        return 1;
    }
}
