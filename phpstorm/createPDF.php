<?php
/**
 * Created by PhpStorm.
 * User: Archan Shah
 * Date: 17-03-2018
 * Time: 21:25
 */
class pdf{
    function createPDF($cont,$sid)
    {
        $apikey = '81e8d620-0529-42c5-8056-9edbc1aca2c7';
        $value = $cont; // can aso be a url, starting with http..

        $postdata = http_build_query(
            array(
                'apikey' => $apikey,
                'value' => $value,
                'MarginBottom' => '30',
                'MarginTop' => '20'
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        $context  = stream_context_create($opts);

// Convert the HTML string to a PDF using those parameters
        $result = file_get_contents('http://api.html2pdfrocket.com/pdf', false, $context);

// Save to root folder in website
        if(file_put_contents($sid.'.pdf', $result))
        {
            return true;
        }
        else{
            return false;
        }


    }
}

?>