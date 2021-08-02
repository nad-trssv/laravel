<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser;

class ParserService implements Parser
{
    public function getParsedList(string $url): array
    {
        $xml = \XmlParser::load($url);
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        return $data;
    }

    public function saveGoodsInFile(string $url): void
    {
        $parsedList = $this->getParsedList($url);
        $serialize = json_encode($parsedList);

        $explode = explode("/", $url);
        $fileName = end($explode);

        \Storage::append('/goods/' . $fileName, $serialize);
    }
}
