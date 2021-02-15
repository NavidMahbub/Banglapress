<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Journal\JournalEntry;
class WorkerReports extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $invoice = JournalEntry::leftJoin('visas','journal_entries.visa_id','=','visas.id')
                 ->whereNotNull('visas.okala_date')->where('visas.status',1)
                ->select('journal_entries.*')->where('journal_entries.jurnal_type','invoice')->where('journal_entries.contact_id',$this->user_id)->sum('journal_entries.amount');
        $receive = JournalEntry::where('jurnal_type','payment_receive')->where('contact_id',$this->user_id)->sum('amount');
        return [
            'customer_name' => $this->client->name,
            'total_worker' => $this->total,
            'invoice' => $invoice,
            'receive' => $receive,
        ];
    }
}
