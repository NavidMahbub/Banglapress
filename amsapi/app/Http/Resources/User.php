<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\MoneyIn\Invoice;
use App\Models\MoneyIn\PaymentReceive;
use App\Http\Resources\Recruiting\Visa as VisaResources;
use App\Http\Resources\Recruiting\VisaBasic as VisaBasicResource;
use App\Models\Recruiting\Visa;
use App\RoleUser;
use DB;
use App\Models\Journal\JournalEntry;
use Auth;
class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $rbl_p_invoice = Invoice::join('visas','visas.id','invoices.visa_id')->where('visas.status',1)->where('visas.okala_date','!=',null)->groupBy('visa_id')->where('visas.type',1)->where('invoices.customer_id',$this->id)->select('visa_id', DB::raw('SUM(total) as total_amount'),DB::raw('SUM(due_amount) as total_due_amount'))->with('visa')->get();
        // $rbl_r_invoice = Invoice::join('visas','visas.id','invoices.visa_id')->where('visas.status',2)->where('visas.okala_date','!=',null)->groupBy('visa_id')->where('visas.type',1)->where('invoices.customer_id',$this->id)->select('visa_id', DB::raw('SUM(total) as total_amount'),DB::raw('SUM(due_amount) as total_due_amount'))->with('visa')->get();
        // $amir_p_invoice = Invoice::join('visas','visas.id','invoices.visa_id')->where('visas.status',3)->where('visas.okala_date','!=',null)->groupBy('visa_id')->where('visas.type',1)->where('invoices.customer_id',$this->id)->select('visa_id', DB::raw('SUM(total) as total_amount'),DB::raw('SUM(due_amount) as total_due_amount'))->with('visa')->get();
        // $amir_r_invoice = Invoice::join('visas','visas.id','invoices.visa_id')->where('visas.status',4)->where('visas.okala_date','!=',null)->groupBy('visa_id')->where('visas.type',1)->where('invoices.customer_id',$this->id)->select('visa_id', DB::raw('SUM(total) as total_amount'),DB::raw('SUM(due_amount) as total_due_amount'))->with('visa')->get();
        
        $rbl_p_okalawaiting = Visa::where('user_id',$this->id)->where('status',1)->where('type',1)->where('okala_date',null)->where('stamping_date',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $rbl_p_okala = Visa::where('user_id',$this->id)->where('status',1)->where('type',1)->where('okala_date','!=',null)->where('stamping_date',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $rbl_p_visa = Visa::where('user_id',$this->id)->where('status',1)->where('type',1)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $rbl_p_manpower = Visa::where('user_id',$this->id)->where('status',1)->where('type',1)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date',null)->where('completed_date',null)->get();
        $rbl_p_delivery = Visa::where('user_id',$this->id)->where('status',1)->where('type',1)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date','!=',null)->where('completed_date',null)->get();
        $rbl_p_completed = Visa::where('user_id',$this->id)->where('status',1)->where('type',1)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date','!=',null)->where('completed_date','!=',null)->get();
        
        $rbl_r_okalawaiting = Visa::where('user_id',$this->id)->where('status',1)->where('type',2)->where('okala_date',null)->where('stamping_date',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $rbl_r_okala = Visa::where('user_id',$this->id)->where('status',1)->where('type',2)->where('okala_date','!=',null)->where('stamping_date',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $rbl_r_visa = Visa::where('user_id',$this->id)->where('status',1)->where('type',2)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $rbl_r_manpower = Visa::where('user_id',$this->id)->where('status',1)->where('type',2)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date',null)->where('completed_date',null)->get();
        $rbl_r_delivery = Visa::where('user_id',$this->id)->where('status',1)->where('type',2)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date','!=',null)->where('completed_date',null)->get();
        $rbl_r_completed = Visa::where('user_id',$this->id)->where('status',1)->where('type',2)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date','!=',null)->where('completed_date','!=',null)->get();
        
        $amir_p_okalawaiting = Visa::where('user_id',$this->id)->where('status',1)->where('type',3)->where('okala_date',null)->where('stamping_date',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $amir_p_okala = Visa::where('user_id',$this->id)->where('status',1)->where('type',3)->where('okala_date','!=',null)->where('stamping_date',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $amir_p_visa = Visa::where('user_id',$this->id)->where('status',1)->where('type',3)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $amir_p_manpower = Visa::where('user_id',$this->id)->where('status',1)->where('type',3)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date',null)->where('completed_date',null)->get();
        $amir_p_delivery = Visa::where('user_id',$this->id)->where('status',1)->where('type',3)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date','!=',null)->where('completed_date',null)->get();
        $amir_p_completed = Visa::where('user_id',$this->id)->where('status',1)->where('type',3)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date','!=',null)->where('completed_date','!=',null)->get();
        
        $amir_r_okalawaiting = Visa::where('user_id',$this->id)->where('status',1)->where('type',4)->where('okala_date',null)->where('stamping_date',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $amir_r_okala = Visa::where('user_id',$this->id)->where('status',1)->where('type',4)->where('okala_date','!=',null)->where('stamping_date',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $amir_r_visa = Visa::where('user_id',$this->id)->where('status',1)->where('type',4)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date',null)->where('account_date',null)->where('completed_date',null)->get();
        $amir_r_manpower = Visa::where('user_id',$this->id)->where('status',1)->where('type',4)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date',null)->where('completed_date',null)->get();
        $amir_r_delivery = Visa::where('user_id',$this->id)->where('status',1)->where('type',4)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date','!=',null)->where('completed_date',null)->get();
        $amir_r_completed = Visa::where('user_id',$this->id)->where('status',1)->where('type',4)->where('okala_date','!=',null)->where('stamping_date','!=',null)->where('manpowe_date','!=',null)->where('account_date','!=',null)->where('completed_date','!=',null)->get();
        
        $total_invoice  = JournalEntry::Join('visas','journal_entries.visa_id','=','visas.id')
                 ->whereNotNull('visas.okala_date')->where('visas.status',1)
                ->select('journal_entries.*')->where('journal_entries.jurnal_type','invoice')->where('journal_entries.contact_id',$this->id)->sum('journal_entries.amount');
        $total_receive = JournalEntry::where('jurnal_type','payment_receive')->where('contact_id',$this->id)->sum('amount');
        $role = RoleUser::where('user_id',Auth::user()->id)->first(); 
        if($role->role_id==2){
            $invoices = JournalEntry::Join('visas','journal_entries.visa_id','=','visas.id')
                      ->whereNotNull('visas.okala_date')->where('visas.status',1)
                      ->select('journal_entries.*')->where('journal_entries.jurnal_type','invoice')->where('journal_entries.contact_id',$this->id)->get();
            $receives = JournalEntry::where('jurnal_type','payment_receive')->where('contact_id',$this->id)->get();
        }else{
            $receives = '';
            $invoices = '';
        }
        
        
        return [
            // 'rbl_p_invoice'=>$rbl_p_invoice,
            // 'rbl_r_invoice'=>$rbl_r_invoice,
            // 'amir_p_invoice'=>$amir_p_invoice,
            // 'amir_r_invoice'=>$amir_r_invoice,
            'invoices'           =>$invoices,
            'receives'           =>$receives,
            'rbl_p_okalawaiting'=>$rbl_p_okalawaiting,
            'rbl_p_okala'=>$rbl_p_okala,
            'rbl_p_visa'=>$rbl_p_visa,
            'rbl_p_manpower'=>$rbl_p_manpower,
            'rbl_p_delivery'=>$rbl_p_delivery,
            'rbl_p_completed'=>$rbl_p_completed,
            'rbl_r_okalawaiting'=>$rbl_r_okalawaiting,
            'rbl_r_okala'=>$rbl_r_okala,
            'rbl_r_visa'=>$rbl_r_visa,
            'rbl_r_manpower'=>$rbl_r_manpower,
            'rbl_r_delivery'=>$rbl_r_delivery,
            'rbl_r_completed'=>$rbl_r_completed,
            'amir_p_okalawaiting'=>$amir_p_okalawaiting,
            'amir_p_okala'=>$amir_p_okala,
            'amir_p_visa'=>$amir_p_visa,
            'amir_p_manpower'=>$amir_p_manpower,
            'amir_p_delivery'=>$amir_p_delivery,
            'amir_p_completed'=>$amir_p_completed,
            'amir_r_okalawaiting'=>$amir_r_okalawaiting,
            'amir_r_okala'=>$amir_r_okala,
            'amir_r_visa'=>$amir_r_visa,
            'amir_r_manpower'=>$amir_r_manpower,
            'amir_r_delivery'=>$amir_r_delivery,
            'amir_r_completed'=>$amir_r_completed,
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'total_receive'=>$total_receive,
            'total_invoice'=>$total_invoice,
            'type'=>$this->type,
            'contact_id' => $this->contact->id,
            'designation' => $this->contact->designation,
            'father_name' => $this->contact->father_name,
            'mother_name' => $this->contact->mother_name,
            'spouse_name' => $this->contact->spouse_name,
            'area_code' => $this->contact->area_code,
            'mobile_number' => $this->contact->mobile_number,
            'contact_number' => $this->contact->contact_number,
            'occupation' => $this->contact->occupation,
            'nid' => $this->contact->nid,
            'image' => $this->contact->image,
            'birthday' => $this->contact->birthday,
            'ward_union' => $this->contact->ward_union,
            'area_village' => $this->contact->area_village,
            'street_para' => $this->contact->street_para,
            'post_ofiice' => $this->contact->post_ofiice,
            'company_name' => $this->contact->company_name,
            'agent_id' => $this->contact->agent_id,
            'district_name' => $this->contact->district ? $this->contact->district->name : "" ,
            'district_id' => $this->contact->district ? $this->contact->district->id : null ,
            'subdistrict_name' => $this->contact->upazila ? $this->contact->upazila->name : "" ,
            'subdistrict_id' => $this->contact->upazila ? $this->contact->upazila->id : null ,
            'agent' => $this->contact->agent ? $this->contact->agent->name : "" ,
            'updated_by' => $this->contact->updatedBy ? $this->contact->updatedBy->name : "" ,
            'created_by' => $this->contact->createdBy ? $this->contact->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'image' => $this->contact->image,
            'role_id' => $this->roleUser ? $this->roleUser->role->id:null,
            'role_name' => $this->roleUser ? $this->roleUser->role->name:"",
            'visas' => VisaBasicResource::collection($this->visasall),
            
        ];
    }
}
