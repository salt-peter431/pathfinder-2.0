<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SecurityHeaders implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // No-op before; headers go after.
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $response->setHeader('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        $response->setHeader('X-Frame-Options', 'DENY');
        $response->setHeader('X-Content-Type-Options', 'nosniff');
        $response->setHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->setHeader('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');
    }
}