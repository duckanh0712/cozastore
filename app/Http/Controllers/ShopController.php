<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Session;

class ShopController extends GeneralController
{
    public function __construct()
    {
        parent::__construct();
    }

    // trang chủ
    public function index()
    {
        $categories = $this->categories;
        $list = []; // chứa danh sách sản phẩm  theo thể loại
        foreach ($categories as $key => $category) {
            if ($category->parent_id == 0) { // check danh mục cha
                $ids = [$category->id]; // $ids = array($category->id);

                foreach ($categories as $child) {
                    if ($child->parent_id == $category->id) {
                        $ids[] = $child->id; // thêm phần tử vào mảng
                    }
                }

                $list[$key]['category'] = $category;

                $list[$key]['products'] = Product::where(['is_active' => 1, 'is_hot' => 0])
                    ->whereIn('category_id', $ids)
                    ->limit(4)->orderBy('id', 'desc')
                    ->get();
            }
        }

        return view('shop.home.index', [
            'list' => $list,
            'is_home' => 1
        ]);
    }

    public function getProductsByCategory($slug)
    {
        // step 1 : lấy chi tiết thể loại
        $cate = Category::where(['slug' => $slug])->first();

        if ($cate) {
            $categories = $this->categories;
            // step 1.1 Check danh mục cha -> lấy toàn bộ danh mục con để where In
            $ids = [];
            foreach($categories as $key => $category) {
                if($category->id == $cate->id) {
                    $ids[] = $cate->id;

                    foreach ($categories as $child) {
                        if ($child->parent_id == $cate->id) {
                            $ids[] = $child->id; // thêm phần tử vào mảng
                        }
                    }
                }
            }

            // step 2 : lấy list sản phẩm theo thể loại
            $products = Product::where(['is_active' => 1, 'is_hot' => 0])
                ->whereIn('category_id' , $ids)
                ->limit(10)->orderBy('id', 'desc')
                ->get();

            return view('shop.getProductByCategory',[
                'category' => $category,
                'products' => $products
            ]);
        } else {
            return $this->notfound();
        }
    }
    public function getProduct($slug , $id)
    {
        // get chi tiet sp
        $product = Product::find($id);
        if (!$product) {
            return $this->notfound();
        }

        $category = Category::find($product->category_id);

        $tags = Category::where([
            ['id' , '<>', 0],
            ['is_active' , '=', 1]
        ])->get();


        // step 2 : lấy list SP liên quan
        $relatedProducts = Product::where([
            ['is_active' , '=', 1],
            ['category_id', '=' , $category->id ],
            ['id', '<>' , $id]
        ])->orderBy('id', 'desc')->paginate(10);

        return view('shop.detailproduct',[
            'category' => $category,
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'tags' => $tags
        ]);
    }
    public function getListArticles()
    {
        $articles = Article::latest()->paginate(10);

        return view('shop.list-articles',[
            'articles' => $articles
        ]);
    }

    // Chi tiet bai viet
    public function getArticle($slug , $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return $this->notfound();
        }
        return view('shop.article',[
            'article' => $article
        ]);
    }
    // Lấy nhiều sản phẩm theo danh mục
    public function category()
    {
        $data = [
            'is_category' => 1
        ];

        return view('shop.category', $data);
    }

    public function detailProduct(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        if (!$product) {
            return $this->notfound();
        }
        return response()->json([
            'status' => true,
            'product' => $product
        ]);
    }

    public function articles()
    {
        return view('shop.articles');
    }

    public function detailArticle()
    {
        return view('shop.detail-article');
    }

}
