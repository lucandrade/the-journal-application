<?php

namespace App\Controllers;

use Orno\Http\Request;
use Orno\Http\Response;
use Orno\Http\JsonResponse;
use App\Controllers\BaseController;
use App\Repositories\RepositoryInterface;

class Rivers extends BaseController
{
    private $defaultResource = 'thejournal';

    public function get(Request $request, Response $response, RepositoryInterface $repository)
    {
        $response->setContent($this->render('articles.html', [
            'title' => 'The Journal Articles',
            'articles' => $repository->get($this->defaultResource)
        ]));
        return $response;
    }
}
