<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class goshopperMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $pName;
    public $pPrice;
    public $pQuantity;
    public $customer_data;
    public $product_data;

    public function __construct($product_quantity,$product_name,$product_price,$get_customer_data,$get_product_data)
    {
        $this->pName = $product_name;
        $this->pPrice = $product_price;
        $this->pQuantity = $product_quantity;
        $this->customer_data = $get_customer_data;
        $this->product_data = $get_product_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $build_pName = $this->pName;
        $build_pPrice = $this->pPrice;
        $build_pQuantity = $this->pQuantity;
        $build_customer_data = $this->customer_data;
        $build_product_data = $this->product_data;
        //goshopper2417 //GoShopper2417
        $subject = 'Go Shopper';
        return $this->view('layout.mail',['product_name'=>$build_pName,'product_price'=>$build_pPrice,'quantity'=>$build_pQuantity,
            'customer_data'=>$build_customer_data,'product_data'=>$build_product_data])->subject($subject);
    }
}
