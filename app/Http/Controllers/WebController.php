<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alerts;
use App\Models\AmbulanceRequests;
use App\Models\ConsumerAddresses;
use App\customer;
use App\Product;
use App\ProductCategory;
use App\Partner;
use App\Major_category;
use App\Models\OrderDetails;
use App\Order;
use App\Models\PhysioTherapyRequests;
use App\Models\Services;
use App\Rider;
use App\Cart;
use App\Models\CartDetails;
use App\Models\Donors;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;
use Mail;
use Log;
use DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;
use OneSignal;
use Illuminate\Support\Str;
use GeoIP as GeoIP;



class WebController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth']);
    }

    public function makeMenu()
    {
      $categories = ProductCategory::where('Type', '=', 'Grocery')->where('Type2', '!=', 'Electronics')->where('Type2', '!=', 'Fashion')->where('isRoot', '=', 1)->distinct()->get(['Type2']);
      foreach ($categories as $cat1)
      {
        $cat1->Children = ProductCategory::where('Type', '=', 'Grocery')->where('Type2', '!=', 'Electronics')->where('Type2', '!=', 'Fashion')->where('isRoot', '=', 1)->where('Type2', '=', $cat1->Type2)->get();
        foreach ($cat1->Children as $cat2)
        {
          $cat2->Children = ProductCategory::where('Type', '=', 'Grocery')->where('Type2', '!=', 'Electronics')->where('Type2', '!=', 'Fashion')->where('ParentID', '=', $cat2->id)->get();
          foreach ($cat2->Children as $cat3)
          {
            $cat3->Children = ProductCategory::where('Type', '=', 'Grocery')->where('Type2', '!=', 'Electronics')->where('Type2', '!=', 'Fashion')->where('ParentID', '=', $cat3->id)->get();
            foreach ($cat3->Children as $cat4)
            {
              $cat4->Children = ProductCategory::where('Type', '=', 'Grocery')->where('Type2', '!=', 'Electronics')->where('Type2', '!=', 'Fashion')->where('ParentID', '=', $cat4->id)->get();
            }
          }
        }
      }
      return $categories;
    }
    
    public function index(Request $request)
    {
  
      $menuCategories = self::makeMenu();
      $featuredProducts = Product::where('isFeatured', '=', 1)->orderBy('created_at', 'DESC')->get();
      foreach ($featuredProducts as $prod) {
        if ($prod->Category1!=0)
        {     
            $prod->Category = ProductCategory::find($prod->Category1)->Title;
          
        }
        else {
          $prod->Category = '';
        }
      }
      $onSaleProducts = Product::where('onSale', '=', 1)->orderBy('created_at', 'DESC')->take(8)->get();
      foreach ($onSaleProducts as $prod) {
        if ($prod->Category1!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category1)->Title;
        }
        else {
          $prod->Category = '';
        }
      }
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      $homeData = ProductCategory::where('Type2', '=', 'Grocery')->get();
      $homeData->MedicineGeneral = Product::where('ProductType', '=', 'Medicine')->inRandomOrder()->take(20)->get();
      $categoryIDs = ProductCategory::where('Type2', '=', 'Grocery')->pluck('id')->toArray();
      $homeData->GroceryGeneral = Product::where('ProductType', '=', 'Grocery')->whereIn('Category1', $categoryIDs)->inRandomOrder()->take(20)->get();
      $categoryIDs = ProductCategory::where('Type2', '=', 'Household')->pluck('id')->toArray();
      $homeData->HouseholdGeneral = Product::where('ProductType', '=', 'Grocery')->whereIn('Category1', $categoryIDs)->inRandomOrder()->take(20)->get();
      // $categoryIDs = Categories::where('Type2', '=', 'Electronics')->pluck('id')->toArray();
      // $homeData->ElectronicsGeneral = Products::where('ProductType', '=', 'Grocery')->whereIn('Category1', $categoryIDs)->inRandomOrder()->take(20)->get();
      // $categoryIDs = Categories::where('Type2', '=', 'Fashion')->pluck('id')->toArray();
      // $homeData->FashionGeneral = Products::where('ProductType', '=', 'Grocery')->whereIn('Category1', $categoryIDs)->inRandomOrder()->take(20)->get();
      $homeData->Medicine = Product::where('ProductType', '=', 'Medicine')->inRandomOrder()->take(20)->get();
      $homeData->GroceryCategories = ProductCategory::where('Type2', '=', 'Grocery')->where('isRoot', '=', 1)->get();
      $categoryIDs = ProductCategory::where('Type2', '=', 'Bakery')->pluck('id')->toArray();
      $homeData->BakeryGeneral = Product::where('ProductType', '=', 'Grocery')->whereIn('Category1', $categoryIDs)->inRandomOrder()->take(20)->get();
      return view('Site.home', compact('featuredProducts', 'onSaleProducts', 'hasConsumer', 'menuCategories', 'consumer', 'homeData'));
    }

    public function getShelf($catType, Request $request)
    {
      $categories = ProductCategory::where('Type2', '=', $catType)->where('isRoot', '=', 1)->get();
      foreach ($categories as $cat)
      {
        $cat->Products = Product::where('ProductType', '=', 'Grocery')->where('Category1', '=', $cat->id)->inRandomOrder()->take(20)->get();
      }
      return view('Site.Partials.partialShelf', compact('categories', 'catType'));
    }

    public function medicine(Request $request)
    {
      $menuCategories = self::makeMenu();
      $medicine = Product::where('ProductType', '=', 'Medicine')->orderBy('Name', 'ASC')->paginate(24);
      foreach ($medicine as $prod) {
        if ($prod->Category1!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category1)->Title;
        }
        else {
          $prod->Category = '';
        }
      }
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.medicine', compact('medicine', 'hasConsumer', 'menuCategories', 'consumer'));
    }

    public function medicineSearch(Request $request)
    {
      $menuCategories = self::makeMenu();
      $medicine = Product::where('ProductType', '=', 'Medicine')->where('Name', 'LIKE', '%'.$request->Search.'%')->orderBy('Name', 'ASC')->paginate(24);
      foreach ($medicine as $prod) {
        if ($prod->Category1!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category1)->Title;
        }
        else {
          $prod->Category = '';
        }
      }
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.medicine', compact('medicine', 'hasConsumer', 'menuCategories', 'consumer'));
    }

    public function globalSearch(Request $request)
    {
      $menuCategories = self::makeMenu();
      $data = null;
      $keywords = explode(' ', $request->Search);
      if ($request->has('Category'))
      {
        $categoryIDs = null;
        if ($request->Category == 'All')
        {
          $data =  Product::where(function ($query) use ($keywords) {
                        foreach ($keywords as $keyword) {
                           $query->where('Name', 'like', '%'.$keyword.'%');
                        }
                    })->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->paginate(24)->appends(request()->query());
        }
        elseif ($request->Category == 'Medicine')
        {
          $categoryIDs = ProductCategory::where('Type', '=', 'Medicine')->pluck('id')->toArray();
          $data =  Product::where(function ($query) use ($keywords) {
                              foreach ($keywords as $keyword) {
                                 $query->where('Name', 'like', '%'.$keyword.'%');
                              }
                          })->whereIn('Category1', $categoryIDs)->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->paginate(24)->appends(request()->query());
        }
        else {
          $categoryIDs = ProductCategory::where('Type2', '=', $request->Category)->pluck('id')->toArray();
          $data =  Product::where(function ($query) use ($keywords) {
                                  foreach ($keywords as $keyword) {
                                     $query->where('Name', 'like', '%'.$keyword.'%');
                                  }
                              })->whereIn('Category1', $categoryIDs)->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->paginate(24)->appends(request()->query());
        }
      }
      else
      {
        $data = Product::where(function ($query) use ($keywords) {
                                foreach ($keywords as $keyword) {
                                   $query->where('Name', 'like', '%'.$keyword.'%');
                                }
                            })->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->paginate(24)->appends(request()->query());
      }
      foreach ($data as $prod) {
        if ($prod->Category3!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category3)->Title;
          $prod->CatID = $prod->Category3;
          $prod->CatLevel = 3;
        }
        elseif ($prod->Category2!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category2)->Title;
          $prod->CatID = $prod->Category2;
          $prod->CatLevel = 2;
        }
        elseif ($prod->Category1!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category1)->Title;
          $prod->CatID = $prod->Category1;
          $prod->CatLevel = 1;
        }
        else {
          $prod->CatID = 0;
          $prod->Category = '';
        }
      }
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.search', compact('data', 'hasConsumer', 'menuCategories', 'consumer'));
    }

    public function searchShelf(Request $request)
    {
      $keywords = explode(' ', $request->Search);
      if ($request->has('Category'))
      {
        $categoryIDs = null;
        if ($request->Category == 'All')
        {
          $data =  Product::where(function ($query) use ($keywords) {
                        foreach ($keywords as $keyword) {
                           $query->where('Name', 'like', '%'.$keyword.'%');
                        }
                    })->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->paginate(24);
        }
        elseif ($request->Category == 'Medicine')
        {
          $categoryIDs = ProductCategory::where('Type', '=', 'Medicine')->pluck('id')->toArray();
          $data =  Product::where(function ($query) use ($keywords) {
                              foreach ($keywords as $keyword) {
                                 $query->where('Name', 'like', '%'.$keyword.'%');
                              }
                          })->whereIn('Category1', $categoryIDs)->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->take(20)->get();
        }
        else {
          if ($request->Category == 'HomeAndLifestyle')
          {
            $request->Category = 'Household';
          }
          $catCount = ProductCategory::where('Type2', '=', $request->Category)->count();
          if ($catCount > 0)
          {
            $categoryIDs = ProductCategory::where('Type2', '=', $request->Category)->pluck('id')->toArray();
            $data =  Product::where(function ($query) use ($keywords) {
                                    foreach ($keywords as $keyword) {
                                       $query->where('Name', 'like', '%'.$keyword.'%');
                                    }
                                })->whereIn('Category1', $categoryIDs)->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->take(20)->get();
          }
          else
          {
            $categoryIDs = ProductCategory::find($request->Category);
            $data =  Product::where(function ($query) use ($keywords) {
                                    foreach ($keywords as $keyword) {
                                       $query->where('Name', 'like', '%'.$keyword.'%');
                                    }
                                })->where('Category1', '=', $categoryIDs->id)->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->take(20)->get();
          }


        }
      }
      foreach ($data as $prod) {
        if ($prod->Category3!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category3)->Title;
          $prod->CatID = $prod->Category3;
          $prod->CatLevel = 3;
        }
        elseif ($prod->Category2!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category2)->Title;
          $prod->CatID = $prod->Category2;
          $prod->CatLevel = 2;
        }
        elseif ($prod->Category1!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category1)->Title;
          $prod->CatID = $prod->Category1;
          $prod->CatLevel = 1;
        }
        else {
          $prod->CatID = 0;
          $prod->Category = '';
        }
      }
      return response()->json(['Products' => $data]);
    }

    public function searchShelfSub(Request $request)
    {
      $keywords = explode(' ', $request->Search);
      $categoryIDs = ProductCategory::find($request->Category);
      $data =  Product::where(function ($query) use ($keywords) {
                              foreach ($keywords as $keyword) {
                                 $query->where('Name', 'like', '%'.$keyword.'%');
                              }
                          })->where('Category1', '=', $categoryIDs->id)->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->take(20)->get();
      if ($request->Level == 2)
      {
        $data =  Product::where(function ($query) use ($keywords) {
                                foreach ($keywords as $keyword) {
                                   $query->where('Name', 'like', '%'.$keyword.'%');
                                }
                            })->where('Category1', '=', $categoryIDs->id)->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->take(20)->get();
      }
      if ($request->Level == 3)
      {
        $data =  Product::where(function ($query) use ($keywords) {
                                foreach ($keywords as $keyword) {
                                   $query->where('Name', 'like', '%'.$keyword.'%');
                                }
                            })->where('Category2', '=', $categoryIDs->id)->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->take(20)->get();
      }
      if ($request->Level == 4)
      {
        $data =  Product::where(function ($query) use ($keywords) {
                                foreach ($keywords as $keyword) {
                                   $query->where('Name', 'like', '%'.$keyword.'%');
                                }
                            })->where('Category3', '=', $categoryIDs->id)->orderBy('Category3', 'ASC')->orderBy('Category2', 'ASC')->orderBy('Category1', 'ASC')->take(20)->get();
      }
      foreach ($data as $prod) {
        if ($prod->Category3!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category3)->Title;
          $prod->CatID = $prod->Category3;
          $prod->CatLevel = 3;
        }
        elseif ($prod->Category2!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category2)->Title;
          $prod->CatID = $prod->Category2;
          $prod->CatLevel = 2;
        }
        elseif ($prod->Category1!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category1)->Title;
          $prod->CatID = $prod->Category1;
          $prod->CatLevel = 1;
        }
        else {
          $prod->CatID = 0;
          $prod->Category = '';
        }
      }
      return response()->json(['Products' => $data]);
    }

    public function shelves($type, $category, $level, Request $request)
    {
      $menuCategories = self::makeMenu();
      $category = ProductCategory::find($category);
      if ($category->ParentID != 0)
        $category->Parent = ProductCategory::find($category->ParentID);
        if (isset($category->Parent) && $category->Parent->ParentID != 0)
          $category->Parent->Parent = ProductCategory::find($category->Parent->ParentID);
      $categ = $category->Title;
      $categories;
      $catLevel = 0;
      if ($category->Type2=='Bakery')
      {
        return redirect()->route('shop', ['type' => 'Grocery', 'level' => $level, 'category' => $category->id]);
      }
      if ($level == 1)
      {
        $catLevel = 3;
        $categories = ProductCategory::where('ParentID', '=', $category->id)->get();
        foreach ($categories as $cat)
        {
          $cat->Products = Product::where('Category2', '=', $cat->id)->take(25)->get();
        }
      }
      if ($level == 2)
      {
        $catLevel = 4;
        $categories = ProductCategory::where('ParentID', '=', $category->id)->get();
        foreach ($categories as $cat)
        {
          $cat->Products = Product::where('Category3', '=', $cat->id)->take(25)->get();
        }
      }
      $level = $catLevel;
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.shelves', compact('category', 'categories', 'level', 'hasConsumer', 'menuCategories', 'consumer'));

    }

    public function labtests(Request $request)
    {
      $menuCategories = self::makeMenu();
      $data = Services::orderBy('Name', 'ASC')->paginate(24);
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.labtests', compact('data', 'hasConsumer', 'menuCategories', 'consumer'));
    }

    public function labtestSearch(Request $request)
    {
      $menuCategories = self::makeMenu();
      $data = Services::where('Name', 'LIKE', '%'.$request->Search.'%')->orderBy('Name', 'ASC')->paginate(24);
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.labtests', compact('data', 'hasConsumer', 'menuCategories', 'consumer'));
    }

    public function sale(Request $request)
    {
      $menuCategories = self::makeMenu();
      $data = Product::where('ProductType', '=', 'Grocery')->where('onSale', '=', 1)->orderBy('Name', 'ASC')->paginate(24);
      foreach ($data as $prod) {
        if ($prod->Category1!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category1)->Title;
        }
        else {
          $prod->Category = '';
        }
      }
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.sale', compact('data', 'hasConsumer', 'menuCategories', 'consumer'));
    }

    public function saleSearch(Request $request)
    {
      $menuCategories = self::makeMenu();
      $data = Product::where('ProductType', '=', 'Grocery')->where('onSale', '=', 1)->where('Name', 'LIKE', '%'.$request->Search.'%')->orderBy('Name', 'ASC')->paginate(24);
      foreach ($data as $prod) {
        if ($prod->Category1!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category1)->Title;
        }
        else {
          $prod->Category = '';
        }
      }
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.sale', compact('data', 'hasConsumer', 'menuCategories', 'consumer'));
    }

    public function shop($type, $category, $level, Request $request)
    {
      $menuCategories = self::makeMenu();
      if ($category == 'Grocery')
      {
        $categ = 'Grocery';
        $categoryIDs = ProductCategory::where('Type2', '=', 'Grocery')->pluck('id')->toArray();
        $categories = ProductCategory::where('Type2', '=', 'Grocery')->get();
        $data =  Product::where('ProductType', '=', 'Grocery')->whereIn('Category1', $categoryIDs)->orderBy('Name', 'ASC')->paginate(24);
        foreach ($data as $prod) 
        {
          if ($prod->Category3!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category3)->Title;
            $prod->CatID = $prod->Category3;
            $prod->CatLevel = 3;
          }
          elseif ($prod->Category2!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category2)->Title;
            $prod->CatID = $prod->Category2;
            $prod->CatLevel = 2;
          }
          elseif ($prod->Category1!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category1)->Title;
            $prod->CatID = $prod->Category1;
            $prod->CatLevel = 1;
          }
          else {
            $prod->CatID = 0;
            $prod->Category = '';
          }
        }
        $level = 1;
        $hasConsumer = false;
        $consumer = null;
        if($request->hasCookie('ConsumerID'))
        {
            $hasConsumer = true;
            $consumer = Customer::find($request->cookie('ConsumerID'));
        }
        return view('Site.shop', compact('data', 'categ', 'categories', 'level', 'hasConsumer', 'menuCategories', 'consumer'));
      }

      elseif ($category == 'Electronics')
      {
        $categ = 'Electronics';
        $categoryIDs = ProductCategory::where('Type2', '=', 'Electronics')->pluck('id')->toArray();
        $categories = ProductCategory::where('Type2', '=', 'Electronics')->get();
        $data =  Product::where('ProductType', '=', 'Grocery')->whereIn('Category1', $categoryIDs)->orderBy('Name', 'ASC')->paginate(24);
        foreach ($data as $prod) {
          if ($prod->Category3!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category3)->Title;
            $prod->CatID = $prod->Category3;
            $prod->CatLevel = 3;
          }
          elseif ($prod->Category2!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category2)->Title;
            $prod->CatID = $prod->Category2;
            $prod->CatLevel = 2;
          }
          elseif ($prod->Category1!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category1)->Title;
            $prod->CatID = $prod->Category1;
            $prod->CatLevel = 1;
          }
          else {
            $prod->CatID = 0;
            $prod->Category = '';
          }
        }
        $level = 1;
        $hasConsumer = false;
        $consumer = null;
        if($request->hasCookie('ConsumerID'))
        {
            $hasConsumer = true;
            $consumer = Customer::find($request->cookie('ConsumerID'));
        }
        return view('Site.shop', compact('data', 'categ', 'categories', 'level', 'hasConsumer', 'menuCategories', 'consumer'));
      }

      elseif ($category == 'Fashion')
      {
        $categ = 'Fashion';
        $categoryIDs = ProductCategory::where('Type2', '=', 'Fashion')->pluck('id')->toArray();
        $categories = ProductCategory::where('Type2', '=', 'Fashion')->get();
        $data =  Product::where('ProductType', '=', 'Grocery')->whereIn('Category1', $categoryIDs)->orderBy('Name', 'ASC')->paginate(24);
        foreach ($data as $prod) {
          if ($prod->Category3!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category3)->Title;
            $prod->CatID = $prod->Category3;
            $prod->CatLevel = 3;
          }
          elseif ($prod->Category2!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category2)->Title;
            $prod->CatID = $prod->Category2;
            $prod->CatLevel = 2;
          }
          elseif ($prod->Category1!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category1)->Title;
            $prod->CatID = $prod->Category1;
            $prod->CatLevel = 1;
          }
          else {
            $prod->CatID = 0;
            $prod->Category = '';
          }
        }
        $level = 1;
        $hasConsumer = false;
        $consumer = null;
        if($request->hasCookie('ConsumerID'))
        {
            $hasConsumer = true;
            $consumer = Customer::find($request->cookie('ConsumerID'));
        }
        return view('Site.shop', compact('data', 'categ', 'categories', 'level', 'hasConsumer', 'menuCategories', 'consumer'));
      }

      elseif ($category == 'Household')
      {
        $categ = 'Home And Lifestyle';
        $categoryIDs = ProductCategory::where('Type2', '=', 'Household')->pluck('id')->toArray();
        $categories = ProductCategory::where('Type2', '=', 'Household')->get();
        $data =  Product::where('ProductType', '=', 'Grocery')->whereIn('Category1', $categoryIDs)->orderBy('Name', 'ASC')->paginate(24);
        foreach ($data as $prod) {
          if ($prod->Category3!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category3)->Title;
            $prod->CatID = $prod->Category3;
            $prod->CatLevel = 3;
          }
          elseif ($prod->Category2!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category2)->Title;
            $prod->CatID = $prod->Category2;
            $prod->CatLevel = 2;
          }
          elseif ($prod->Category1!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category1)->Title;
            $prod->CatID = $prod->Category1;
            $prod->CatLevel = 1;
          }
          else {
            $prod->CatID = 0;
            $prod->Category = '';
          }
        }
        $level = 1;
        $hasConsumer = false;
        $consumer = null;
        if($request->hasCookie('ConsumerID'))
        {
            $hasConsumer = true;
            $consumer = Customer::find($request->cookie('ConsumerID'));
        }
        return view('Site.shop', compact('data', 'categ', 'categories', 'level', 'hasConsumer', 'menuCategories', 'consumer'));
      }
      elseif ($category == 'Bakery')
      {
        $categ = 'Bakery';
        $categoryIDs = ProductCategory::where('Type2', '=', 'Bakery')->pluck('id')->toArray();
        $categories = ProductCategory::where('Type2', '=', 'Bakery')->get();
        $data =  Product::where('ProductType', '=', 'Grocery')->whereIn('Category1', $categoryIDs)->orderBy('Name', 'ASC')->paginate(24);
        foreach ($data as $prod) {
          if ($prod->Category3!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category3)->Title;
            $prod->CatID = $prod->Category3;
            $prod->CatLevel = 3;
          }
          elseif ($prod->Category2!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category2)->Title;
            $prod->CatID = $prod->Category2;
            $prod->CatLevel = 2;
          }
          elseif ($prod->Category1!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category1)->Title;
            $prod->CatID = $prod->Category1;
            $prod->CatLevel = 1;
          }
          else {
            $prod->CatID = 0;
            $prod->Category = '';
          }
        }
        $level = 1;
        $hasConsumer = false;
        $consumer = null;
        if($request->hasCookie('ConsumerID'))
        {
            $hasConsumer = true;
            $consumer = Customer::find($request->cookie('ConsumerID'));
        }
        return view('Site.shop', compact('data', 'categ', 'categories', 'level', 'hasConsumer', 'menuCategories', 'consumer'));
      }
      else
      {
        $dataQuery = Product::where('ProductType', '=', 'Grocery');
        $currCategory = ProductCategory::find($category);
        $categ = "";
        if (isset($currCategory))
        {
          if ($currCategory->ParentID != 0)
            $currCategory->Parent = ProductCategory::find($currCategory->ParentID);
            if (isset($currCategory->Parent) && $currCategory->Parent->ParentID != 0)
              $currCategory->Parent->Parent = ProductCategory::find($currCategory->Parent->ParentID);
          $categ = $currCategory->Title;
        }

        $categories;
        $catLevel = 0;
        if ($level == 1)
        {
          $catLevel = 2;
          $dataQuery = $dataQuery->where('Category1', '=', $category);
          $categories = ProductCategory::where('ParentID', '=', $category)->get();
        }
        if ($level == 2)
        {
          $catLevel = 3;
          $dataQuery = $dataQuery->where('Category2', '=', $category);
          $categories = ProductCategory::where('ParentID', '=', $category)->get();
        }
        if ($level == 3)
        {
          $catLevel = 4;
          $dataQuery = $dataQuery->where('Category3', '=', $category);
          $categories = ProductCategory::where('isRoot', '=', 1)->where('Type', '=', 'Grocery')->get();
        }
        $data = $dataQuery->orderBy('Name', 'ASC')->paginate(24);
        foreach ($data as $prod) {
          if ($prod->Category3!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category3)->Title;
            $prod->CatID = $prod->Category3;
            $prod->CatLevel = 3;
          }
          elseif ($prod->Category2!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category2)->Title;
            $prod->CatID = $prod->Category2;
            $prod->CatLevel = 2;
          }
          elseif ($prod->Category1!=0)
          {
            $prod->Category = ProductCategory::find($prod->Category1)->Title;
            $prod->CatID = $prod->Category1;
            $prod->CatLevel = 1;
          }
          else {
            $prod->CatID = 0;
            $prod->Category = '';
          }
        }
        $level = $catLevel;
        $hasConsumer = false;
        $consumer = null;
        if($request->hasCookie('ConsumerID'))
        {
            $hasConsumer = true;
            $consumer = Customer::find($request->cookie('ConsumerID'));
        }
        return view('Site.shop', compact('data', 'currCategory', 'categories', 'level', 'hasConsumer', 'menuCategories', 'consumer'));
      }

    }

    public function productSearch(Request $request)
    {
      $menuCategories = self::makeMenu();
      $data = Product::where('ProductType', '=', 'Grocery')->where('Name', 'LIKE', '%'.$request->Search.'%')->orderBy('Name', 'ASC')->paginate(24);
      foreach ($data as $prod) {
        if ($prod->Category3!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category3)->Title;
          $prod->CatID = $prod->Category3;
          $prod->CatLevel = 3;
        }
        elseif ($prod->Category2!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category2)->Title;
          $prod->CatID = $prod->Category2;
          $prod->CatLevel = 2;
        }
        elseif ($prod->Category1!=0)
        {
          $prod->Category = ProductCategory::find($prod->Category1)->Title;
          $prod->CatID = $prod->Category1;
          $prod->CatLevel = 1;
        }
        else {
          $prod->CatID = 0;
          $prod->Category = '';
        }
      }
      $level = 1;
      $categ = 'Search Results';
      $categories = ProductCategory::where('isRoot', '=', 1)->where('Type', '=', 'Grocery')->get();
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.shop', compact('data', 'categ', 'categories', 'level', 'hasConsumer', 'menuCategories', 'consumer'));
    }

    public function addToCart(Request $request)
    {
      $cartID = 0;
      if($request->hasCookie('cartID'))
      {
          $cartID = $request->cookie('cartID');
      }
      else
      {
        $cart = new Carts;
        if($request->hasCookie('ConsumerID'))
        {
            $cart->ConsumerID = $request->cookie('ConsumerID');
        }
        else
        {
          $cart->ConsumerID = 0;
        }
        $cart->save();
        $minutes=24*365*3600;
        Cookie::queue('cartID', $cart->id, $minutes);
        $cartID = $cart->id;
      }
      $cartDetailExist = 0;
      if ($request->Type == 'Product')
      {
          $cartDetailExist = CartDetails::where('ProductID', '=', $request->ProductID)->where('CartID', '=', $cartID)->count();
          if ($cartDetailExist>0)
          {
            $cartDetailExisting = CartDetails::where('ProductID', '=', $request->ProductID)->where('CartID', '=', $cartID)->first();
            $cartDetailExisting->Quantity +=1;
            $cartDetailExisting->save();
          }
          else
          {
            $prod = Product::find($request->ProductID);
            $type = '';
            if ($prod->Category1!=0)
            {
              $type = ProductCategory::find($prod->Category1)->Type2;
            }
            else {
              $type = $prod->ProductType;
            }
            $cartDetail = new CartDetails;
            $cartDetail->ProductID = $request->ProductID;
            $cartDetail->ServiceID = 0;
            $cartDetail->Type = $type;
            $cartDetail->CartID = $cartID;
            $cartDetail->Quantity = 1;
            $cartDetail->save();
          }
      }
      if ($request->Type == 'Service')
      {
          $cartDetailExist = CartDetails::where('ServiceID', '=', $request->ServiceID)->where('CartID', '=', $cartID)->count();
          if ($cartDetailExist>0)
          {
            $cartDetailExisting = CartDetails::where('ServiceID', '=', $request->ServiceID)->where('CartID', '=', $cartID)->first();
            $cartDetailExisting->Quantity +=1;
            $cartDetailExisting->save();
          }
          else
          {
            $cartDetail = new CartDetails;
            $cartDetail->ProductID = 0;
            $cartDetail->ServiceID = $request->ServiceID;
            $cartDetail->Type = 'Lab Test';
            $cartDetail->CartID = $cartID;
            $cartDetail->Quantity = 1;
            $cartDetail->save();
          }
      }
      return response()->json(['Success' => 'Added To Cart Successfully!']);
    }

    public function addToCartRemove(Request $request)
    {
      $cartID = 0;
      if($request->hasCookie('cartID'))
      {
          $cartID = $request->cookie('cartID');
      }
      else
      {
        $cart = new Carts;
        if($request->hasCookie('ConsumerID'))
        {
            $cart->ConsumerID = $request->cookie('ConsumerID');
        }
        else
        {
          $cart->ConsumerID = 0;
        }
        $cart->save();
        $minutes=24*365*3600;
        Cookie::queue('cartID', $cart->id, $minutes);
        $cartID = $cart->id;
      }
      $cartDetailExist = 0;
      if ($request->Type == 'Product')
      {
          $cartDetailExist = CartDetails::where('ProductID', '=', $request->ProductID)->where('CartID', '=', $cartID)->count();
          if ($cartDetailExist>0)
          {
            $cartDetailExisting = CartDetails::where('ProductID', '=', $request->ProductID)->where('CartID', '=', $cartID)->first();
            $cartDetailExisting->Quantity -=1;
            $cartDetailExisting->save();
          }
          else
          {
            $prod = Product::find($request->ProductID);
            $type = '';
            if ($prod->Category1!=0)
            {
              $type = Category::find($prod->Category1)->Type2;
            }
            else {
              $type = $prod->ProductType;
            }
            $cartDetail = new CartDetails;
            $cartDetail->ProductID = $request->ProductID;
            $cartDetail->ServiceID = 0;
            $cartDetail->Type = $type;
            $cartDetail->CartID = $cartID;
            $cartDetail->Quantity = -1;
            $cartDetail->save();
          }
      }
      return response()->json(['Success' => 'Added To Cart Successfully!']);
    }

    public function updateTotals(Request $request)
    {
      $cartID = 0;
      if($request->hasCookie('cartID')) {
          $cartID = $request->cookie('cartID');
      }
      $cartDetail = CartDetails::where('CartID', '=', $cartID)->count();
      return response()->json(['CartCount' => $cartDetail]);
    }

    public function cart(Request $request)
    {
      $menuCategories = self::makeMenu();
      $cartID = 0;
      if($request->hasCookie('cartID'))
      {
          $cartID = $request->cookie('cartID');
      }
      $cartDetails = CartDetails::where('CartID', '=', $cartID)->get();
      foreach ($cartDetails as $cartItem)
      {
        if ($cartItem->ProductID != 0)
        {
          $cartItem->Product = Products::find($cartItem->ProductID);
        }
        if ($cartItem->ServiceID != 0)
        {
          $cartItem->Service = Services::find($cartItem->ServiceID);
        }
      }
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.cart', compact('cartDetails', 'cartID', 'hasConsumer', 'menuCategories', 'consumer'));
    }

    public function removeFromCart($id, $type, $cartID, Request $request)
    {
      if ($type == 'Service')
      {
          $cartDetails = CartDetails::where('CartID', '=', $cartID)->where('ServiceID', '=', $id)->first()->delete();
      }
      if ($type == 'Product')
      {
          $cartDetails = CartDetails::where('CartID', '=', $cartID)->where('ProductID', '=', $id)->first()->delete();
      }
      return redirect()->route('cart');
    }

    public function checkout(Request $request)
    {
      $menuCategories = self::makeMenu();
      $cartID = 0;
      if($request->hasCookie('cartID'))
      {
          $cartID = $request->cookie('cartID');
      }
      $cartDetails = CartDetails::where('CartID', '=', $cartID)->get();
      foreach ($cartDetails as $cartItem)
      {
        if ($cartItem->ProductID != 0)
        {
          $cartItem->Product = Product::find($cartItem->ProductID);
        }
        if ($cartItem->ServiceID != 0)
        {
          $cartItem->Service = Services::find($cartItem->ServiceID);
        }
      }
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.checkout', compact('cartDetails', 'consumer', 'hasConsumer', 'menuCategories', 'consumer'));
    }

    public function postCheckout(Request $request)
    {
      $user = null;
      if($request->hasCookie('ConsumerID'))
      {
        $user = Customer::find($request->cookie('ConsumerID'));
      }
      else {
        $user = new Customer;
      }
      $user->Name = $request->Name;
      $user->Email = $request->Email;
      $user->Phone = $request->Phone;
      $user->Address = $request->Address1 .' '.$request->Address2.' '.$request->City;
      $user->Password = Hash::make($request->Password);
      $user->isActive = 1;
      $user->save();
      $minutes=24*365*3600;
      Cookie::queue('ConsumerID', $user->id, $minutes);
      if($request->hasCookie('cartID'))
      {
          $cartID = $request->cookie('cartID');
      }
      $cartDetails = CartDetails::where('CartID', '=', $cartID)->get();
      $subtotal = 0;
      foreach ($cartDetails as $cartItem)
      {
        if ($cartItem->ProductID != 0)
        {
          $cartItem->Product = Product::find($cartItem->ProductID);
          $subtotal += $cartItem->Quantity * $cartItem->Product->SalePrice;
        }
        if ($cartItem->ServiceID != 0)
        {
          $cartItem->Service = Services::find($cartItem->ServiceID);
          $subtotal += $cartItem->Quantity * $cartItem->Service->SalePrice;
        }
      }
      $shipping = 0;
      if ($subtotal < 1000)
      {
        $shipping = 100;
      }
      if ($subtotal >= 1000 && $subtotal <= 10000)
      {
        $shipping = 200;
      }
      if ($subtotal > 10000)
      {
        $shipping = 0;
      }
      $total = $subtotal;
      $total += $shipping;

      $order = new Orders;
      $order->ConsumerID = $user->id;
      $order->Address = $user->Address;
      $order->Longitude = '';
      $order->Latitude = '';
      $order->OrderType = 'General';
      $order->AssignedTo = 'Unassigned';
      $order->OrderPrice = $total;
      $order->OrderPaymentReceived = 0;
      $order->isComplete = 0;
      $order->Notes = $request->Notes;
      $order->AdminNotes = '';
      $order->RiderNotes = '';
      $order->VendorNotes = '';
      $order->DeliveryType = 'Address';
      $order->OrderStatus = 'Placed';
      $order->save();
      $product = json_decode($request->Product);
      foreach($cartDetails as $rd)
      {
        $od = new OrderDetails;
        $od->OrderID = $order->id;
        $od->ProductID = $rd->ProductID;
        $od->ServiceID = $rd->ServiceID;
        $od->Quantity = $rd->Quantity;
        $od->save();
      }
      $consumer = $user;
      $users = User::all();
      foreach ($users as $u) {
        try {
          OneSignal::sendNotificationToUser(
              "Althy - New Order - From ".$consumer->Name,
              $u->OneSignalID,
              $url = null,
              $data = array(
                   'Type' => 'General',
                   'OrderID' => $order->id
                    ),
              $buttons = null,
              $schedule = null
          );
        } catch (\Exception $e) {
        }
      }
      $riders = Riders::where('Type', '=', 'General')->get();
      foreach ($riders as $u) {
        try {
          OneSignal::sendNotificationToUser(
              "Althy - New Order - From ".$consumer->Name,
              $u->OneSignalID,
              $url = null,
              $data = null,
              $buttons = null,
              $schedule = null
          );
        } catch (\Exception $e) {
        }
      }
      $minutes=24*365*3600;
      Cookie::queue('cartID', null, 1-$minutes);
      return redirect()->route('successOrder');
    }

    public function successOrder(Request $request)
    {
      $menuCategories = self::makeMenu();
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.successOrder', compact('hasConsumer', 'menuCategories', 'consumer'));
    }

    public function orders(Request $request)
    {
      $menuCategories = self::makeMenu();
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
          $orders = Orders::where('ConsumerID', '=', $consumer->id)->get();
          foreach($orders as $o)
          {
            $orderDetails = OrderDetails::where('OrderID', '=', $o->id)->get();
            foreach ($orderDetails as $od)
            {
              if ($od->ProductID!=0)
              {
                $od->Product = Product::find($od->ProductID);
              }
              if ($od->ServiceID!=0)
              {
                $od->Service = Services::find($od->ServiceID);
              }
            }
            $o->Details = $orderDetails;
          }
          return view('Site.orders', compact('hasConsumer', 'consumer', 'orders', 'menuCategories', 'consumer'));
      }
      else {
        return redirect()->route('home');
      }
    }

    public function customerLogin(Request $request)
    {
      $menuCategories = self::makeMenu();
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
          return redirect()->route('home');
      }
      return view('Site.customerLogin', compact('hasConsumer', 'menuCategories', 'consumer'));
    }

    public function customerLogout(Request $request)
    {
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          Cookie::queue('ConsumerID', 0, -100);
      }
      if($request->hasCookie('cartID'))
      {
          Cookie::queue('cartID', 0, -100);
      }
      return redirect()->route('home');
    }

    public function customerRegister(Request $request)
    {
      $menuCategories = self::makeMenu();
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
          return redirect()->route('home');
      }
      return view('Site.customerRegister', compact('hasConsumer', 'menuCategories', 'consumer'));
    }

    public function customerLoginPost(Request $request)
    {
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
          return redirect()->route('home');
      }
      else {
        $users = Customer::where('Email', '=', $request->Username)->orWhere('Phone', '=', $request->Username)->get();
        $currentUser = null;
        foreach ($users as $user) {
          if (Hash::check($request->Password, $user->Password))
          {
            $currentUser = $user;
            $minutes=24*365*3600;
            $hasConsumer = true;
            Cookie::queue('ConsumerID', $user->id, $minutes);
            return redirect()->route('home');
          }
        }
      }
      return redirect()->back()->with('error', 'Invalid Username / Password!');
    }

    public function customerRegisterPost(Request $request)
    {
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          return redirect()->route('home');
      }
      else {
        $user = new Customer;
        $user->Name = $request->Name;
        $user->Email = $request->Email;
        $user->Phone = $request->Phone;
        $user->Address = '';
        $user->Password = Hash::make($request->Password);
        $user->isActive = 1;
        $user->isVerified = 0;
        $user->save();
        $minutes=24*365*3600;
        $hasConsumer = true;
        $consumer = $user;
        Cookie::queue('ConsumerID', $user->id, $minutes);
        return redirect()->route('verifyPhone');
      }

      return redirect()->back()->with('error', 'Invalid Username / Password!');
    }

    public function verifyPhone(Request $request)
    {
      $hasConsumer = false;
      $consumer = null;
      if(!$request->hasCookie('ConsumerID'))
      {
          $hasConsumer = false;
          return redirect()->route('customerRegister');
      }
      else {
        $randomOTP = mt_rand(1000,9999);
        $consumer = Customer::find($request->cookie('ConsumerID'));
        $phone = $consumer->Phone;
        if (!Str::startsWith($phone, '03'))
        {
          if (!Str::startsWith($phone, '92'))
          {
            if (Str::startsWith($phone, '3'))
            {
              $phone = '92'.$phone;
            }
          }
        }
        try
        {
          $client = new \GuzzleHttp\Client();
          $data = 'http://websms.fc.net.pk/sendsms.php?username=fr_althy&password=althy123&sender=Althy&phone='.$phone.'&message='.'OTP for your Althy account is '.$randomOTP;
          $rqst = $client->get($data);
          $rsp = $rqst->getBody();
          \Session::put('randomOTP', $randomOTP);
          $hasConsumer = true;
          $menuCategories = self::makeMenu();
          return view('Site.verifyPhone', compact('phone', 'randomOTP', 'hasConsumer', 'menuCategories', 'consumer'));
        }
        catch (Exception $e)
        {
            return redirect()->back()->with('error', 'Could not verify this number. Please try another number!');
        }
      }
    }


    public function verifyPhonePost(Request $request)
    {
      $OTP = Session::get('randomOTP');
      if ($OTP == $request->OTP)
      {
        $consumer = Customer::find($request->cookie('ConsumerID'));
        $consumer->isVerified = 1;
        $consumer->save();
        return redirect()->route('home');
      }
      else {
        return redirect()->back()->with('error', 'Wrong Code!');
      }
    }

    public function profile(Request $request)
    {
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
          $menuCategories = self::makeMenu();
          return view('Site.profile', compact('hasConsumer', 'consumer', 'menuCategories', 'consumer'));
      }
      else {
        return redirect()->route('home');
      }
    }

    public function profilePost(Request $request)
    {
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $user = Customer::find($request->cookie('ConsumerID'));
          $user->Name = $request->Name;
          $user->Email = $request->Email;
          $user->Phone = $request->Phone;
          $user->Address = $request->Address1 .' '.$request->Address2.' '.$request->City;
          $user->Password = Hash::make($request->Password);
          $user->isActive = 1;
          $user->save();
          return redirect()->route('profile');
      }
      else {
        return redirect()->route('home');
      }
    }

    public function return(Request $request)
    {
        return view('Site.return');
    }

    public function terms(Request $request)
    {
      $hasConsumer = true;
      $consumer = Customer::find($request->cookie('ConsumerID'));
      $menuCategories = self::makeMenu();
      return view('Site.Static.terms', compact('hasConsumer', 'consumer', 'menuCategories', 'consumer'));
    }


    public function returns(Request $request)
    {
      $hasConsumer = true;
      $consumer = Customer::find($request->cookie('ConsumerID'));
      $menuCategories = self::makeMenu();
      return view('Site.Static.returns', compact('hasConsumer', 'consumer', 'menuCategories', 'consumer'));
    }

    public function productDetails($productID, Request $request)
    {
      $product =  Product::find($productID);
      if ($product->Category3!=0)
      {
        $product->Category = ProductCategory::find($product->Category3)->Title;
        $product->CatID = $product->Category3;
        $product->CatLevel = 3;
      }
      elseif ($product->Category2!=0)
      {
        $product->Category = ProductCategory::find($product->Category2)->Title;
        $product->CatID = $product->Category2;
        $product->CatLevel = 2;
      }
      elseif ($product->Category1!=0)
      {
        $product->Category = ProductCategory::find($product->Category1)->Title;
        $product->CatID = $product->Category1;
        $product->CatLevel = 1;
      }
      else {
        $product->CatID = 0;
        $product->Category = '';
      }
      $hasConsumer = false;
      $consumer = null;
      $menuCategories = self::makeMenu();
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.productDetails', compact('product', 'hasConsumer', 'consumer', 'menuCategories', 'consumer'));
    }

    public function covid(Request $request)
    {
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));

      }
      $consumer = Customer::find($request->cookie('ConsumerID'));
      $menuCategories = self::makeMenu();
      return view('Site.Covid.home', compact('hasConsumer', 'consumer', 'menuCategories', 'consumer'));
    }

    public function plasmaDonors(Request $request)
    {
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));

      }
      $consumer = Customer::find($request->cookie('ConsumerID'));
      $menuCategories = self::makeMenu();
      $donors = Donors::where('DonorType', '=', 'Donor')->get();
      return view('Site.Covid.donors', compact('donors', 'hasConsumer', 'consumer', 'menuCategories', 'consumer'));
    }

    public function plasmaReceivers(Request $request)
    {
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));

      }
      $consumer = Customer::find($request->cookie('ConsumerID'));
      $menuCategories = self::makeMenu();
      $donors = Donors::where('DonorType', '=', 'Receiver')->get();
      return view('Site.Covid.receivers', compact('donors', 'hasConsumer', 'consumer', 'menuCategories', 'consumer'));
    }

    public function express(Request $request)
    {
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));

      }
      $consumer = Customer::find($request->cookie('ConsumerID'));
      $menuCategories = self::makeMenu();
      return view('Site.express', compact('hasConsumer', 'consumer', 'menuCategories', 'consumer'));
    }

    public function althyapp(Request $request)
    {
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));

      }
      $consumer = Customer::find($request->cookie('ConsumerID'));
      $menuCategories = self::makeMenu();
      return view('Site.althyapp', compact('hasConsumer', 'consumer', 'menuCategories', 'consumer'));
    }

    public function upload(Request $request)
    {
      $menuCategories = self::makeMenu();
      $hasConsumer = false;
      $consumer = null;
      if($request->hasCookie('ConsumerID'))
      {
          $hasConsumer = true;
          $consumer = Customer::find($request->cookie('ConsumerID'));
      }
      return view('Site.upload', compact('consumer', 'hasConsumer', 'menuCategories', 'consumer'));
    }

    public function uploadPost(Request $request)
    {
      $user = null;
      if($request->hasCookie('ConsumerID'))
      {
        $user = Customer::find($request->cookie('ConsumerID'));
      }
      else {
        $user = new Customer;
      }
      $user->Name = $request->Name;
      $user->Email = $request->Email;
      $user->Phone = $request->Phone;
      $user->Address = $request->Address1 .' '.$request->Address2.' '.$request->City;
      $user->Password = Hash::make($request->Password);
      $user->isActive = 1;
      $user->save();
      $minutes=24*365*3600;
      Cookie::queue('ConsumerID', $user->id, $minutes);
      $order = new Orders;
      $order->ConsumerID = $user->id;
      $order->Address = $user->Address;
      $order->Longitude = '';
      $order->Latitude = '';
      $order->OrderType = 'General';
      $order->AssignedTo = 'Unassigned';
      $order->OrderPrice = 0;
      $order->OrderPaymentReceived = 0;
      $order->isComplete = 0;
      $order->Notes = $request->Notes;
      $order->Transcript = "";
      $order->AdminNotes = '';
      $order->RiderNotes = '';
      $order->VendorNotes = '';
      $order->DeliveryType = 'Address';
      $order->OrderStatus = 'Placed';
      $order->save();
      $file = $request->file('File');
      $extension = $file->getClientOriginalExtension();
      $destinationPath = base_path().'/public/OrderLists';
      $filename = "Order-List-".$order->id."".$extension;
      $file->move($destinationPath,$filename);
      $order->Transcript = "OrderLists/".$filename;
      $order->save();
      $consumer = $user;
      $users = User::all();
      foreach ($users as $u) {
        try {
          OneSignal::sendNotificationToUser(
              "Althy - New Order - From ".$consumer->Name,
              $u->OneSignalID,
              $url = null,
              $data = array(
                   'Type' => 'General',
                   'OrderID' => $order->id
                    ),
              $buttons = null,
              $schedule = null
          );
        } catch (\Exception $e) {
        }
      }
      $riders = Riders::where('Type', '=', 'General')->get();
      foreach ($riders as $u) {
        try {
          OneSignal::sendNotificationToUser(
              "Althy - New Order - From ".$consumer->Name,
              $u->OneSignalID,
              $url = null,
              $data = null,
              $buttons = null,
              $schedule = null
          );
        } catch (\Exception $e) {
        }
      }
      return redirect()->route('successOrder');
    }
}
