<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
Use App\Models\Cart;

use App\Http\Controllers\Controller;


class ProductController extends Controller {
  /**
   * @ brands
   */
  var $brands;
  /**
   * @ categories
   */
  var $categories;
  /**
   * @ products
   */
  var $products;
  
  /**
   * @ constructor
   */
  public function __construct() {
    $this->brands = Brand::all(array('name'));
    $this->categories = Category::all(array('name'));
    $this->products = Product::all(array('id', 'name', 'price', 'category_id'));
    $this->cart = Cart::all(array('id', 'prod_id'));
  }
  /**
   * @ showProducts
   *  display products
   */
  public function showProducts() {
    
    return view('products', array(
        'title' => 'Products Listing',
        'description' => '',
        'page' => 'products',
        'brands' => $this->brands,
        'categories' => $this->categories,
        'products' => $this->products,
        'cartQuantity' =>$this->cart->count()
    ));
  }
  /**
   * @ showProductCategories
   *  display products category
   */
  public function showProductCategories($name) {
    return $this->showProducts();
  }
  /**
   * @ showProductBrands
   *  display products brands
   */
  public function showProductBrands($name, $category = null) {
    return $this->showProducts();
  }
}