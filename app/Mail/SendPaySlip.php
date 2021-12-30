<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPaySlip extends Mailable
{
    use Queueable, SerializesModels;

    public $payslip;
    public $monthName;
    public $year;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payslip)
    {
        $this->payslip = $payslip;
        $month_and_year = explode("-", $this->payslip['month']);
        $month = $month_and_year[1];
        $year = $month_and_year[0];
        $dateObj   = \DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        $this->monthName = $monthName;
        $this->year = $year;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('myatminthant.mmt23@gmail.com','Lucid Infoweb LLC.')
                    ->subject('Monthly Payslip')
                    ->attach(public_path($this->payslip['pdf']), [
                            'as' => 'Payslip for '.$this->monthName.', '.$this->year.'.pdf',
                            'mime' => 'application/pdf',
                        ])
                    ->view('backend.payrolls.mail');
    }
}
