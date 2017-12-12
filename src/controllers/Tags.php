<?php

namespace App\Controllers;

use Orno\Http\Request;
use Orno\Http\Response;
use Orno\Http\JsonResponse;
use App\Controllers\BaseController;
use App\Repositories\RepositoryInterface;

class Tags extends BaseController
{
    private $defaultTag = 'tag/google';

    public function get(Request $request, Response $response, RepositoryInterface $repository)
    {
        $response->setContent($this->render('articles.html', [
            'title' => 'Google Articles',
            'articles' => $repository->get($this->defaultTag)
        ]));
        return $response;
    }
}
