<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'Create-ServiceStudio', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-ServiceStudio', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-ServiceStudio', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-ServiceStudio', 'guard_name' => 'admin']);
        

        // Cancel For admin

        // Permission::create(['name' => 'Create-StoreBranch', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-StoreBranches', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-StoreBranch', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-StoreBranch', 'guard_name' => 'admin']);

        // // -------------------------------------------------------------------------

        // Permission::create(['name' => 'Create-ContactUs', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-ContactUs', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-ContactUs', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-ContactUs', 'guard_name' => 'admin']);

       
        

        
        
        // Permission::create(['name' => 'Create-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Role', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Roles', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Role', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Role', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Permission', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Permissions', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Permission', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Permission', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Admins', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Admin', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-User', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Users', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-User', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-User', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Profession', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Professions', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Profession', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Profession', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-FAQ', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-FAQs', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-FAQ', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-FAQ', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Language', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Languages', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Language', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Language', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Country', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Countries', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Country', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Country', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-City', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Cities', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-City', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-City', 'guard_name' => 'admin']);



        // Permission::create(['name' => 'Create-Ads', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Ads', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Ads', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Ads', 'guard_name' => 'admin']);


        // Permission::create(['name' => 'Create-HearAbout', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-HearAbouts', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-HearAbout', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-HearAbout', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Payment', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Payments', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Payment', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Payment', 'guard_name' => 'admin']);



        // Permission::create(['name' => 'Create-Plan', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Plans', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Plan', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Plan', 'guard_name' => 'admin']);



        // Permission::create(['name' => 'Create-Day', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Days', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Day', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Day', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Store', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Stores', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Store', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Store', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-StoreCategory', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-StoreCategories', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-StoreCategory', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-StoreCategory', 'guard_name' => 'admin']);




        // Permission::create(['name' => 'Create-Region', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Regions', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Region', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Region', 'guard_name' => 'admin']);

        

        

        // Permission::create(['name' => 'Create-Job', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Jobs', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Job', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Job', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Read-Settings', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Settings', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Category', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Categories', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Category', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Category', 'guard_name' => 'admin']);


        // Permission::create(['name' => 'Create-Sub-Category', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Sub-Categories', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Sub-Category', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Sub-Category', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Sub-Sub-Category', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Sub-Sub-Categories', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Sub-Sub-Category', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Sub-Sub-Category', 'guard_name' => 'admin']);


        // Permission::create(['name' => 'Create-Product', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Products', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Product', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Product', 'guard_name' => 'admin']);







        // Permission::create(['name' => 'Create-Trademark', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Trademarks', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Trademark', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Trademark', 'guard_name' => 'admin']);


        // Permission::create(['name' => 'Create-Trademark-Company', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Trademark-Companies', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Trademark-Company', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Trademark-Company', 'guard_name' => 'admin']);


        // Permission::create(['name' => 'Create-Unit', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Units', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Unit', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Unit', 'guard_name' => 'admin']);


        // Permission::create(['name' => 'Create-DayWork', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Create-CategoryStore', 'guard_name' => 'admin']);

        // // For Store

        // Permission::create(['name' => 'Create-StoreBranch', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Read-StoreBranches', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Update-StoreBranch', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Delete-StoreBranch', 'guard_name' => 'store']);

        // Permission::create(['name' => 'Create-Delivary', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Read-Delivares', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Update-Delivary', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Delete-Delivary', 'guard_name' => 'store']);

        // Permission::create(['name' => 'Create-PromoCode', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Read-PromoCodes', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Update-PromoCode', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Delete-PromoCode', 'guard_name' => 'store']);


        // Permission::create(['name' => 'Create-Store-Product', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Read-Store-Products', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Update-Store-Product', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Delete-Store-Product', 'guard_name' => 'store']);

        // Permission::create(['name' => 'Create-DayWork', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Create-CategoryStore', 'guard_name' => 'store']);


        // Permission::create(['name' => 'Create-Order', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Update-Order', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Delete-Order', 'guard_name' => 'store']);
        // Permission::create(['name' => 'Read-Order', 'guard_name' => 'store']);

        

        
    }
}
