<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleVendor = Role::create(['name' => 'vendor']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
