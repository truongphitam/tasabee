<?php

namespace App\Console\Commands;

use App\Models\Orders;
use Illuminate\Console\Command;
use Mail;
use App;
use App\User;

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
        \Log::info('SendEmailsForOrders: '. date('d/m/Y H:i:s'));
        // lấy những orders đã được confirm (confirm_status = 1 ) và chưa được gửi đi (sended = 0)
        // sau khi gửi đi xong thì update lại confirm_status = 0 và sended = 1;
        // Phương thức thanh toán TT mới gửi đi
        $orders = Orders::with('customer', 'staff', 'detail', 'attached')->where('method', 'TT')->where('confirm_status', 1)->where('sended', 0)->whereIn('status_orders', [0, 2, 4])->get();
        if($orders){
            foreach($orders as $order){
                $view = '';
                $subject = 'Đơn hàng ';
                $locale = 'vi';
                $member = User::find($order->customer_id);
                if($member && $member->country != 'VN'){
                    $locale = 'en';
                }
                switch($order->status_orders){
                    case 0:
                        $view = 'orders_new';
                        $subject = 'Tasabee - Xác nhận đơn hàng';
                        if($locale != 'vi'){
                            $subject = 'Tasabee - Order confirmation email ';
                        }
                        break;
                    case 2:
                        $view = 'orders_shipping';
                        $subject = 'Tasabee - Email thông báo đơn hàng đã rời khỏi xưởng';
                        if($locale != 'vi'){
                            $subject = 'Tasabee - Notification email of the shipment left the factory';
                        }
                        break;
                    case 4:
                        $view = 'orders_finished';
                        $subject = 'Tasabee - Hàng đã đến địa điểm chỉ định';
                        if($locale != 'vi'){
                            $subject = 'Tasabee - Notification email of shipment arrived at the specified location';
                        }
                        break;
                }
                if($view){
                    $view = 'mail.'.$view.'_'.$locale;
                    print_r('-- ID: '.$order->id).PHP_EOL;
                    print_r('-- View: '. $view).PHP_EOL;
                    $email_send_to = $order->customer ? $order->customer->email : '';
                    if($email_send_to){
                        Mail::send($view, ['order' => $order], function ($m) use($subject, $order, $email_send_to){
                            \Log::info('Mail send to: '. $order->customer->email);
                            $m->from('noreply@tasabee.com', 'Tassabe');
                            $m->to($email_send_to, 'noreply@tasabee.com')->subject($subject);
                        });
                    }
                    //
                    Orders::where('id', $order->id)->update(['confirm_status' => 0, 'sended' => 1]);
                    print_r('-- Send and Update Success ID: '.$order->id);
                }
                
                return true;
            }
        }
    }
}
