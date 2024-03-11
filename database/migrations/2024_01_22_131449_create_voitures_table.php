<?php

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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('reference','50')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image1','255')->nullable();
            $table->string('image2','255')->nullable();
            $table->string('image3','255')->nullable();
            $table->string('image4','255')->nullable();
            $table->string('image5','255')->nullable();
            $table->string('slug','255')->nullable();
            $table->string('nature','255')->nullable();
            $table->string('energie','255')->nullable();
            $table->string('modele','255')->nullable();
            $table->string('annee','255')->nullable();
            $table->string('kilometrage','255')->nullable();
            $table->string('type','255')->nullable();
            $table->float('prix');
            $table->boolean('negociable');
            $table->string('nbre_cylindre')->nullable();
            $table->unsignedBigInteger('marque_id');
            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->boolean('status');
            $table->boolean('nouveau');
            $table->boolean('place');
            $table->boolean('baguage');
            $table->boolean('porte');
            $table->boolean('pilote');
            $table->integer('viewer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
        $table->dropForeign('lists_marque_id_foreign');
        $table->dropForeign('lists_categorie_id_foreign');;
    }
};
