<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
Use App\Models\Cart;
Use App\Models\Promotion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class CartController extends Controller {
  
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
   * @ cart
   */
  var $cart;
  /**
   * @ promotion
   */
  var $prom;
  /**
   * @ constructor
   *  
   */
  public function __construct() {
    $this->brands = Brand::all(array('name'));
    $this->categories = Category::all(array('name'));
    $this->products = Product::all(array('id', 'name', 'price', 'category_id'));
    $this->cart = Cart::all(array('id', 'prod_id'));
  }
  /**
   * @ add item to cart
   * @param id : product id
   * @return display products
   */
  public function cartAdd($id){
  
    Cart::create(array('prod_id' => $id));
  
    $this->cart = Cart::all(array('id', 'prod_id'));
    return view('products', array(
        'title' => 'Products Listing',
        'description' => '',
        'page' => 'products',
        'brands' => $this->brands,
        'categories' => $this->categories,
        'products' => $this->products,
        'cartQuantity' => $this->cart->count()
    ));
  
  }
  /**
   * @ remove item from  cart
   * @param id : product id
   * @return display cart
   */
  public function cartDelete($id){
  
    $item = Cart::destroy($id);
  
    return redirect('/cart');
  }
  /**
   * @ show item in  cart
   *  and promotion calculation
   * @return display cart
   */
  public function cartShow(){
  
    $items = null;
    $total = 0;
    $discount = 0;
    $promData = array();
  
    foreach($this->cart as $item){
      $product = Product::find($item->prod_id);
      // array('prod_id','quantity')
      if( array_key_exists($item->prod_id, $promData))
        $promData[$item->prod_id] += 1;
        else
          $promData[$item->prod_id] = 1;
          $items[]=array('item'=>$item,'product'=>$product);
          $total += $product->price;
    }
    // calculate discount
    // pormotion is base on bariable including 
    //       'price' and 'quantity' 
    // the promotion rule is formular for examole :
    //  "price * ((int)(quantity/2) +quantity % 2)"
    $subTotal =  0;
    foreach($promData as $prod_id => $quantity){
      $prom = Promotion::where('prod_id',$prod_id)->get()->all();
      $product = Product::find($prod_id);
      if($prom){
        $rule = $prom[0]->rule;
        $func = str_replace('price', $product->price, $rule);
        $func = str_replace('quantity',$quantity, $func);
        $subTotal += eval("return $func;");
      }
    }
    $discount = $total - $subTotal;

    return view('cart', array(
        'cart' => $items,
        'total' => $total,
        'discount' => $discount,
        'title' => 'Welcome',
        'description' => '',
        'page' => 'home',
        'cartQuantity' => $this->cart->count()
    ));
  }
  /**
   * @ empty item in  cart
   *  
   * @return display products
   */
  public function cartEmpty() {
  
    foreach($this->cart as $item){
      Cart::destroy($item->id);
    }
    return redirect('/products');
  }
}