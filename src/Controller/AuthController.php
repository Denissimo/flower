<?php

namespace App\Controller;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;

class AuthController extends ApiController
{

    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->transformJsonBody($request);
        $username = $request->get('username');
        $password = $request->get('password');
        $email = $request->get('email');

        if (empty($username) || empty($password) || empty($email)) {
            return $this->respondValidationError("Invalid Username or Password or Email");
        }


        $user = (new User)->setUsername($username);
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email)
            ->setUsernameCanonical($username)
            ->setEmailCanonical($email)
            ->setEnabled(true);
        $user->setUsername($username);
        $em->persist($user);
        $em->flush();
        return $this->respondWithSuccess(sprintf('User %s successfully created', $user->getUsername()));
    }


    /**
     * @param Request $request
     * @param JWTTokenManagerInterface $JWTManager
     * @param AuthenticationManagerInterface $provider
     *
     * @return JsonResponse
     */
    public function getTokenUser(
        Request $request,
        JWTTokenManagerInterface $JWTManager,
        AuthenticationManagerInterface $provider
    ): JsonResponse
    {
        $unauthenticatedToken = new UsernamePasswordToken(
            $request->request->all()['username'],
            $request->request->all()['password'],
            'login'
        );
        $token = $provider->authenticate($unauthenticatedToken);

        return new JsonResponse(['token' => $JWTManager->create($token->getUser())]);
    }
}