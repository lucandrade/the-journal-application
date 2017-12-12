<?php

namespace App\Http;

interface ClientInterface
{

    public function call($method, $uri, array $params = []);

    public function get($uri, array $params = []);
}
