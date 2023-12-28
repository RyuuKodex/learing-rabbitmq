<?php

declare(strict_types=1);

namespace App\Infrastructure\Messenger;

use App\Application\Query\GetUserData;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

final class ExternalJsonMessageSerializer implements SerializerInterface
{
    /** @param mixed[] $encodedEnvelope */
    public function decode(array $encodedEnvelope): Envelope
    {
        $body = $encodedEnvelope['body'];
        $data = json_decode($body, true);
        $message = new GetUserData($data);

        return new Envelope($message);
    }

    /** @return mixed[] */
    public function encode(Envelope $envelope): array
    {
        throw new \Exception('Transport & serializer not meant for sending messages');
    }
}
