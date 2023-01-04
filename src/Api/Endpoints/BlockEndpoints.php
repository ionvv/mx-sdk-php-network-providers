<?php

namespace Peerme\MxProviders\Api\Endpoints;

use GuzzleHttp\ClientInterface;
use Illuminate\Support\Collection;
use Peerme\MxProviders\Entities\Block;

final class BlockEndpoints
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    public function getBlocks(array $params = []): Collection
    {
        return Block::fromApiResponse(
            $this->client->request('GET', "/blocks", $params),
            isCollection: true,
        );
    }
}
