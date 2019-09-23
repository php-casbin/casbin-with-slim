<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use Casbin\Enforcer;

class Authorization
{
    /**
     * Authorization middleware invokable class.
     *
     * @param ServerRequest  $request PSR-7 request
     * @param RequestHandler $handler PSR-15 request handler
     *
     * @return Response
     */
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $e = new Enforcer(ROOT_PATH.'/config/rbac_model.conf', ROOT_PATH.'/config/policy.csv');

        $user = $request->getAttribute('user');
        $uri = $request->getUri();
        $action = $request->getMethod();

        if ($user && !$e->enforce($user, $uri->getPath(), $action)) {
            $response = new Response();
            $response->withStatus(403)->getBody()->write('Unauthorized.');

            return $response;
        }

        $response = $handler->handle($request);

        return $response;
    }
}
