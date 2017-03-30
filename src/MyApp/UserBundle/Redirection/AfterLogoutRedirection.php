<?php
namespace MyApp\UserBundle\Redirection ;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
/**
 * Created by PhpStorm.
 * User: Nada
 * Date: 25/03/2017
 * Time: 17:36
 */
class AfterLogoutRedirection implements LogoutSuccessHandlerInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;
    /**
     * @var \Symfony\Component\Security\Core\SecurityContextInterface
     */
    private $security;
    /**
     * @param SecurityContextInterface $security
     */
    public function __construct(RouterInterface $router, SecurityContextInterface $security)
    {
        $this->router = $router;
        $this->security = $security;
    }
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function onLogoutSuccess(Request $request)
    {
        // Get list of roles for current user
        $roles = $this->security->getToken()->getRoles();
        // Tranform this list in array
        $rolesTab = array_map(function($role){
            return $role->getRole();
        }, $roles);
        // If is a commercial user or admin or super admin we redirect to the login area. Here we used FoseUserBundle bundle
        if (in_array('ROLE_CLIENT', $rolesTab, true) || in_array('ROLE_AGENT', $rolesTab, true) || in_array('ROLE_SUPER_ADMIN', $rolesTab, true))
            $response = new RedirectResponse($this->router->generate('fos_user_security_login'));
        // otherwise we redirect user to the homepage of website
        else
            $response = new RedirectResponse($this->router->generate('homepage'));
        return $response;
    }

}