<?php

/**
 * @Author Ricardo García
 * 
 * Trait used to handle generic methods and operations 
 * for all backend controllers
 */
trait ControllerHelper {

    function getHttpRequestValues($requestMethod, $requestKeys)
    {
        switch($requestMethod)
        {
            case 'GET':
            return ControllerHelper::getRequestData($requestKeys);
            break;
            case 'POST':
            return ControllerHelper::postRequestData($requestKeys);
            break;
            case 'PUT':
            return ControllerHelper::putRequestData($requestKeys);
            break;
            case 'DELETE':
            return ControllerHelper::deleteRequestData($requestKeys);
            break;

        }
    }

    function getRequestData($requestKeys)
    {
        $requestData = [];
        foreach($requestKeys as $requestKey)
        {
            if(isset($_GET[$requestKey]))
            {
                $data = [$requestKey => $_GET[$requestKey]];
                array_push($requestData,$data);
            }
        }

        return $requestData;
    }

    function postRequestData($requestKeys)
    {
        $requestData = [];
        foreach($requestKeys as $requestKey)
        {
            if(isset($_POST[$requestKey]))
            {
                $requestData[$requestKey] = $_POST[$requestKey];
            }
        }

        return $requestData;
    }

    function putRequestData($requestKeys)
    {

    }

    function deleteRequestData()
    {

    }
}

?>