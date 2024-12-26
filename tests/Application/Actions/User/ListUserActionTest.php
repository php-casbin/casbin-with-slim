<?php

declare(strict_types=1);

namespace Tests\Application\Actions\User;

use App\Domain\User\UserRepository;
use App\Domain\User\User;
use DI\Container;
use Tests\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class ListUserActionTest extends TestCase
{
    use ProphecyTrait;

    public function testAction()
    {
        $app = $this->getAppInstance();

        /** @var Container $container */
        $container = $app->getContainer();

        $user = new User(1, 'bill.gates', 'Bill', 'Gates');

        $userRepositoryProphecy = $this->prophesize(UserRepository::class);
        $userRepositoryProphecy
            ->findAll()
            ->willReturn([$user])
            ->shouldBeCalledOnce();

        $container->set(UserRepository::class, $userRepositoryProphecy->reveal());

        $request = $this->createRequest('GET', '/users');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();

        $serializedPayload = json_encode([
                'statusCode' => 200,
                'data' => [
                    [
                        'id' => 1,
                        'username' => 'bill.gates',
                        'firstName' => 'Bill',
                        'lastName' => 'Gates',
                        ],
                ],
        ], JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }
}
