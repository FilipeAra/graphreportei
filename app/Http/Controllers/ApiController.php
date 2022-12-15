<?php

namespace App\Http\Controllers;


class ApiController extends Controller
{
    public static function getRepo(){

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.github.com/repos/OWNER/REPO/commits",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                '-H "Accept: application/vnd.github+json"',
                '-H "Authorization: Bearer <YOUR-TOKEN>"',
                '-H "X-GitHub-Api-Version: 2022-11-28"'
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        	echo "cURL Error #:" . $err;
        } else {
        	return $response;
        }
    }
}
