<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Models\Recruiting\Visa;
use App\Models\MoneyOut\Expense;
use App\Models\MoneyIn\Income;
use App\Models\MoneyIn\Invoice;
use App\Models\MoneyIn\PaymentReceive;
use App\User;
use App\Http\Resources\Contact as ContactResource;
use App\Http\Resources\User as UserResource;
use Carbon\Carbon;
use App\Models\Journal\JournalEntry;
class StatisticsController extends Controller
{
    public function index(){
    	$clients = User::all();
        $total_invoice = Invoice::sum('total');
    	$data = [
    	    'clients' => UserResource::collection($clients),
        ];
        return Response::Json($data); 
    }
    public function report(){
        
        $date = Carbon::today();
        $today_date =   $date.' 22:00:40';
        $today_total_invoice  = JournalEntry::Join('visas','journal_entries.visa_id','=','visas.id')
                 ->whereNotNull('visas.okala_date')->where('journal_entries.created_at', $today_date)->where('visas.status',1)
                ->select('journal_entries.*')->where('journal_entries.jurnal_type','invoice')->sum('journal_entries.amount');
        $today_total_receive = JournalEntry::where('jurnal_type','payment_receive')->where('created_at', $today_date)->sum('amount');
        $today_due_amount = $today_total_invoice-$today_total_receive;
        $today_total_expense = JournalEntry::where('jurnal_type','expense')->where('created_at', $today_date)->sum('amount');
        $today_total_visa = Visa::where('status',1)->where('created_at', $today_date)->count();
        $today_clients = User::where('type',1)->where('created_at', $today_date)->count();
        $today_cash_in_hand = $today_total_receive-$today_total_expense;
        
        $total_invoice  = JournalEntry::Join('visas','journal_entries.visa_id','=','visas.id')
                 ->whereNotNull('visas.okala_date')->where('visas.status',1)
                ->select('journal_entries.*')->where('journal_entries.jurnal_type','invoice')->sum('journal_entries.amount');
        $total_receive = JournalEntry::where('jurnal_type','payment_receive')->sum('amount');
        $due_amount = $total_invoice-$total_receive;
        $total_expense = JournalEntry::where('jurnal_type','expense')->sum('amount');
        $total_visa = Visa::where('status',1)->count();
        $clients = User::where('type',1)->count();
        $cash_in_hand = $total_receive-$total_expense;
        
        $data = [
    	    'today_clients' => $today_clients,
    	    'today_total_invoice' => $today_total_invoice,
    	    'today_total_invoice_due' => $today_due_amount,
    	    'today_total_visa' => $today_total_visa,
    	    'today_total_expense'=>$today_total_expense,
    	    'today_total_payment_receive' =>$today_total_receive,
    	    'today_cash_in_hand'  => $today_cash_in_hand,
    	    'cash_in_hand'   => $cash_in_hand,
    	    'clients' => $clients,
    	    'total_invoice' => $total_invoice,
    	    'total_invoice_due' => $due_amount,
    	    'total_visa' => $total_visa,
    	    'total_expense'=>$total_expense,
    	    'total_payment_receive' =>$total_receive,
        ];
        return Response::Json($data);
    }
}
