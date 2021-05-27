<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    protected $sliderRepository, $postRepository,
        $productsRepository, $achievementsRepository,
        $pageRepository, $statedRepository, $sponsorRepository;

    public function __construct() {
    }

    public function getInfo($userID){
        $user = Auth::user();

        return view('web.page.users.index', compact('user'));
    }

    public function history($userID){
        $user = Auth::user();
        if($userID != $user->id){
            return view('web.errors.403');
        }
        $orders = Orders::where('customer_id', $userID)->orderBy('id', 'desc')->get();
        return view('web.page.users.history', compact('orders'));
    }

    public function checkOrders($userID){
        return view('web.page.users.checkOrders');
    }
    
    public function detailOrders($userID, $ordersID){
        $user = Auth::user();
        if($userID != $user->id){
            return view('web.errors.403');
        }
        $orders = Orders::with('detail', 'attached')->find($ordersID);
        return view('web.page.users.detailOrders', compact('orders'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
