<?php

namespace App\Controllers\Account;

use App\Controllers\Controller;
use Exception;

class BillingController extends Controller
{
    /**
     * @throws Exception
     */
    public function show() {
        $this->render('account.pages.billing', [
            'nom' => session()->get('nom') ?? '',
            'prenom' => session()->get('prenom') ?? '',
            'email' => session()->get('email') ?? '',
            'avatar' => 'https://www.rgd.fr/wp-content/uploads/2021/01/avatar-anonyme.png'
        ]);
    }

    public function save() {
        if (isset($_POST['save-billing'])) {
            // TODO: Save Billing
        }
    }
}