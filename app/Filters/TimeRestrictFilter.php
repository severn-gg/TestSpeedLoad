<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class TimeRestrictFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $startTime = "08:00:00"; // Allowed time starts
        $endTime = "17:00:00";   // Allowed time ends
        date_default_timezone_set('Asia/Kuala_Lumpur'); // Set timezone

        $currentTime = date('H:i:s');

        if ($currentTime < $startTime || $currentTime > $endTime) {
            // HTML response with styling
            $html = "
            <html>
                <head>
                    <title>Akses Dibatasi!</title>
                    <style>
                        body { 
                            font-family: Arial, sans-serif; 
                            text-align: center; 
                            padding: 50px; 
                            background-color: #f8d7da; 
                            color: #721c24; 
                        }
                        .container { 
                            max-width: 600px; 
                            margin: auto; 
                            padding: 20px; 
                            background: white; 
                            border-radius: 8px; 
                            box-shadow: 0 0 10px rgba(0,0,0,0.1); 
                        }
                        h1 { color: #dc3545; }
                        .info { 
                            font-size: 18px; 
                            margin-top: 10px; 
                        }
                        .time-box {
                            display: inline-block; 
                            padding: 10px; 
                            background: #721c24; 
                            color: #fff; 
                            border-radius: 5px;
                            font-weight: bold;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <h1>⚠ Akses Dibatasi! ⚠</h1>
                        <p class='info'>⏰ System hanya beroperasi di jam :</p>
                        <p class='time-box'>{$startTime} - {$endTime}</p>
                        <p class='info'>⏳ Waktu Server Menunjukan Pukul: <strong>$currentTime</strong></p>
                    </div>
                </body>
            </html>
            ";

            return service('response')->setBody($html)->setStatusCode(403);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No post-processing needed
    }
}
