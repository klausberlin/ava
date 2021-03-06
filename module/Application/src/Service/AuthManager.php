<?php
/**
 * User: Alice in wonderland
 * Date: 15.06.2017
 * Time: 17:14
 */

namespace Application\Service;

use Zend\Authentication\Adapter\DbTable;
use Zend\Authentication\Result;

class AuthManager
{
    /**
     * Authentication service.
     * @var \Zend\Authentication\AuthenticationService
     */
    private $authService;

    /**
     * Session manager.
     * @var \Zend\Session\SessionManager
     */
    private $sessionManager;

    /**
     * Contents of the 'access_filter' config key.
     * @var array
     */
    private $config;

    /**
     * Constructs the service.
     */
    public function __construct($authService)
    {
        $this->authService = $authService;
    }

    /**
     * Performs a login attempt. If $rememberMe argument is true, it forces the session
     * to last for one month (otherwise the session expires on one hour).
     */
    public function lostandfound($username, $password)
    {
        // Check if user has already logged in. If so, do not allow to log in
        // twice.
       /* if ($this->authService->getIdentity() != null) {
            throw new \Exception('Already logged in');
        }*/

        // Authenticate with login/password.

        /**  @var DbTable $authAdapter*/
        $authAdapter = $this->authService->getAdapter();

        $authAdapter->setIdentity($username);
        $authAdapter->setCredential($password);

        $result = $this->authService->authenticate();


        // If user wants to "remember him", we will make session to expire in
        // one month. By default session expires in 1 hour (as specified in our
        // config/global.php file).
       /* if ($result->getCode() == Result::SUCCESS && $rememberMe) {
            // Session cookie will expire in 1 month (30 days).
            $this->sessionManager->rememberMe(60 * 60 * 24 * 30);
        }*/

        return $result;
    }

    /**
     * Performs user logout.
     * @throws \Exception
     */
    public function logout()
    {
        // Allow to log out only when user is logged in.
        if ($this->authService->getIdentity()==null) {
            throw new \Exception('The user is not logged in');
        }

        // Remove identity from session.
        $this->authService->clearIdentity();
    }
}