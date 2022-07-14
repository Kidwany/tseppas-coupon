<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            /*["name_en" => "Show All Users",       "name_ar" => "اظهار جميع المستخدمين",        "code" => "show_all_users",     "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show User Profile",      "name_ar" => "اظهار الملف الشخصي للمستخدم",  "code" => "show_user_profile",  "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Delete Profile",         "name_ar" => "حذف المستخدم",                 "code" => "delete_user",        "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Add Balance to user",    "name_ar" => "اضافة رصيد للمستخدم",          "code" => "add_balance_to_user","guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show User Orders",       "name_ar" => "مشاهدة طلبات المستخدم",        "code" => "show_user_orders",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show All Stars",         "name_ar" => "اظهار جميع الحريفة",           "code" => "show_all_stars",     "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show Star Profile",      "name_ar" => "مشاهدة ملف الحريف",            "code" => "show_star_profile",  "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Delete Star",            "name_ar" => "حذف الحريف",                   "code" => "delete_star",        "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Update Star Info",       "name_ar" => "تعديل بيانات الحريف",          "code" => "update_star",        "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show Star Orders",       "name_ar" => "اظهار طلبات الحريف",           "code" => "show_star_orders",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show All Companies",     "name_ar" => "اظهار جميع الشركات",           "code" => "show_all_companies",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show Company Details",   "name_ar" => "اظهار تفاصيل الشركة",          "code" => "show_company_details",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Update Company",         "name_ar" => "تعديل بيانات الشركة",          "code" => "update_company",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Add New Company",        "name_ar" => "اضافة شركة جديدة",             "code" => "add_new_company",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show Offers",            "name_ar" => "اظهار العروض",                 "code" => "show_all_offers",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Add New Offer",          "name_ar" => "إضافة عرض جديد",               "code" => "add_new_offer",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Update Offer",           "name_ar" => "تعديل العرض",                  "code" => "update_offer",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Delete Offer",           "name_ar" => "حذف العرض",                    "code" => "delete_offer",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show All Orders",        "name_ar" => "إظهار جميع الطلبات",           "code" => "show_all_orders",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show Order Details",     "name_ar" => "مشاهدة تفاصيل الطلب",          "code" => "show_order_details",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Cancel Order",           "name_ar" => "إلغاء الطلب",                  "code" => "cancel_order",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show Orders Statistics", "name_ar" => "إظهار احصائيات الطلبات",       "code" => "show_orders_statistics",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show All Categories",    "name_ar" => "مشاهدة الأقسام",                "code" => "show_all_categories",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Add new category",       "name_ar" => "اضافة قسم جديد",               "code" => "add_new_category",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Update category",        "name_ar" => "تعديل القسم",                  "code" => "update_category",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Delete category",        "name_ar" => "حذف القسم",                    "code" => "delete_category",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Add new Notification",   "name_ar" => "ارسال اشعار",                  "code" => "add_new_notification",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Add new Invoice",        "name_ar" => "انشاء فاتورة جديدة",           "code" => "add_new_invoice",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show all invoices",      "name_ar" => "مشاهدة الفواتير السابقة",      "code" => "show_all_invoices",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Print Invoice",          "name_ar" => "طباعة فاتورة",                 "code" => "print_invoice",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Add new promo code",     "name_ar" => "اضافة كود خصم",                "code" => "add_new_promo_code",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Update Promo code",      "name_ar" => "تعديل كود الخصم",              "code" => "update_promo_code",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show all promo codes",   "name_ar" => "اظهار جميع اكواد الخصم",       "code" => "show_all_promo_codes",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Delete promo code",      "name_ar" => "حذف كود الخصم",                "code" => "delete_promo_code",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show All admins",        "name_ar" => "اظهار جميع المديرين",          "code" => "show_all_admins",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Add new admin",          "name_ar" => "اضافة مدير جديد",              "code" => "add_new_admin",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Update Admin",           "name_ar" => "تعديل المدير",                 "code" => "update_admin",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Delete Admin",           "name_ar" => "حذف المدير",                   "code" => "delete_admin",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Update Payment Setting", "name_ar" => "تعديل إعدادات الدفع",          "code" => "update_payment_setting",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Update Contact Info",    "name_ar" => "تعديل بيانات الإتصال",          "code" => "update_contact_info",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],*/
            /*["name_en" => "Show All Roles",       "name_ar" => "شاهد جميع مجموعات المستخدمين", "code" => "show_all_roles",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Add New Role",           "name_ar" => "اضافة مجموعة مستخدمين جديدة",  "code" => "add_new_role",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Update Role",            "name_ar" => "تعديل مجموعة المستخدمين",      "code" => "update_role",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Delete Role",            "name_ar" => "حذف مجموعة المستخدمين",        "code" => "delete_role",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show Latest Orders",     "name_ar" => "اظهار اخر الطلبات",            "code" => "show_latest_orders",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
            ["name_en" => "Show Dashboard Statistics",     "name_ar" => "اظهار الإحصائيات العامة",            "code" => "show_dashboard_statistics",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],*/
            ["name_en" => "Add new Star",           "name_ar" => "إضافة حريف جديد",            "code" => "add_new_star",   "guard_name" => "web", "created_at" => now(), "updated_at" => now()],
        ];

        //DB::table("permissions")->insert($permissions);
    }
}
