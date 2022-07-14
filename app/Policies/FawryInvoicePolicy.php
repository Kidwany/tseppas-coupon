<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FawryInvoicePolicy
{
    use HandlesAuthorization;

    public function showAllFawryInvoices(User $user)
    {
        return $user->hasPermission("show_fawry_invoices");
    }

    public function addNewFawryInvoice(User $user)
    {
        return $user->hasPermission("create_fawry_invoice");
    }
}
