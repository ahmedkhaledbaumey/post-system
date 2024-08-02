<?php

use App\Models\UserProfile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {     $privacy =UserProfile::privacy;
        Schema::create('user_profiles', function (Blueprint $table) use ($privacy) {
            $table->id();
            $table->string('profile_photo')->nullable();
            $table->string('cover_photo')->nullable();
            $table->enum('privacy',$privacy)->default($privacy[1]);
            $table->json('skills')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
