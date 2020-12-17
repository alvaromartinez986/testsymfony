<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;



class UserController extends AbstractController {


    /**
     * @Route("/user/list", name="user_list")     
     * 
     */
    public function list(){
        $response = new JsonResponse(); 
        $response->setData(
            [
                'success' => true,
                'data' => $this->readUsers(),
            ]);

        return $response;
    }

    public function readUsers(){
        $data = file_get_contents('assets/users.json');
        $users = json_decode($data);
        
        return $users;
    }

}