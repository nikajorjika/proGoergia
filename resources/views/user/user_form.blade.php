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
                                        {!! Form::label('annoucement', 'ატვირთეთ განცხადება: ', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::file('annoucement', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('extraction', 'ატვირთეთ ამონაწერი: ', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::file('extraction', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    </div>

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
                                    {!! Form::select('field_id', with_empty( $fields->toArray()), null, ['class' => 'field form-control input-sm','placeholder' => 'აირჩიეთ სფერო', 'style' => 'color: gray;']) !!}
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
                                    სასწავლო პროგრამის მსმენელთა მინიმალური და მაქსიმალური  რაოდენობა
                                @foreach($listener_numbers as $listener_number)
                                    {!! Form::label('listenernumber_id',$listener_number->number) !!}
                                    {!! Form::radio('listenernumber_id',$listener_number -> id, false) !!}
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    {!! Form::text('credit', null, ['class' => 'form-control input-sm ','placeholder' => 'კრედიტი']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('contact_hours', null, ['class' => 'form-control input-sm ','placeholder' => 'საკონტაქტო საათი']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('free_hours', null, ['class' => 'form-control input-sm ','placeholder' => 'დამოუკიდებელი საათი']) !!}
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
                                        {!! Form::label('documentation', 'პროგრამის შემუშავების ანგარიში და დამადასტურებელი დოკუმენტაცია -  დანართი №1: ', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::file('documentation', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('plan', ' სასწავლო გეგმა  - დანართი №2', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::file('plan', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        სასწავლო პროგრამის სწავლების მეთოდები და ორგანიზების ფორმა
                                    @foreach($learn_methods as $learn_method)
                                            {!! Form::label('learn_method[]',$learn_method->method) !!}
                                            {!! Form::checkbox('learn_method[]',$learn_method -> id, false) !!}
                                    @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::textarea('learn_methods_other', null, ['class' => 'form-control input-sm ','placeholder' => 'LearnMethods სხვა  ']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        სასწავლო პროგრამის მონაწილეთა შეფასების მეთოდის/მეთოდები (მონიშნეთ). მიუთითეთ შესაბამისი შეფასების მინიმალური და მაქსიმალური ქულა
                                        @foreach($estimations as $estimation)
                                            {!! Form::label('estimation[]',$estimation->name) !!}
                                            {!! Form::checkbox('estimation[]',$estimation -> id, false) !!}
                                            {!! Form::text('min_'.$estimation->id , null, ['class' => 'form-control']) !!}
                                            {!! Form::text('max_'.$estimation->id , null, ['class' => 'form-control']) !!}
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        {!! Form::textarea('estimations_other', null, ['class' => 'form-control input-sm ','placeholder' => 'Estimations სხვა  ']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        სერტიფიკატის გაცემის წესი და პირობები
                                        @foreach($certificaterules as $certificaterule)
                                            {!! Form::label('certificaterule[]',$certificaterule->name) !!}
                                            {!! Form::checkbox('certificaterule[]',$certificaterule -> id, false) !!}
                                            {!! Form::text('percentage_'.$certificaterule->id , null, ['class' => 'form-control']) !!}
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        {!! Form::textarea('certificate_rules_other', null, ['class' => 'form-control input-sm ','placeholder' => 'Certificate Rules სხვა  ']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('certificate', 'სერტიფიკატის ფორმის ნიმუში  დანართი №3 ', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::file('certificate', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        სასწავლო პროგრამის შეფასების სისტემა
                                        @foreach($ratingsystems as $ratingsystem)
                                            {!! Form::label('ratingsystem_id',$ratingsystem->system) !!}
                                            {!! Form::radio('ratingsystem_id',$ratingsystem -> id, false) !!}
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        {!! Form::textarea('rating_system_other', null, ['class' => 'form-control input-sm ','placeholder' => 'Rating System სხვა  ']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::textarea('edu_program_human_resource', null, ['class' => 'form-control input-sm ','placeholder' => 'სასწავლო პროგრამის ადამიანური რესურსი - მწვრთნელის/მწვრთნელების ჩამონათვალი ']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('trainers', 'მწვრთნელის/მწვრთნელების  კვალიფიკაციის დამადასტურებელი დოკუმენტები, დანართი №4', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::file('trainers', ['class' => 'form-control']) !!}
                                        </div>
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
                                            პროგრამის განხორციელებისთვის არსებული სასწავლო მასალის ჩამონათვალი  - გამოყენებული ლიტერატურის საძიებო ლინკები, საკითხავი მასალა, ჰენდაუტები  და ა.შ.
                                            @foreach($learnmaterials as $learnmaterial)
                                                {!! Form::label('learnmaterial[]',$learnmaterial->material) !!}
                                                {!! Form::checkbox('learnmaterial[]',$learnmaterial -> id, false) !!}
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            {!! Form::textarea('learn_materials_other',null, ['class' => 'form-control input-sm ','placeholder' => 'Learn Materials სხვა ']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                             <div class="form-group">
                                                {!! Form::label('materials', 'იმ საკითხავი მასალის ნიმუშები, რომლებიც არ არის საყოველთაოდ ხელმისაწვდომი,  დანართი №5', ['class' => 'col-sm-2 control-label']) !!}
                                                <div class="col-sm-10">
                                                {!! Form::file('materials', ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                {!! Form::label('bill', 'ატვირთეთ გადახდის ქვითარი', ['class' => 'col-sm-2 control-label']) !!}
                                            <div class="col-sm-10">
                                                {!! Form::file('bill', ['class' => 'form-control']) !!}
                                            </div>
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
