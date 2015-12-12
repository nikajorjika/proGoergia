
<div class="container" style="margin:0">
    <div class="row centered-form">
        <div class="centered-width text-align-left">
            <h3 class="panel-title">
                ადგილობრივი თვითმმართველობის მოხელეთა უწყვეტი
                სწავლების სასწავლო პროგრამის წარმოდგენის ფორმა
            </h3>

            {!! Form::hidden('user_id',Auth::user()->id )!!}

            <div class="form-group form-group-style">
                {!! Form::label('annoucement', 'ატვირთეთ განცხადება: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('annoucement', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('extraction', 'ატვირთეთ ამონაწერი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('extraction', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('applicant', 'განმცხადებელი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('applicant', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('law_form', 'სამართლებრივი ფორმა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('law_form', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('identification_number', 'საიდენთიფიკაციო ნომერი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('identification_number', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('address', 'მისამართი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('contact_person', 'საკონტაქტო პირი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('contact_person', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('email', 'ელექტრონული ფოსტა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('contact_telephone', 'საკონტაქტო ტელეფონი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('contact_telephone', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('field_id', 'აირჩიეთ სფერო: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::select('field_id', with_empty($fields->toArray()), null, ['class' => 'field form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('comment', 'კომენტარი (შეავსეთ იმ შემთხვევაში, თუ სწავლების სფეროთა ჩამონათვალში ირჩევთ „სხვას“): ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('edu_program_name', 'სასწავლო პროგრამის დასახელება: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('edu_program_name', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('edu_program_goal', 'სასწავლო პროგრამის მიზანი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('edu_program_goal', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('edu_program_prelet', 'სასწავლო პროგრამაზე დაშვების წინაპირობა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('edu_program_prelet', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('edu_program_goal_groups', 'სასწავლო პროგრამის მიზნობრივი ჯგუფი/ჯგუფები: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('edu_program_goal_groups', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('listenernumber_id', 'სასწავლო პროგრამის მსმენელთა მინიმალური და მაქსიმალური  რაოდენობა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                @foreach($listener_numbers as $listener_number)
                    {!! Form::label('listenernumber_id',$listener_number->number) !!}
                    {!! Form::radio('listenernumber_id',$listener_number->id, false) !!}
                @endforeach
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('', 'სასწავლო პროგრამი მოცულობა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::label('credit', 'კრედიტი: ', ['class' => 'col-sm-12 control-label']) !!}
                    <div class="col-sm-12">
                        {!! Form::text('credit', null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::label('contact_hours', 'საკონტაქტო საათი: ', ['class' => 'col-sm-12 control-label']) !!}
                    <div class="col-sm-12">
                        {!! Form::text('contact_hours', null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::label('free_hours', 'დამოუკიდებელი საათი: ', ['class' => 'col-sm-12 control-label']) !!}
                    <div class="col-sm-12">
                        {!! Form::text('free_hours', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('edu_program_results', 'პროგრამის სწავლის შედეგები (ცოდნა და უნარ-ჩვევები): ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('edu_program_results', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('program_short_desc', 'პროგრამის მოკლე აღწერა  და მისი შემადგენელი ძირითადი თემების ჩამონათვალი (შედგენილი უნდა იყოს  მეთოდოლოგიით, რომელიც აკმაყოფილებს ცენტრის მიერ დადგენილ შესაბამის მოთხოვნებს: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('program_short_desc', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('documentation', 'პროგრამის შემუშავების ანგარიში და დამადასტურებელი დოკუმენტაცია -  დანართი №1: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('documentation', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('plan', 'სასწავლო გეგმა  - დანართი №2: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('plan', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('learn_method', 'სასწავლო პროგრამის სწავლების მეთოდები და ორგანიზების ფორმა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                <?php $checked = false; ?>
                @foreach($learn_methods as $learn_method)
                    <?php $checked = isset($dec_learnmethods) && in_array($learn_method->id, $dec_learnmethods) ? true : false ?>
                    {!! Form::label('learn_method[]',$learn_method->method) !!}
                    {!! Form::checkbox('learn_method[]',$learn_method->id, $checked) !!}
                @endforeach

                {!! Form::textarea('learn_methods_other', null, ['class' => 'form-control input-sm ','placeholder' => 'სხვა  ']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('estimation[]', 'სასწავლო პროგრამის მონაწილეთა შეფასების მეთოდის/მეთოდები (მონიშნეთ). მიუთითეთ შესაბამისი შეფასების მინიმალური და მაქსიმალური ქულა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                <?php $checked = false; $min = null; $max = null; ?>
                @foreach($estimations as $estimation)
                    <?php $checked = isset($dec_estimations) && array_key_exists($estimation -> id, $dec_estimations) ? true : false ?>
                    <?php $min     = isset($dec_estimations) && array_key_exists($estimation -> id, $dec_estimations) ? $dec_estimations[$estimation -> id]['min'] : null ?>
                    <?php $max     = isset($dec_estimations) && array_key_exists($estimation -> id, $dec_estimations) ? $dec_estimations[$estimation -> id]['max'] : null ?>
                    {!! Form::label('estimation[]',$estimation->name) !!}
                    {!! Form::checkbox('estimation[]',$estimation->id, $checked) !!}
                    {!! Form::text('min_'.$estimation->id, $min, ['class' => 'form-control']) !!}
                    {!! Form::text('max_'.$estimation->id, $max, ['class' => 'form-control']) !!}
                @endforeach

                {!! Form::textarea('estimations_other', null, ['class' => 'form-control input-sm ','placeholder' => 'სხვა  ']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('estimation[]', 'სერტიფიკატის გაცემის წესი და პირობები: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                <?php $checked = false; $percentage = null; ?>
                @foreach($certificaterules as $certificaterule)
                    <?php $checked    = isset($dec_certificaterules) && array_key_exists($certificaterule -> id, $dec_certificaterules) ? true : false ?>
                    <?php $percentage = isset($dec_certificaterules) && array_key_exists($certificaterule -> id, $dec_certificaterules) ? $dec_certificaterules[$certificaterule -> id] : false ?>
                    {!! Form::label('certificaterule[]',$certificaterule->name) !!}
                    {!! Form::checkbox('certificaterule[]',$certificaterule -> id, $checked) !!}
                    {!! Form::text('percentage_'.$certificaterule->id , $percentage, ['class' => 'form-control']) !!}
                @endforeach

                {!! Form::textarea('certificate_rules_other', null, ['class' => 'form-control input-sm ','placeholder' => 'სხვა']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('certificate', 'სერტიფიკატის ფორმის ნიმუში - დანართი №3: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('certificate', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('ratingsystem', 'სასწავლო პროგრამის შეფასების სისტემა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                @foreach($ratingsystems as $ratingsystem)
                    {!! Form::label('ratingsystem_id',$ratingsystem->system) !!}
                    {!! Form::radio('ratingsystem_id',$ratingsystem->id, false) !!}
                @endforeach

                {!! Form::textarea('rating_system_other', null, ['class' => 'form-control input-sm ','placeholder' => 'სხვა']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('edu_program_human_resource', 'სასწავლო პროგრამის ადამიანური რესურსი - მწვრთნელის/მწვრთნელების ჩამონათვალი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('edu_program_human_resource', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('trainers', 'მწვრთნელის/მწვრთნელების  კვალიფიკაციის დამადასტურებელი დოკუმენტები, დანართი №4: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('trainers', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('trainers_contracts', 'მწვრთნელებთან გაფორმებული ხელშეკრულებები: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('trainers_contracts', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('edu_program_learn_env', 'პროგრამის განხორციელებისთვის აუცილებელი სასწავლო გარემო: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('edu_program_learn_env', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('edu_program_learn_resources', 'პროგრამის განხორციელებისთვის აუცილებელი სასწავლო რესურსის ჩამონათვალი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('edu_program_learn_resources', null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('learnmaterial[]', 'პროგრამის განხორციელებისთვის არსებული სასწავლო მასალის ჩამონათვალი  - გამოყენებული ლიტერატურის საძიებო ლინკები, საკითხავი მასალა, ჰენდაუტები  და ა.შ.: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                <?php $checked = false; ?>
                @foreach($learnmaterials as $learnmaterial)
                    <?php $checked = isset($dec_materials) && in_array($learnmaterial -> id, $dec_materials) ? true : false; ?>
                    {!! Form::label('learnmaterial[]',$learnmaterial->material) !!}
                    {!! Form::checkbox('learnmaterial[]',$learnmaterial->id, $checked) !!}
                @endforeach

                {!! Form::textarea('learn_materials_other',null, ['class' => 'form-control input-sm ','placeholder' => 'Learn Materials სხვა ']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('bill', 'ატვირთეთ გადახდის ქვითარი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('bill', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                {!! Form::label('materials', 'იმ საკითხავი მასალის ნიმუშები, რომლებიც არ არის საყოველთაოდ ხელმისაწვდომი,  დანართი №5: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('materials', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group form-group-style">
                <div class="col-sm-offset-2 col-sm-2">
                    {!! Form::submit($submitButton, ['class' => 'btn btn-info btn-block']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
