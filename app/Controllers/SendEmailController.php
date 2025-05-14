<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Email\Email;

class SendEmailController extends BaseController
{
    public function index()
    {
        // Inisialisasi email service
        $email = \Config\Services::email();

        // Konfigurasi email
        $email->setFrom('admin@cognidev.my.id', 'Admin');
        $email->setTo('ruligandari@cognidev.my.id');
        $email->setSubject('Test Email');
        $email->setMessage('This is a test email sent from CodeIgniter 4.');

        // Pengaturan SMTP
        $emailConfig = [
            'protocol'  => 'smtp',
            'SMTPHost'  => 'mail.cognidev.my.id',
            'SMTPUser'  => 'admin@cognidev.my.id', // Ganti dengan email yang benar
            'SMTPPass'  => 'g@n570Rul',  // Ganti dengan password email yang benar
            'SMTPPort'  => 465, // Port 465 untuk SSL, atau 587 untuk TLS
            'SMTPCrypto' => 'ssl', // Gunakan 'ssl' atau 'tls' sesuai pengaturan Anda
        ];

        // Inisialisasi email dengan konfigurasi
        $email->initialize($emailConfig);

        // Mengirim email
        if ($email->send()) {
            return 'Email berhasil dikirim!';
        } else {
            // Menampilkan error
            return 'Gagal mengirim email: ' . $email->printDebugger();
        }
    }
}
