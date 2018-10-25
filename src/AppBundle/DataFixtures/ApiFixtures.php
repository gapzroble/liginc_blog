<?php

namespace AppBundle\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use FOS\OAuthServerBundle\Model\ClientManagerInterface;
use FOS\OAuthServerBundle\Model\AccessTokenManagerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ApiFixtures extends Fixture implements OrderedFixtureInterface, ContainerAwareInterface
{

    const WEB_USER_TOKEN = 'MjRlMTZlM2YzYmZkMjdiODg5ZDU1Y2ZiMTYzNzI3ZWFiYjQxN2RlZWVlMWNiNjgwMTQ2YWQ0MGNjYTkxODhhOA';
    /**
     * @var ClientManagerInterface
     */
    private $clientManager;

    /**
     * @var AccessTokenManagerInterface
     */
    private $accessTokenManager;

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(
        ClientManagerInterface $clientManager,
        AccessTokenManagerInterface $accessTokenManager
    )
    {
        $this->clientManager = $clientManager;
        $this->accessTokenManager = $accessTokenManager;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $client = $this->clientManager->createClient();
        $client->setAllowedGrantTypes(['token']);
        $this->clientManager->updateClient($client);

        $server = $this->container->get('fos_oauth_server.server');
        $data = $server->createAccessToken($client, null);

        $accessToken = $this->accessTokenManager->findTokenByToken($data['access_token']);
        $accessToken->setUser($this->getReference(UserFixtures::WEB_USER_REF));
        $accessToken->setExpiresAt(null);
        $accessToken->setToken(static::WEB_USER_TOKEN);

        $this->accessTokenManager->updateToken($accessToken);
    }

    /**
     * @inheritdoc
     */
    public function getOrder()
    {
        return 2;
    }
}
