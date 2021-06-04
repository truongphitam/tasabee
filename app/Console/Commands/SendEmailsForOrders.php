<?php

namespace App\Console\Commands;

use App\Models\Orders;
use Illuminate\Console\Command;
use Mail;
use App;
class SendEmailsForOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:send-mail-for-status-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto send mail when update status orders Đơn hàng mới Đang giao hàng / Đã giao hàng';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // lấy những orders đã được confirm (confirm_status = 1 ) và chưa được gửi đi (sended = 0)
        // sau khi gửi đi xong thì update lại confirm_status = 0 và sended = 1;
        $orders = Orders::with('detail', 'attached')->where('confirm_status', 1)->where('sended', 0)->get();
        if($orders){
            foreach($orders as $order){
                $view = '';
                $subject = '';
                switch($order->status_orders){
                    case 0:
                        $view = 'orders_new';
                        $subject = 'orders_new';
                        break;
                    case 2:
                        $view = 'orders_shipping';
                        $subject = 'orders_shipping';
                        break;
                    case 4:
                        $view = 'orders_finished';
                        $subject = 'orders_finished';
                        break;
                }
                if($view){
                    $view = 'mail.'.$view.'_'.app()->getLocale();
                    print_r('ID: '.$order->id).PHP_EOL;
                    print_r('View: '. $view).PHP_EOL;
                    Mail::send($view, ['data' => $order], function ($m) use($subject, $order){
                        $m->from('noreply@tasabee.com', 'Tassabe – Overcome Business Standards');
                        $m->to('tamphitruong@gmail.com', 'name_send')->subject($subject);
                    });
                    //
                    Orders::where('id', $order->id)->update(['confirm_status' => 0, 'sended' => 1]);
                    print_r('Send and Update Success ID: '.$order->id);
                }
                
                return true;
            }
        }
    }
}
