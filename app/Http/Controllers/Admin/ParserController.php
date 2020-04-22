<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    const URL = 'https://news.rambler.ru/rss';
    public function index() {
        $count = 0;
        $categories = Category::all();
        $data = [];
        foreach ($categories as $category){
            $xml = XmlParser::load(self::URL.'/'.$category->name.'/');
            $data[$category->name] = $xml->parse([
                'title' => [
                    'uses'=> 'channel.title'
                ],
                'description' => [
                    'uses' => 'channel.description'
                ],
                'link' => [
                    'uses' => 'channel.link'
                ],
                'news' => [
                    'uses' => 'channel.item[guid,title,link,description,category]'
                ],
                'id_category' => $category->id,
                'rss' => 'rumbler'
            ]);
        }

        foreach ($data as $key => $value){
            //dd($value);
            foreach ($value['news'] as $news){
                $newsOld = News::query()->where('guid', $news['guid'])->count();
                if ($newsOld == 0){
                    $newNews = new News();
                    //dd($news);
                    $newNews->fill([
                        'title' => $news['title'],
                        'guid' => $news['guid'],
                        'text' => $news['description'],
                        'link' => $news['link'],
                        'rss' => $value['rss'],
                        'id_category' => $value['id_category']
                    ]);
                    $newNews->save();
                    $count++;
                }
            }
        }
        $success = '';
        if ($count > 0){
            $success = "Добавлено $count записей";
        }else{
            $success = 'Нет обновлений';
        }
        return redirect()->back()->with('success', $success);
    }
}
