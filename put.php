<?php
$app->delete('/{toy_id}', function (Silex\Application $app, Symfony\Component\HttpFoundation\Request $request, $toy_id) {
     
     if (delete_toy($toy_id)) {
         // The delete went ok and we can now return a no content value
         // HTTP_NO_CONTENT = 204
         $responseMessage = '';
         $responseCode = Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT;
     } else {
         // Something went wrong
         $responseMessage = 'reason for error';
         $response_code = Symfony\Component\HttpFoundation\Response::HTTP_INTERNAL_SERVER_ERROR;
     }
     
     return new Symfony\Component\HttpFoundation\Response($responseMessage, $responseCode);
});
?>