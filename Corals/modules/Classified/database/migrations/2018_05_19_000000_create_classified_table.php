<?php

namespace Corals\Modules\Classified\database\migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassifiedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classified_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique()->index();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive', 'archived', 'sold'])->default('active');
            $table->decimal('price')->default(0)->nullable();
            $table->boolean('price_on_call')->default(false);
            $table->text('caption')->nullable();
            $table->string('brand')->nullable();
            $table->string('condition')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('verified')->default(false);
            $table->text('properties')->nullable();

            $table->unsignedInteger('location_id')->index();
            $table->unsignedInteger('user_id')->index();

            $table->unsignedInteger('created_by')->nullable()->index();
            $table->unsignedInteger('updated_by')->nullable()->index();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('utility_locations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classified_products');
    }
}
