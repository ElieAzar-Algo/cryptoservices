<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use App\Models\User;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{

    public function index(){
        if (auth()->user()) {
            $user= User::where('id',auth()->user()->id)->with('payments')->first();
            $purchases = $user->payments;
            $purid= array();
    
            foreach($purchases as $purchase){
            array_push($purid,$purchase->serviceid );
            }
        
            if (in_array("3", $purid)){
                return view('chatroom');
            }else{
                return redirect()->route('service', "id=2");
            }
        }else{
            return redirect()->route('pleasesignin');
        }
    }
    public function handle()
    {
        $botman = app('botman');
   
        $botman->hears('{message}', function($botman, $message) {
   
            if (fnmatch("* digital wallet*",$message)) {
                $this->askWallet($botman);
            }elseif(fnmatch("* wallet address*",$message)){
                $this->askAddress($botman);
            }elseif(fnmatch("* bitcoin*",$message)){
                $this->askBitcoin($botman);
            }elseif(fnmatch("* defi*",$message)){
                $this->askDefi($botman);
            }elseif(fnmatch('*blockchain*',$message)){
                $this->askBlockchain($botman);
            }elseif(fnmatch('*crypto*',$message)){
                $this->askCrypto($botman);
            }else{
                $botman->reply("Please ask me anything related to the Blockchain, Defi, or Cryptocurrencies");
            }
   
        });
   
        $botman->listen();
    }
   
    /**
     * Place your BotMan logic here.
     */
    public function askWallet($botman)
    {
        $botman->ask('A digital wallet (or electronic wallet) is a financial transaction application that runs on mobile devices. 
        It securely stores your payment information and passwords.
        These applications allow you to pay when you\'re shopping using your device so that you don\'t need to carry your cards around.
        You enter and store your credit card, debit card, or bank account information and can then use your device to pay for purchases.
        You can create digital wallet by downloading Binance or OKX and follow the registration process
        
        Do want to ask anything else?', function(Answer $answer) {
   
            $name = $answer->getText();
            
            if (fnmatch("*no*",$name)) {
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*thanks*",$name)){
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*thank you*",$name)){
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*yes*",$name)){
                $this->say('Please ask me anything related to the Blockchain, Defi, or Cryptocurrencies');
                
            }else{
                $this->say('Sorry I couldn\'t understand your question!');
            }
        });
    }

    public function askAddress($botman)
    {
        $botman->ask('Wallet address is your address key for you wallet that contains your assets <br> 
        Everytime you need to withdraw or deposit digital currencies you have to specify the wallet address for your transaction.

        Do you want to ask anything else?
        ', function(Answer $answer) {
   
            $name = $answer->getText();
            if (fnmatch("*no*",$name)) {
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*thanks*",$name)){
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*thank you*",$name)){
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*yes*",$name   )){
                $this->say('Please ask me anything related to the Blockchain, Defi, or Cryptocurrencies');
            }else{
                $this->say('Sorry I couldn\'t understand your question!');
            }
        });
    }

    public function askBitcoin($botman)
    {
        $botman->ask('Bitcoin is a decentralized digital currency that you can buy, sell and exchange directly, 
        without an intermediary like a bank.
        Bitcoin\'s creator, Satoshi Nakamoto, 
        originally described the need for \“an electronic payment system based on cryptographic proof instead of trust

        Do you want to ask anything else?
        ', function(Answer $answer) {
   
            $name = $answer->getText();
            if (fnmatch("*no*",$name)) {
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*thanks*",$name)){
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*thank you*",$name)){
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*yes*",$name   )){
                $this->say('Please ask me anything related to the Blockchain, Defi, or Cryptocurrencies');
            }else{
                $this->say('Sorry I couldn\'t understand your question!');
            }
        });
    }

    public function askBlockchain($botman)
    {
        $botman->ask(' Blockchain is a shared, immutable ledger that facilitates
         the process of recording transactions and tracking assets in a business network. 
        An asset can be tangible (a house, car, cash, land) or intangible (intellectual property, patents, copyrights, branding).

        Do you want to ask anything else?
        ', function(Answer $answer) {
   
            $name = $answer->getText();
            if (fnmatch("*no*",$name)) {
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*thanks*",$name)){
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*thank you*",$name)){
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*yes*",$name   )){
                $this->say('Please ask me anything related to the Blockchain, Defi, or Cryptocurrencies');
            }else{
                $this->say('Sorry I couldn\'t understand your question!');
            }
        });
    }

    public function askCrypto($botman)
    {
        $botman->ask('A cryptocurrency (or “crypto”) is a digital asset that can circulate
         without the need for a central monetary authority such as a government or bank.
         Instead, cryptocurrencies are created using cryptographic techniques that enable people to buy, sell or trade them securely.

        Do you want to ask anything else?
        ', function(Answer $answer) {
   
            $name = $answer->getText();
            if (fnmatch("*no*",$name)) {
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*thanks*",$name)){
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*thank you*",$name)){
                $this->say('Nice to meet you have a good day');
            }elseif(fnmatch("*yes*",$name   )){
                $this->say('Please ask me anything related to the Blockchain, Defi, or Cryptocurrencies');
            }else{
                $this->say('Sorry I couldn\'t understand your question!');
            }
        });
    }
}