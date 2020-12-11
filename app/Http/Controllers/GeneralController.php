<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use App\Category;

use App\Setting;
use Couchbase\UserSettings;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    protected $categories;

    public function __construct()
    {
        // 1. Lấy dữ liệu - Danh mục sản phẩm
        $categories = Category::where('is_active' ,1)->get();
        // 2. Lấy dữ liệu - Banner
        $banners = Banner::where('is_active' , 1)->orderBy('id', 'desc')
            ->take(3)->get();
        // 3. lấy dữ liệu tin tức
        $articles = Article::where('is_active', 1)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $this->categories = $categories;

        // 4. cấu hình website
        $settings = Setting::first();

        view()->share(['categories' => $categories, 'banners' => $banners, 'articles' => $articles,'settings' => $settings]);
    }

    public function notfound()
    {
//        return view('shop.notfound');
    }
}
