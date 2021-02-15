<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 01712 695599
     */
    public function up()
    {
        Schema::create('site_infos', function (Blueprint $table) {
            //1 Id
            $table->bigIncrements('id');
            //2 Logo url
            $table->string('logo_url')->nullable();
            //3 Footer_logo url 
            $table->string('footer_logo_url')->nullable();
            //4 Site_name 
            $table->string('site_name')->nullable();
            //5 Site_author
            $table->string('site_author')->nullable();
            //6 License_no
            $table->string('license_no')->nullable();
            //7 Registration_no
            $table->string('registration_no')->nullable();
            //8 Copyright_text
            $table->string('copyright_text')->nullable();
            //9 Twitter_feed
            $table->string('twitter_feed')->nullable();
            //10 Facebook_likebox
            $table->string('facebook_likebox')->nullable();
            //11 Primary_email
            $table->string('primary_email')->nullable();
            //12 Secondary_email
            $table->string('secondary_email')->nullable();
            //13 Primary_phone
            $table->string('primary_phone')->nullable();
            //14 Secondary_phone
            $table->string('secondary_phone')->nullable();
            //15 Primary_tel
            $table->string('primary_tel')->nullable();
            //16 Secondary_tel
            $table->string('secondary_tel')->nullable();
            //17 Primary_fax
            $table->string('primary_fax')->nullable();
            //18 Secondary_fax
            $table->string('secondary_fax')->nullable();
            //19 Po
            $table->string('po')->nullable();
            //20 Address
            $table->string('address')->nullable();
            //21 Map_url (text)
            $table->string('map_url')->nullable();
            //22 Working_hours
            $table->string('working_hours')->nullable();
            //23 Working_days
            $table->string('working_days')->nullable();
            //24 Facebook
            $table->string('facebook')->nullable();
            //25 Twitter
            $table->string('twitter')->nullable();
            //26 Google_plus
            $table->string('google_plus')->nullable();
            //27 Linkedin
            $table->string('linkedin')->nullable();
            //28 Skype
            $table->string('skype')->nullable();
            //29 Youtube
            $table->string('youtube')->nullable();
            //30 Privacy_policy(ck)
            $table->string('privacy_policy')->nullable();
            //31 About (ck)
            $table->string('about')->nullable();
            //32 Terms_of_use (ck)
            $table->string('terms_of_use')->nullable();
            
            // selected flag 
            $table->tinyInteger('selected')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_infos');
    }
}
