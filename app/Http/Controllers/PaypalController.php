<?php
namespace App\Http\Controllers;

use App\Credit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

/** All Paypal Details class **/

use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
class PaypalController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPayment(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your Marqab Payment Information');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('paypalStatus.get')) /** Specify return URL **/
        ->setCancelUrl(route('paypalStatus.get'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (PayPalConnectionException $ex) {
            if (Config::get('app.debug')) {
                Session::flash('error','Connection timeout');
                return redirect()->back();
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                Session::flash('error','Some error occur, sorry for inconvenient');
                return redirect()->back();
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::flash('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::flash('error','Unknown error occurred');
        return redirect()->back();
    }
    public function getStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($request->get('PayerID')) || empty($request->get('token'))) {
            Session::flash('error','Payment failed');
            return Redirect::route('settings.index');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {
            $transactions = $result->getTransactions();
            if($transactions[0] && $transactions[0]->getAmount() &&  $transactions[0]->getAmount()->getTotal() ){
                $total = $transactions[0]->getAmount()->getTotal();
                $credit = Credit::where('user_id', auth()->user()->id)->first();
                $credit->credit += $total;
                $credit->save();
            }
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            Session::flash('success','Payment success');
            return Redirect::route('settings.index');
        }
        Session::flash('error','Payment failed');
        return Redirect::route('settings.index');
    }
}
