<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if user is authenticated
        $is_logged = session()->get('is_logged');
        $user_type = session()->get('user_type');

        // Get the controller name from the request
        $controller = strtolower($request->uri->getSegment(1));
        if (!$controller) {
            return redirect()->to('/loginController/userType');
        } else {
            if ($is_logged) {
                // check user type
                if ($user_type == 1) {
                    // check controller 
                    if ($controller !== 'alumniassociationcontroller') {
                        session()->setFlashdata('access', 'Cannor Access Page!');
                        return redirect()->back();
                    }
                } elseif ($user_type == 2) {
                    // check controller 
                    if ($controller !== 'alumnicontroller') {
                        session()->setFlashdata('access', 'Cannor Access Page!');
                        return redirect()->back();
                    }
                }
            } else {
                if ($controller !== 'logincontroller') {
                    session()->setFlashdata('access', 'Cannor Access Page!');
                    return redirect()->to('/LoginController/UserType');
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // do something here
    }
}
