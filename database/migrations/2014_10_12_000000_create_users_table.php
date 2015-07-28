<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('role');
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('file');
            $table->string('link');
            $table->timestamps();
        });

        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('field_training', function (Blueprint $table) {
            $table->integer('training_id')->unsigned();
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');
            $table->timestamps();
        });

        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('municipalities', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('municipality_training', function (Blueprint $table) {
            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->integer('municipality_id')->unsigned()->index();
            $table->foreign('municipality_id')->references('id')->on('municipalities');
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('terms', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('term_training', function (Blueprint $table) {
            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->integer('term_id')->unsigned()->index();
            $table->foreign('term_id')->references('id')->on('terms');
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('months', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('quarters', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('month_training', function(Blueprint $table){
            $table->integer('month_id')->unsigned()->index();
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('quarter_training', function(Blueprint $table){
            $table->integer('quarter_id')->unsigned()->index();
            $table->foreign('quarter_id')->references('id')->on('quarters')->onDelete('cascade');
            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->timestamps();
        });
        DB::table('months')->insert(
            array(
                array(
                    'name' => 'იანვარი'
                ),
                array(
                    'name' => 'თებერვალი'
                ),
                array(
                    'name' => 'მარტი'
                ),
                array(
                    'name' => 'აპრილი'
                ),
                array(
                    'name' => 'მაისი'
                ),
                array(
                    'name' => 'ივნისი'
                ),
                array(
                    'name' => 'ივლისი'
                ),
                array(
                    'name' => 'აგვისტო'
                ),
                array(
                    'name' => 'სექტემბერი'
                ),
                array(
                    'name' => 'ოქტომბერი'
                ),
                array(
                    'name' => 'ნოემბერი'
                ),
                array(
                    'name' => 'დეკემბერი'
                )

            )
        );
        DB::table('quarters')->insert(
            array(
                array(
                    'name' => 'I კვარტალი'
                ),
                array(
                    'name' => 'II კვარტალი'
                ),
                array(
                    'name' => 'III კვარტალი'
                ),
                array(
                    'name' => 'IV კვარტალი'
                )
            )
        );
        DB::table('fields')->insert(
            array(
                array(
                    'name' => 'ადგილობრივი თვითმმართველობის სამართლებრივი რეგულირების საკითხები'
                ),
                array(
                    'name' => 'მუნიციპალიტეტის საფინანსო-საბიუჯეტო პროცესების ადმინისტრირება'
                ),
                array(
                    'name' => 'მუნიციპალური ქონების მართვა და განკარგვა'
                ),
                array(
                    'name' => 'ადგილობრივი მნიშვნელობის ბუნებრივი რესურსების მართვა და განკარგვა'
                ),
                array(
                    'name' => 'ადგილობრივი გადასახადები და მოსაკრებლები'
                ),
                array(
                    'name' => 'მუნიციპალიტეტის სივრცით-ტერიტორიული დაგეგმვა'
                ),
                array(
                    'name' => 'მუნიციპალიტეტის ტერიტორიის კეთილმოწყობა და შესაბამისი საინჟინრო ინფრასტრუქტურის განვითარება'
                ),
                array(
                    'name' => 'მყარი (საყოფაცხოვრებო)  ნარჩენების მართვა'
                ),
                array(
                    'name' => 'სკოლამდელი და სკოლისგარეშე აღზრდის დაწესებულებების მართვა'
                ),
                array(
                    'name' => 'ადგილობრივი მნიშნველობის საავტომობილო გზების მართვა და საგზაო მოძრაობის ორგანიზება'
                ),
                array(
                    'name' => 'გარე ვაჭრობის, გამოფენების, ბაზრებისა და ბაზრობების რეგულირება'
                ),
                array(
                    'name' => 'მუნიციპალიტეტის ტერიტორიაზე მშენებლობის ნებართვის გაცემა და მშენებლობაზე ზედამხედველობის განხორციელება'
                ),
                array(
                    'name' => 'მუნიციპალიტეტის ეკონომიკური განვითარების დაგეგმვის ძირითადი საკითხები'
                ),
                array(
                    'name' => 'მუნიციპალიტეტის სოციალური დაცვის და ჯანდაცვის საკითხები'
                ),
                array(
                    'name' => 'სტატისტიკური მონაცემების შეგროვების, დამუშავებისა და ანალიზის მეთოდები და საშუალებები'
                ),
                array(
                    'name' => 'მუნიციპალიტეტის ტერიტორიაზე სამეწარმეო საქმიანობის ხელშეწყობა'
                ),
                array(
                    'name' => 'ახალგაზრდობის საკითხების მართვა'
                ),
                array(
                    'name' => 'ტურიზმის განვითარების ხელშეწყობა'
                ),
                array(
                    'name' => 'საჯარო მმართველობის ღიაობა'
                ),
                array(
                    'name' => 'საზოგადოებასთან ურთიერთობა'
                ),
                array(
                    'name' => 'შიდა აუდიტი'
                ),
                array(
                    'name' => 'ადამიანური რესურსების მართვა'
                ),
                array(
                    'name' => 'პროექტების შემუშავება, მართვა და მონიტორინგი (PMC)'
                ),
                array(
                    'name' => 'ადგილობრივი თვითმმართველობის მოსამსახურეთა ზოგადი უნარები'
                ),
                array(
                    'name' => 'Microsoft -ის  საოფისე პროგრამები (Word, Excell, Power Point)'
                ),
                array(
                    'name' => 'უცხოური ენები'
                ),
                array(
                    'name' => 'სხვა'
                ),
            )
        );
        DB::table('terms')->insert(
            array(
                array(
                    'name' => 'მოკლევადიანი ტრენინგი (1-5 დღე)'
                ),
                array(
                    'name' => 'გრძელვადიანი ტრენინგი  (5 დღეზე მეტი) '
                ),
                array(
                    'name' => 'სემინარი'
                ),
                array(
                    'name' => 'სამუშაოსგან მოუწყვეტლად ტრენინგი'
                ),
                array(
                    'name' => 'დისტანციური სწავლების პროგრამა'
                )
            )
        );
        DB::table('regions')->insert(
            array(
                array(
                    'name' => 'თბილისი'
                ),
                array(
                    'name' => 'მცხეთა-მთიანეთის რეგიონი'
                ),
                array(
                    'name' => 'კახეთი'
                ),
                array(
                    'name' => 'ქვემო-ქართლი'
                ),
                array(
                    'name' => 'შიდა-ქართლი'
                ),
                array(
                    'name' => 'გურია'
                ),
                array(
                    'name' => 'იმერეთი'
                ),
                array(
                    'name' => 'სამცხე-ჯავახეთი'
                ),
                array(
                    'name' => 'სამეგრელო-ზემო-სვანეთი '
                ),
                array(
                    'name' => 'რაჭა-ლეჩხუმი ქვემო-სვანეთი'
                ),
                array(
                    'name' => 'აჭარის ავტონომიური რესპუბლიკა'
                ),
                array(
                    'name' => 'ზემო აფხაზეთი'
                ),
                array(
                    'name' => 'ყოფილი სამხრეთ ოსეთის ავტონომიური ოლქის ტერიტორიაზე დროებითი ადმინისტრაციულ - ტერიტორიული ერთეული'
                )
            )
        );
        DB::table('municipalities')->insert(
            array(
                array(
                    'name' => 'თ/ქ თბილისი',
                    'region_id' => '1'
                ),
                array(
                    'name' => 'თ/ქ მცხეთა',
                    'region_id' => '2'
                ),
                array(
                    'name' => 'მცხეთა',
                    'region_id' => '2'
                ),
                array(
                    'name' => 'დუშეთი',
                    'region_id' => '2'
                ),
                array(
                    'name' => 'თიანეთი',
                    'region_id' => '2'
                ),
                array(
                    'name' => 'ყაზბეგი',
                    'region_id' => '2'
                ),
                array(
                    'name' => 'თ/ქ თელავი',
                    'region_id' => '3'
                ),
                array(
                    'name' => 'თელავი',
                    'region_id' => '3'
                ),
                array(
                    'name' => 'ახმეტა',
                    'region_id' => '3'
                ),
                array(
                    'name' => 'გურჯაანი',
                    'region_id' => '3'
                ),
                array(
                    'name' => 'დედოფლისწყარო',
                    'region_id' => '3'
                ),
                array(
                    'name' => 'ლაგოდეხი',
                    'region_id' => '3'
                ),
                array(
                    'name' => 'საგარეჯო',
                    'region_id' => '3'
                ),
                array(
                    'name' => 'სიღნაღი',
                    'region_id' => '3'
                ),
                array(
                    'name' => 'ყვარელი',
                    'region_id' => '3'
                ),
                array(
                    'name' => 'თ/ქ რუსთავი',
                    'region_id' => '4'
                ),
                array(
                    'name' => 'ბოლნისი',
                    'region_id' => '4'
                ),
                array(
                    'name' => 'გარდაბანი',
                    'region_id' => '4'
                ),
                array(
                    'name' => 'დმანისი',
                    'region_id' => '4'
                ),
                array(
                    'name' => 'თეთრიწყარო',
                    'region_id' => '4'
                ),
                array(
                    'name' => 'მარნეული',
                    'region_id' => '4'
                ),
                array(
                    'name' => 'წალკა',
                    'region_id' => '4'
                ),
                array(
                    'name' => 'თ/ქ გორი',
                    'region_id' => '5'
                ),
                array(
                    'name' => 'გორი',
                    'region_id' => '5'
                ),
                array(
                    'name' => 'ქარელი',
                    'region_id' => '5'
                ),
                array(
                    'name' => 'კასპი',
                    'region_id' => '5'
                ),
                array(
                    'name' => 'ხაშური',
                    'region_id' => '5'
                ),
                array(
                    'name' => 'თ/ქ ოზურგეთი',
                    'region_id' => '6'
                ),
                array(
                    'name' => 'ოზურგეთი',
                    'region_id' => '6'
                ),
                array(
                    'name' => 'ლანჩხუთი',
                    'region_id' => '6'
                ),
                array(
                    'name' => 'ჩოხატაური',
                    'region_id' => '6'
                ),
                array(
                    'name' => 'თ/ქ ქუთაისი',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'სამტრედია',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'ზესტაფონი',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'ბაღდათი',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'ვანი',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'წყალტუბო',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'ხარაგაული',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'ხონი',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'თერჯოლა',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'საჩხერე',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'ტყიბული',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'ჭიათურა',
                    'region_id' => '7'
                ),
                array(
                    'name' => 'თ/ქ ახალციხე',
                    'region_id' => '8'
                ),
                array(
                    'name' => 'ახალციხე',
                    'region_id' => '8'
                ),
                array(
                    'name' => 'ადიგენი',
                    'region_id' => '8'
                ),
                array(
                    'name' => 'ასპინძა',
                    'region_id' => '8'
                ),
                array(
                    'name' => 'ახალქალაქი',
                    'region_id' => '8'
                ),
                array(
                    'name' => 'ბორჯომი',
                    'region_id' => '8'
                ),
                array(
                    'name' => 'ნინოწმინდა',
                    'region_id' => '8'
                ),
                array(
                    'name' => 'თ/ქ ფოთი',
                    'region_id' => '9'
                ),
                array(
                    'name' => 'თ/ქ ზუგდიდი',
                    'region_id' => '9'
                ),
                array(
                    'name' => 'ზუგდიდი',
                    'region_id' => '9'
                ),
                array(
                    'name' => 'აბაშა',
                    'region_id' => '9'
                ),
                array(
                    'name' => 'მარტვილი',
                    'region_id' => '9'
                ),
                array(
                    'name' => 'მესტია',
                    'region_id' => '9'
                ),
                array(
                    'name' => 'სენაკი',
                    'region_id' => '9'
                ),
                array(
                    'name' => 'ჩხოროწყუ',
                    'region_id' => '9'
                ),
                array(
                    'name' => 'წალენჯიხა',
                    'region_id' => '9'
                ),
                array(
                    'name' => 'ხობი',
                    'region_id' => '9'
                ),
                array(
                    'name' => 'თ/ქ ამბროლაური',
                    'region_id' => '10'
                ),
                array(
                    'name' => 'ამბროლაური',
                    'region_id' => '10'
                ),
                array(
                    'name' => 'ლენტეხი',
                    'region_id' => '10'
                ),
                array(
                    'name' => 'ონი',
                    'region_id' => '10'
                ),
                array(
                    'name' => 'ცაგერი',
                    'region_id' => '10'
                ),
                array(
                    'name' => 'თ/ქ ბათუმი',
                    'region_id' => '11'
                ),
                array(
                    'name' => 'ქედა',
                    'region_id' => '11'
                ),
                array(
                    'name' => 'ქობულეთი',
                    'region_id' => '11'
                ),
                array(
                    'name' => 'ხელვაჩაური',
                    'region_id' => '11'
                ),
                array(
                    'name' => 'ხულო',
                    'region_id' => '11'
                ),
                array(
                    'name' => 'შუახევი',
                    'region_id' => '11'
                ),
                array(
                    'name' => 'აჟარა',
                    'region_id' => '12'
                ),
                array(
                    'name' => 'ახალგორი',
                    'region_id' => '13'
                ),
                array(
                    'name' => 'ერედვი',
                    'region_id' => '13'
                ),
                array(
                    'name' => 'თიღვა',
                    'region_id' => '13'
                ),
                array(
                    'name' => 'ქურთა',
                    'region_id' => '13'
                ),
            )
        );

        DB::table('users')->insert(
            array(
                array(
                    'name'     => 'admin1',
                    'role'     => 1,
                    'password' => bcrypt('WGxDu88mLx23'),
                ),
                array(
                    'name'     => 'admin2',
                    'role'     => 2,
                    'password' => bcrypt('KDxeP11cVx47'),
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        Schema::drop('fields');
        Schema::drop('municipalities');
        Schema::drop('regions');
        Schema::drop('municipality_training');
        Schema::drop('field_training');
        Schema::drop('term_training');
        Schema::drop('trainings');
    }
}
