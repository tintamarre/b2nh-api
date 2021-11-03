<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    /**
    * @OA\Get(
    * path="/images/{type}/{key}",
    * summary="Get image URL",
    * description="Get events count per year",
    * operationId="getEventsCountPerYear",
    * tags={"events"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */
    public function getUrl($category, $item)
    {
        $output = $this->getImageUrl($item);

        if (!$output) {
            $output = $this->getImageUrl($category);
        }
        if (!$output) {
            $output = "https://upload.wikimedia.org/wikipedia/en/thumb/f/f7/RickRoll.png/250px-RickRoll.png";
        }
        
        return response()->json(['url' => $output]);
    }

    private function getImageUrl($key)
    {
        $url = "https://pixabay.com/api/?key=" . env('PIXABAY_API') . "&q=" . urlencode($key)  . "&image_type=photo";
        
        $content = @file_get_contents($url);
        
        if ($content === false) {
            $output = 'error, no content';
        } else {
            $result = json_decode($content);

            if (!empty($result->hits)) {
                $element = rand(0, count($result->hits) - 1);
                // random element of hits
                return $result->hits[$element]->webformatURL;
            } else {
                $output = 'error, no hits';
            }
        }
    }
}
