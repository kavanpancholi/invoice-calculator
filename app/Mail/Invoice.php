<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Facades\Excel;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;

    protected $invoice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->invoice->toArray();
        Excel::create('invoice', function($excel) use ($data) {
            $excel->sheet('New sheet', function($sheet) use ($data) {
                $sheet->loadView('invoices.excel.sheet')->with('data',$data);
            });
        })->store('xls', public_path('exports'));

        return $this->view('emails.invoice')
            ->attach(public_path('exports/invoice.xls',[
                'as' => 'Invoice.xls',
                'mime' => 'application/vnd.ms-excel',
            ]));
    }
}
