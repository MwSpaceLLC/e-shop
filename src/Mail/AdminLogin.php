<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use MwSpace\Eshop\Model\AdminEshop;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminLogin extends Mailable
{
    use Queueable, SerializesModels;

    private $admin;

    /**
     * AdminLogin constructor.
     * @param Admin $admin
     */
    public function __construct(AdminEshop $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('www@ladietaperfetta.com')
            ->markdown('emails.admin.login')->with('admin', $this->admin);
    }
}
