<?php

namespace App\Policies;

use App\Models\Company;
use App\Traits\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class CompanyPolicy
 * @package App\Policies
 */
class CompanyPolicy
{
    use HandlesAuthorization, Permission;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function showAllCompanies()
    {
        return $this->hasPermission("show_all_companies");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Company|null $company
     * @return mixed
     */
    public function showCompanyDetails(User $user, Company $company = null)
    {
        return $user->hasPermission("show_company_details");
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function addNewCompany(User $user)
    {
        return $user->hasPermission("add_new_company");
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Company|null $company
     * @return mixed
     */
    public function updateCompany(User $user, Company $company = null)
    {
        return $user->hasPermission("update_company");
    }
}
