<?php

namespace App\Controller;

use App\Repository\MailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class SpamCheckController extends AbstractController
{
    #[Route('/spam/check', name: 'app_spam_check')]
    public function index(Request $request, MailRepository $mailRepository): JsonResponse
    {

        $data = $request->toArray();
        $mailExploded = explode('@', $data['email']);
        if($mailRepository->findOneBy(array('mailDomain'=>$mailExploded))) {
            return $this->json([
                'result'=>'spam'
            ]);
        }

        return $this->json([
            'result'=>'ok'
        ]);
    }
}