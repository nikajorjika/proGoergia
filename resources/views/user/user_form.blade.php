  <div class="user-form">
        <script type="text/javascript" src="http://www.clubdesign.at/floatlabels.js"></script>
        <div class="container" style="margin:0">
            <div class="row centered-form">
                <div class="centered-width">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                ადგილობრივი თვითმმართველობის მოხელეთა უწყვეტი
                                სწავლების სასწავლო პროგრამის წარმოდგენის ფორმა
                            </h3>
                        </div>

                        <div class="panel-body">
                            {!! Form::hidden('user_id',Auth::user()->id )!!}
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            {!! Form::text('applicant', null, ['class' => 'form-control input-sm floatlabel','placeholder' => 'განმცხადებელი']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            {!! Form::text('law_form', null, ['class' => 'form-control input-sm ','placeholder' => 'სამართლებრივი ფორმა']) !!}
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    {!! Form::text('identification_number', null, ['class' => 'form-control input-sm ','placeholder' => 'საიდენთიფიკაციო ნომერი']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('address', null, ['class' => 'form-control input-sm ','placeholder' => 'მისამართი']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('contact_person', null, ['class' => 'form-control input-sm ','placeholder' => 'საკონტაქტო პირი']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('email', null, ['class' => 'form-control input-sm ','placeholder' => 'ელექტრონული ფოსტა']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('contact_telephone', null, ['class' => 'form-control input-sm ','placeholder' => 'საკონტაქტო ტელეფონი']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::select('field_id', with_empty($fields->toArray()), null, ['class' => 'field form-control','placeholder' => 'აირჩიეთ სფერო']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::textarea('comment', null, ['class' => 'form-control input-sm ','placeholder' => 'კომენტარი (შეავსეთ იმ შემთხვევაში, თუ სწავლების სფეროთა ჩამონათვალში ირჩევთ „სხვას“):']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('edu_program_name', null, ['class' => 'form-control input-sm ','placeholder' => 'სასწავლო პროგრამის დასახელება']) !!}
                                </div>



                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::textarea('edu_program_goal', null, ['class' => 'form-control input-sm ','placeholder' => 'სასწავლო პროგრამის მიზანი']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::textarea('edu_program_prelet', null, ['class' => 'form-control input-sm ','placeholder' => 'სასწავლო პროგრამაზე დაშვების წინაპირობა']) !!}
                                    </div>

                                </div>
                            </div>

                                <div class="form-group">
                                    {!! Form::text('edu_program_goal_groups', null, ['class' => 'form-control input-sm ','placeholder' => 'სასწავლო პროგრამის მიზნობრივი ჯგუფი/ჯგუფები']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('edu_program_listeners_number', null, ['class' => 'form-control input-sm ','placeholder' => 'სასწავლო პროგრამის მსმენელთა მინიმალური და მაქსიმალური  რაოდენობა']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('edu_programm_cube', null, ['class' => 'form-control input-sm ','placeholder' => 'სასწავლო პროგრამის მოცულობა: (კრედიტების რაოდენობისა და შესაბამისი საკონტაქტო და დამოუკიდებელი საათების მითითებით)']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('edu_program_results', null, ['class' => 'form-control input-sm ','placeholder' => 'პროგრამის სწავლის შედეგები (ცოდნა და უნარ-ჩვევები)']) !!}
                                </div>



                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::textarea('program_short_desc', null, ['class' => 'form-control input-sm ','placeholder' => 'პროგრამის მოკლე აღწერა  და მისი შემადგენელი ძირითადი თემების ჩამონათვალი (შედგენილი უნდა იყოს  მეთოდოლოგიით, რომელიც აკმაყოფილებს ცენტრის მიერ დადგენილ შესაბამის მოთხოვნებს  ']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::textarea('edu_program_learn_methods', null, ['class' => 'form-control input-sm ','placeholder' => 'სასწავლო პროგრამის სწავლების მეთოდები და ორგანიზების ფორმა']) !!}
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::textarea('edu_program_participants_ratings', null, ['class' => 'form-control input-sm ','placeholder' => 'სასწავლო პროგრამის მონაწილეთა შეფასების მეთოდის/მეთოდების (მაგ.: ტესტირება, პრეზენტაცია, წერითი ნამუშევარი, შემთხვევის ანალიზი და ა.შ.)  მინიმალური და მაქსიმალური ქულის მითითებით']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::textarea('certificate_award_rules', null, ['class' => 'form-control input-sm ','placeholder' => 'სერტიფიკატის გაცემის წესი და პირობები']) !!}
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::textarea('edu_program_rating_system', null, ['class' => 'form-control input-sm ','placeholder' => 'სასწავლო პროგრამის შეფასების სისტემა']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::textarea('edu_program_human_resource', null, ['class' => 'form-control input-sm ','placeholder' => 'სასწავლო პროგრამის ადამიანური რესურსი - მწვრთნელის/მწვრთნელების ჩამონათვალი ']) !!}
                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::textarea('trainers_contracts', null, ['class' => 'form-control input-sm ','placeholder' => 'მწვრთნელებთან გაფორმებული ხელშეკრულებები ']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::textarea('edu_program_learn_env', null, ['class' => 'form-control input-sm ','placeholder' => 'პროგრამის განხორციელებისთვის აუცილებელი სასწავლო  გარემო']) !!}
                                    </div>
                                </div>
                            </div>


                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            {!! Form::textarea('edu_program_learn_resources', null,['class' => 'form-control input-sm ','placeholder' => 'პროგრამის განხორციელებისთვის აუცილებელი სასწავლო რესურსის ჩამონათვალი']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            {!! Form::textarea('edu_program_learn_materials',null, ['class' => 'form-control input-sm ','placeholder' => 'პროგრამის განხორციელებისთვის არსებული სასწავლო მასალის ჩამონათვალი  - გამოყენებული ლიტერატურის საძიებო ლინკები, საკითხავი მასალა, ჰენდაუტები  და ა.შ. ']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::submit($submitButton, ['class' => 'btn btn-info btn-block']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
