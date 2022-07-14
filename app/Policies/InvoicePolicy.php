<?php

namespace App\Policies;

use App\Models\Invoice;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function showAllInvoices(User $user)
    {
        return $user->hasPermission("show_all_invoices");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Invoice  $invoice
     * @return mixed
     */
    public function printInvoice(User $user, Invoice $invoice)
    {
        return $user->hasPermission("print_invoice");
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function addNewInvoice(User $user)
    {
        return $user->hasPermission("add_new_invoice");
    }
}
