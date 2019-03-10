<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 08/03/2019
 * Time: 13:27
 */

namespace AppBundle\Controller\Api;


use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends Controller
{
    /**
     * @Route("api/register", name="api_register")
     * @Method("POST")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $data = $request->getContent();
        $user = $this->get('jms_serializer')->deserialize($data, User::class, 'json');

        $em = $this->getDoctrine()->getManager();
        $user->setPassword($encoder->encodePassword($user, $request->request->get('password')));

        $user->setCreatedAt(new \Datatime("now"));

        $em->persist($user);
        $em->flush();
        $response=array(

            'code'=>1,
            'message'=>'User created!',
            'errors'=>null,
            'result'=>null
        );
        // json_decode($user->getPassword()),
        return new JsonResponse($response,Response::HTTP_CREATED);
    }
}