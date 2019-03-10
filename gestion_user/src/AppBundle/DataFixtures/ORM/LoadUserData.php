<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 08/03/2019
 * Time: 01:49
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Psr\Container\ContainerExceptionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends Fixture implements FixtureInterface, ContainerExceptionInterface
{

    private $container;
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('admin');
        $user->setLastname('admin');
        $user->setUsername('admin');
        $user->setEmail('admin@gmail.com');
        $user->setCreatedAt(new \DateTime('now'));
        $encoder = $this->container->get('login.password_encoder');
        $password = $encoder->encoderPassword($user,'0000');
        $user->setPassword($password);
        $manager->persist($user);
        $manager->flush();
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}