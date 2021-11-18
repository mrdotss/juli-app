<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            // Company
            $table->char('dealer_code', 5)->default('03483');
            $table->char('dealer_group', 2);
            
            // Users
            $table->string('full_name', 50);
            $table->string('birth_place', 20);
            $table->date('birth_date');
            $table->string('gender', 10);
            $table->string('religion', 15);
            $table->string('education', 45);
            $table->string('marital_status', 15);
            $table->string('honda_id', 10);
            
            // ID Card
            $table->char('id_card_number', 16);
            $table->string('id_card_address', 45);
            $table->string('id_card_province', 20);
            $table->string('id_card_city', 20);
            $table->string('id_card_districts', 20);
            $table->string('id_card_village', 20);
            $table->char('id_card_postal_code', 5);
            $table->string('id_card_picture');

            // Current Home
            $table->string('home_address', 60);
            $table->string('home_province', 20);
            $table->string('home_city', 20);
            $table->string('home_districts', 20);
            $table->string('home_village', 20);
            $table->char('home_postal_code', 5);

            // User Info
            $table->string('email_user', 30);
            $table->string('facebook_id', 30)->nullable();
            $table->string('instagram_id', 30)->nullable();
            $table->string('twitter_id', 30)->nullable();
            $table->char('telph_number', 15)->nullable();
            $table->char('phone_number', 15);
            $table->char('relatives_phone_number', 15)->nullable();
            $table->string('user_hobby_1', 20)->nullable();
            $table->string('user_hobby_2', 20)->nullable();
            $table->string('user_hobby_3', 20)->nullable();
            $table->string('user_supervisor', 30)->nullable();
            $table->string('user_coordinator', 30)->nullable();
            $table->string('user_position', 20)->nullable();
            $table->date('user_position_start_date');
            $table->string('user_selfie');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
