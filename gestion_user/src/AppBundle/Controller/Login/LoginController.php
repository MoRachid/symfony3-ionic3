<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 08/03/2019
 * Time: 13:28
 */

namespace AppBundle\Controller\Login;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $errors = $authenticationUtils->getLastAuthenticationError();
        $lastname = $authenticationUtils->getLastUsername();

        return $this->render('login\login.html.twig',[
                'errors' => $errors,
                'username' => $lastname
        ]);
    }
}