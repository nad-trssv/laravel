<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser)
    {
        dd($parser->getParsedList("https://news.yandex.ru/gadgets.rss"));
    }
}
