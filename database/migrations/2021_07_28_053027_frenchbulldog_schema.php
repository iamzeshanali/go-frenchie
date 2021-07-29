<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FrenchbulldogSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('username', 255);
            $table->enum('role', ['breeder', 'customer'])->comment('(DC2Type:CustomEnum__breeder__customer)');
            $table->boolean('is_active');
            $table->string('hashed_password', 255);
            $table->string('remember_token', 255)->nullable();
            $table->string('email', 254);
            $table->string('phone', 255)->nullable();
            $table->string('kennel_name', 255)->nullable();
            $table->string('profile_image', 500)->nullable();
            $table->string('profile_image_file_name', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('zip', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('fb_account_url', 2083)->nullable();
            $table->string('ig_account_url', 2083)->nullable();
            $table->string('website', 2083)->nullable();
            $table->string('logo', 500)->nullable();
            $table->string('logo_file_name', 255)->nullable();

        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->string('email', 254);
            $table->string('token', 255);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();

        });

        Schema::create('listings', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->string('decription', 255);
            $table->enum('type', ['stud', 'puppy'])->comment('(DC2Type:CustomEnum__stud__puppy)');
            $table->enum('sex', ['male', 'female'])->comment('(DC2Type:CustomEnum__male__female)');
            $table->date('dob');
            $table->string('photo1', 500);
            $table->string('photo1_file_name', 255)->nullable();
            $table->string('photo2', 500);
            $table->string('photo2_file_name', 255)->nullable();
            $table->string('photo3', 500);
            $table->string('photo3_file_name', 255)->nullable();
            $table->string('photo4', 500);
            $table->string('photo4_file_name', 255)->nullable();
            $table->string('photo5', 500);
            $table->string('photo5_file_name', 255)->nullable();
            $table->boolean('is_sponsored');
            $table->enum('status', ['active', 'inactive'])->comment('(DC2Type:CustomEnum__active__inactive)');
            $table->enum('blue', ['2copies(d/d)', '1copy(D/d)', 'doesnotcarry', 'unknown'])->comment('(DC2Type:CustomEnum__2copies_d_d___1copy_D_d___doesnotcarry__unknown)')->nullable();
            $table->enum('chocolate', ['2copies(co/co)', '1copy(Co/co)', 'doesnotcarry', 'unknown'])->comment('(DC2Type:CustomEnum__2copies_co_co___1copy_Co_co___doesnotcarry__unknown)')->nullable();
            $table->enum('agouti', ['(a,a)', '(ay,a)', '(ay,at)', '(ay,ay)', '(at,a)', '(at,at)'])->comment('(DC2Type:CustomEnum___a_a____ay_a____ay_at____ay_ay____at_a____at_at_)')->nullable();
            $table->enum('testable_chocolate', ['2copies(b/b)', '1copy(B/b)', 'doesnotcarry', 'unknown'])->comment('(DC2Type:CustomEnum__2copies_b_b___1copy_B_b___doesnotcarry__unknown)')->nullable();
            $table->enum('fluffy', ['2copies(l/l)', '1copy(L/l)', 'doesnotcarry', 'unknown'])->comment('(DC2Type:CustomEnum__2copies_l_l___1copy_L_l___doesnotcarry__unknown)')->nullable();
            $table->enum('e_mcir', ['(EM,EM)', '(EM,E)', '(EM,e)', '(E,E)', '(E,e)', '(e,e)'])->comment('(DC2Type:CustomEnum___EM_EM____EM_E____EM_e____E_E____E_e____e_e_)')->nullable();
            $table->enum('intensity', ['2copies(i/i)', '1copy(I/i)', 'doesnotcarry', 'unknown'])->comment('(DC2Type:CustomEnum__2copies_i_i___1copy_I_i___doesnotcarry__unknown)')->nullable();
            $table->enum('pied', ['2copies(s/s)', '1copy(s/N)', 'doesnotcarry', 'unknown'])->comment('(DC2Type:CustomEnum__2copies_s_s___1copy_s_N___doesnotcarry__unknown)')->nullable();
            $table->enum('brindle', ['yes', 'no', 'unknown'])->comment('(DC2Type:CustomEnum__yes__no__unknown)')->nullable();
            $table->enum('merle', ['yes', 'no', 'unknown'])->comment('(DC2Type:CustomEnum__yes__no__unknown)')->nullable();
            $table->boolean('trashed');

            $table->index('user_id', 'IDX_9A7BD98EA76ED395');
        });

        Schema::create('litters', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('slug', 255);
            $table->string('title', 255);
            $table->string('decription', 255);
            $table->date('expected_dob');
            $table->string('photo1', 500);
            $table->string('photo1_file_name', 255)->nullable();
            $table->string('photo2', 500);
            $table->string('photo2_file_name', 255)->nullable();
            $table->string('photo3', 500);
            $table->string('photo3_file_name', 255)->nullable();
            $table->string('photo4', 500);
            $table->string('photo4_file_name', 255)->nullable();
            $table->string('photo5', 500);
            $table->string('photo5_file_name', 255)->nullable();
            $table->boolean('is_sponsored');
            $table->enum('status', ['active', 'inactive'])->comment('(DC2Type:CustomEnum__active__inactive)');
            $table->string('dam', 255);
            $table->string('sire', 255);
            $table->boolean('trashed');

            $table->index('user_id', 'IDX_8C97E480A76ED395');
        });

        Schema::create('breeder__supplies', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('logo', 500);
            $table->string('logo_file_name', 255)->nullable();
            $table->string('slug', 255);
            $table->string('title', 255);
            $table->string('decription', 255);
            $table->string('website_url', 2083);
            $table->string('coupon_code', 255);
            $table->integer('price_amount');
            $table->string('price_currency', 5);
            $table->boolean('trashed');
            $table->enum('status', ['active', 'inactive'])->comment('(DC2Type:CustomEnum__active__inactive)');

            $table->index('user_id', 'IDX_FB392A23A76ED395');
        });

        Schema::create('canine__genetics', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('logo', 500);
            $table->string('logo_file_name', 255)->nullable();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->string('decription', 255);
            $table->string('website_url', 2083);
            $table->string('coupon_code', 255);
            $table->integer('price_amount');
            $table->string('price_currency', 5);
            $table->boolean('trashed');
            $table->enum('status', ['active', 'inactive'])->comment('(DC2Type:CustomEnum__active__inactive)');

            $table->index('user_id', 'IDX_88C8B34BA76ED395');
        });

        Schema::create('canine__nutritions', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('logo', 500);
            $table->string('logo_file_name', 255)->nullable();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->string('decription', 255);
            $table->string('website_url', 2083);
            $table->string('coupon_code', 255);
            $table->integer('price_amount');
            $table->string('price_currency', 5);
            $table->boolean('trashed');
            $table->enum('status', ['active', 'inactive'])->comment('(DC2Type:CustomEnum__active__inactive)');

            $table->index('user_id', 'IDX_7020967EA76ED395');
        });

        Schema::create('saved_searches', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('dna_color', 255)->nullable();
            $table->string('dna_coat', 255)->nullable();
            $table->string('zip', 255)->nullable();
            $table->string('type', 255)->nullable();

            $table->index('user_id', 'IDX_EF93F31A76ED395');
        });

        Schema::create('saved_listings', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('listing_id')->unsigned();
            $table->boolean('trashed');

            $table->index('user_id', 'IDX_F49ADEA6A76ED395');
            $table->index('listing_id', 'IDX_F49ADEA6D4619D1A');
        });

        Schema::create('saved_litters', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('listing_id')->unsigned();
            $table->boolean('trashed');

            $table->index('user_id', 'IDX_6962B17A76ED395');
            $table->index('listing_id', 'IDX_6962B17D4619D1A');
        });

        Schema::create('advertises', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->string('photo', 500);
            $table->string('photo_file_name', 255)->nullable();
            $table->string('url', 2083);
            $table->boolean('trashed');
            $table->enum('status', ['active', 'inactive'])->comment('(DC2Type:CustomEnum__active__inactive)');

        });

        Schema::create('api_configs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->string('token', 255);

        });

        Schema::create('dms_roles', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->string('name', 255);

        });

        Schema::create('dms_users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->enum('type', ['local', 'oauth'])->comment('(DC2Type:CustomEnum__local__oauth)');
            $table->string('full_name', 255);
            $table->string('email', 254);
            $table->string('username', 255);
            $table->boolean('is_super_user');
            $table->boolean('is_banned');
            $table->string('password_hash', 255)->nullable();
            $table->string('password_algorithm', 10)->nullable();
            $table->integer('password_cost_factor')->nullable();
            $table->string('remember_token', 255)->nullable();
            $table->string('oauth_provider_name', 255)->nullable();
            $table->string('oauth_account_id', 255)->nullable();
            $table->mediumText('metadata');

            $table->unique('email', 'dms_users_email_unique_index');
            $table->unique('username', 'dms_users_username_unique_index');
        });

        Schema::create('dms_user_roles', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->index('role_id', 'IDX_2F104DAD60322AC');
            $table->index('user_id', 'IDX_2F104DAA76ED395');
        });

        Schema::create('dms_permissions', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->integer('role_id')->unsigned();
            $table->string('name', 255);

            $table->index('role_id', 'IDX_2B0D74A1D60322AC');
        });

        Schema::create('dms_password_resets', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->string('email', 255);
            $table->string('token', 255);
            $table->dateTime('created_at');

            $table->unique('token', 'dms_password_resets_token_unique_index');
        });

        Schema::create('dms_temp_files', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->string('token', 40);
            $table->text('file');
            $table->string('client_file_name', 255)->nullable();
            $table->enum('type', ['uploaded-image', 'uploaded-file', 'stored-image', 'in-memory', 'stored-file'])->comment('(DC2Type:CustomEnum__uploaded_image__uploaded_file__stored_image__in_memory__stored_file)');
            $table->dateTime('expiry_time');

            $table->unique('token', 'dms_temp_files_token_unique_index');
        });

        Schema::create('dms_analytics', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned();
            $table->string('driver', 255);
            $table->text('options');

        });

        Schema::table('listings', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_listings_user_id_users')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade');
        });

        Schema::table('litters', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_litters_user_id_users')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade');
        });

        Schema::table('breeder__supplies', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_breeder__supplies_user_id_users')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade');
        });

        Schema::table('canine__genetics', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_canine__genetics_user_id_users')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade');
        });

        Schema::table('canine__nutritions', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_canine__nutritions_user_id_users')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade');
        });

        Schema::table('saved_searches', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_saved_searches_user_id_users')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade');
        });

        Schema::table('saved_listings', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_saved_listings_user_id_users')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade');
            $table->foreign('listing_id', 'fk_saved_listings_listing_id_listings')
                    ->references('id')
                    ->on('listings')
                    ->onUpdate('cascade');
        });

        Schema::table('saved_litters', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_saved_litters_user_id_users')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade');
            $table->foreign('listing_id', 'fk_saved_litters_listing_id_litters')
                    ->references('id')
                    ->on('litters')
                    ->onUpdate('cascade');
        });

        Schema::table('dms_user_roles', function (Blueprint $table) {
            $table->foreign('role_id', 'fk_dms_user_roles_role_id_dms_roles')
                    ->references('id')
                    ->on('dms_roles')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('user_id', 'fk_dms_user_roles_user_id_dms_users')
                    ->references('id')
                    ->on('dms_users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });

        Schema::table('dms_permissions', function (Blueprint $table) {
            $table->foreign('role_id', 'fk_dms_permissions_role_id_dms_roles')
                    ->references('id')
                    ->on('dms_roles')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dms_analytics');
        Schema::drop('dms_temp_files');
        Schema::drop('dms_password_resets');
        Schema::drop('dms_permissions');
        Schema::drop('dms_user_roles');
        Schema::drop('dms_users');
        Schema::drop('dms_roles');
        Schema::drop('api_configs');
        Schema::drop('advertises');
        Schema::drop('saved_litters');
        Schema::drop('saved_listings');
        Schema::drop('saved_searches');
        Schema::drop('canine__nutritions');
        Schema::drop('canine__genetics');
        Schema::drop('breeder__supplies');
        Schema::drop('litters');
        Schema::drop('listings');
        Schema::drop('password_resets');
        Schema::drop('users');

    }
}
