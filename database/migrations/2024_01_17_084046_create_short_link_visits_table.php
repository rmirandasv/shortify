<?php

use App\Models\ShortLink;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('short_link_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ShortLink::class)->constrained()->onDelete('cascade');
            $table->string('ip');
            $table->string('country_code')->nullable();
            $table->string('country_name')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('browser')->nullable();
            $table->string('platform')->nullable();
            $table->string('device_family')->nullable();
            $table->string('device')->nullable();
            $table->string('device_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_link_visits');
    }
};
