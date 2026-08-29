<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use Casbin\Enforcer;

class Authorization
{
    private Enforcer $enforcer;

    public function __construct(Enforcer $enforcer)
    {
        $this->enforcer = $enforcer;
    }

    /**
     * Authorization middleware invokable class.
     *
     * @param Request        $request PSR-7 request
     * @param RequestHandler $handler PSR-15 request handler
     *
     * @return Response
     */
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $user = $request->getAttribute('user');
        $uri = $request->getUri();
        $action = $request->getMethod();

        if ($user && !$this->enforcer->enforce($user, $uri->getPath(), $action)) {
            $response = (new Response())->withStatus(403);
            $response->getBody()->write('Unauthorized.');

            return $response;
        }

        return $handler->handle($request);
    }
}
