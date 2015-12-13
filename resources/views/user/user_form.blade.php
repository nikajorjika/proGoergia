
<div class="container" id={{ $type == 'add' ? 'add-container' : 'edit-container'}} style="margin:0">
    <div class="row centered-form">
        <div class="centered-width text-align-left">
            <h3 class="heading-title">
                ადგილობრივი თვითმმართველობის მოხელეთა უწყვეტი
                სწავლების სასწავლო პროგრამის წარმოდგენის ფორმა
            </h3>

            {!! Form::hidden('user_id',Auth::user()->id )!!}

            <?php $editable = in_array('gancxadeba', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('annoucement', 'ატვირთეთ განცხადება: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('annoucement', ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('amonaceri', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('extraction', 'ატვირთეთ ამონაწერი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('extraction', ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('applicant', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('applicant', 'განმცხადებელი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('applicant', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('law_form', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('law_form', 'სამართლებრივი ფორმა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('law_form', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('identification_number', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('identification_number', 'საიდენთიფიკაციო ნომერი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('identification_number', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('address', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('address', 'მისამართი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('address', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('contact_person', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('contact_person', 'საკონტაქტო პირი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('contact_person', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('email', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('email', 'ელექტრონული ფოსტა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('email', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('contact_telephone', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('contact_telephone', 'საკონტაქტო ტელეფონი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('contact_telephone', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('field', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('field_id', 'აირჩიეთ სფერო: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::select('field_id', with_empty($fields->toArray()), null, ['class' => 'field form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('comment', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('comment', 'კომენტარი (შეავსეთ იმ შემთხვევაში, თუ სწავლების სფეროთა ჩამონათვალში ირჩევთ „სხვას“): ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('comment', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('edu_program_name', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('edu_program_name', 'სასწავლო პროგრამის დასახელება: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('edu_program_name', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('edu_program_goal', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('edu_program_goal', 'სასწავლო პროგრამის მიზანი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('edu_program_goal', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('edu_program_prelet', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('edu_program_prelet', 'სასწავლო პროგრამაზე დაშვების წინაპირობა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('edu_program_prelet', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('edu_program_goal_groups', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('edu_program_goal_groups', 'სასწავლო პროგრამის მიზნობრივი ჯგუფი/ჯგუფები: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('edu_program_goal_groups', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('listenernumber', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('listenernumber_id', 'სასწავლო პროგრამის მსმენელთა მინიმალური და მაქსიმალური რაოდენობა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                @foreach($listener_numbers as $listener_number)
                    {!! Form::radio('listenernumber_id',$listener_number->id, false, [($type == 'add' || $editable) ? null : 'disabled']) !!}
                    {!! Form::label('listenernumber_id',$listener_number->number) !!}
                    <div class="clearfix"></div>
                @endforeach
                </div>
            </div>

            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('', 'სასწავლო პროგრამი მოცულობა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    <?php $editable = in_array('credit', $editables) ? true : false; ?>
                    {!! Form::label('credit', 'კრედიტი: ', ['class' => 'col-sm-12 control-label']) !!}
                    <div class="col-sm-12">
                        {!! Form::text('credit', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                    </div>

                    <?php $editable = in_array('contact_hours', $editables) ? true : false; ?>
                    {!! Form::label('contact_hours', 'საკონტაქტო საათი: ', ['class' => 'col-sm-12 control-label']) !!}
                    <div class="col-sm-12">
                        {!! Form::text('contact_hours', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                    </div>

                    <?php $editable = in_array('free_hours', $editables) ? true : false; ?>
                    {!! Form::label('free_hours', 'დამოუკიდებელი საათი: ', ['class' => 'col-sm-12 control-label']) !!}
                    <div class="col-sm-12">
                        {!! Form::text('free_hours', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                    </div>
                </div>
            </div>

            <?php $editable = in_array('edu_program_results', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('edu_program_results', 'პროგრამის სწავლის შედეგები (ცოდნა და უნარ-ჩვევები): ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('edu_program_results', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('program_short_desc', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('program_short_desc', 'პროგრამის მოკლე აღწერა  და მისი შემადგენელი ძირითადი თემების ჩამონათვალი (შედგენილი უნდა იყოს  მეთოდოლოგიით, რომელიც აკმაყოფილებს ცენტრის მიერ დადგენილ შესაბამის მოთხოვნებს: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('program_short_desc', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('documentation', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('documentation', 'პროგრამის შემუშავების ანგარიში და დამადასტურებელი დოკუმენტაცია -  დანართი №1: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('documentation', ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('gegma', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('plan', 'სასწავლო გეგმა  - დანართი №2: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('plan', ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('learnmethods', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('learn_method', 'სასწავლო პროგრამის სწავლების მეთოდები და ორგანიზების ფორმა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                <?php $checked = false; ?>
                @foreach($learn_methods as $learn_method)
                    <?php $checked = isset($dec_learnmethods) && in_array($learn_method->id, $dec_learnmethods) ? true : false ?>
                    {!! Form::checkbox('learn_method[]',$learn_method->id, $checked, [($type == 'add' || $editable) ? null : 'disabled']) !!}
                    {!! Form::label(null,$learn_method->method) !!}
                    <div class="clearfix"></div>
                @endforeach

                {!! Form::textarea('learn_methods_other', null, ['class' => 'form-control input-sm ','placeholder' => 'სხვა', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('estimations', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label(null, 'სასწავლო პროგრამის მონაწილეთა შეფასების მეთოდის/მეთოდები (მონიშნეთ). მიუთითეთ შესაბამისი შეფასების მინიმალური და მაქსიმალური ქულა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                <?php $checked = false; $min = null; $max = null; ?>
                @foreach($estimations as $estimation)
                    <?php $checked = isset($dec_estimations) && array_key_exists($estimation -> id, $dec_estimations) ? true : false ?>
                    <?php $min     = isset($dec_estimations) && array_key_exists($estimation -> id, $dec_estimations) ? $dec_estimations[$estimation -> id]['min'] : null ?>
                    <?php $max     = isset($dec_estimations) && array_key_exists($estimation -> id, $dec_estimations) ? $dec_estimations[$estimation -> id]['max'] : null ?>
                    <div class="col-md-3">
                        {!! Form::checkbox('estimation[]',$estimation->id, $checked, [($type == 'add' || $editable) ? null : 'disabled']) !!}
                        {!! Form::label(null, $estimation->name) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::text('min_'.$estimation->id, $min, ['class' => 'form-control', 'style' => 'margin-bottom: 5px', 'placeholder' => 'მინიმუმი', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                        {!! Form::text('max_'.$estimation->id, $max, ['class' => 'form-control', 'style' => 'margin-bottom: 15px', 'placeholder' => 'მაქსიმუმი', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                    </div>
                    <div class="clearfix"></div>
                @endforeach

                {!! Form::textarea('estimations_other', null, ['class' => 'form-control input-sm ','placeholder' => 'სხვა', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('certificaterules', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('certificaterule[]', 'სერტიფიკატის გაცემის წესი და პირობები: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                <?php $checked = false; $percentage = null; ?>
                @foreach($certificaterules as $certificaterule)
                    <?php $checked    = isset($dec_certificaterules) && array_key_exists($certificaterule -> id, $dec_certificaterules) ? true : false ?>
                    <?php $percentage = isset($dec_certificaterules) && array_key_exists($certificaterule -> id, $dec_certificaterules) ? $dec_certificaterules[$certificaterule -> id] : false ?>
                    <div class="col-md-5">
                        {!! Form::checkbox('certificaterule[]',$certificaterule -> id, $checked, [($type == 'add' || $editable) ? null : 'disabled']) !!}
                        {!! Form::label('certificaterule[]',$certificaterule->name) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::text('percentage_'.$certificaterule->id , $percentage, ['class' => 'form-control', 'style' => 'margin-bottom: 15px', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                    </div>
                    <div class="clearfix"></div>
                @endforeach

                    <div class="col-md-offset-5 col-md-4">
                        {!! Form::textarea('certificate_rules_other', null, ['class' => 'form-control input-sm ', ($type == 'add' || $editable) ? null : 'disabled', 'placeholder' => 'სხვა']) !!}
                    </div>
                </div>
            </div>

            <?php $editable = in_array('certificate', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('certificate', 'სერტიფიკატის ფორმის ნიმუში - დანართი №3: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('certificate', ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('ratingsystem', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('ratingsystem', 'სასწავლო პროგრამის შეფასების სისტემა: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                @foreach($ratingsystems as $ratingsystem)
                    {!! Form::radio('ratingsystem_id',$ratingsystem->id, false, [($type == 'add' || $editable) ? null : 'disabled']) !!}
                    {!! Form::label('ratingsystem_id',$ratingsystem->system) !!}
                    <div class="clearfix"></div>
                @endforeach

                {!! Form::textarea('rating_system_other', null, ['class' => 'form-control input-sm', ($type == 'add' || $editable) ? null : 'disabled', 'placeholder' => 'სხვა']) !!}
                </div>
            </div>

            <?php $editable = in_array('edu_program_human_resource', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('edu_program_human_resource', 'სასწავლო პროგრამის ადამიანური რესურსი - მწვრთნელის/მწვრთნელების ჩამონათვალი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('edu_program_human_resource', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('trainers', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('trainers', 'მწვრთნელის/მწვრთნელების  კვალიფიკაციის დამადასტურებელი დოკუმენტები, დანართი №4: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('trainers', ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('trainers_contracts', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('trainers_contracts', 'მწვრთნელებთან გაფორმებული ხელშეკრულებები: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('trainers_contracts', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('edu_program_learn_env', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('edu_program_learn_env', 'პროგრამის განხორციელებისთვის აუცილებელი სასწავლო გარემო: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('edu_program_learn_env', null, ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('edu_program_learn_resources', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('edu_program_learn_resources', 'პროგრამის განხორციელებისთვის აუცილებელი სასწავლო რესურსის ჩამონათვალი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('edu_program_learn_resources', null,['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('learnmaterials', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label(null, 'პროგრამის განხორციელებისთვის არსებული სასწავლო მასალის ჩამონათვალი  - გამოყენებული ლიტერატურის საძიებო ლინკები, საკითხავი მასალა, ჰენდაუტები  და ა.შ.: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                <?php $checked = false; ?>
                @foreach($learnmaterials as $learnmaterial)
                    <?php $checked = isset($dec_materials) && in_array($learnmaterial -> id, $dec_materials) ? true : false; ?>
                    {!! Form::checkbox('learnmaterial[]',$learnmaterial->id, $checked, [($type == 'add' || $editable) ? null : 'disabled']) !!}
                    {!! Form::label('null',$learnmaterial->material) !!}
                    <div class="clearfix"></div>
                @endforeach

                {!! Form::textarea('learn_materials_other',null, ['class' => 'form-control input-sm', ($type == 'add' || $editable) ? null : 'disabled', 'placeholder' => 'Learn Materials სხვა ']) !!}
                </div>
            </div>

            <?php $editable = in_array('qvitari', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('bill', 'ატვირთეთ გადახდის ქვითარი: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('bill', ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <?php $editable = in_array('materials', $editables) ? true : false; ?>
            <div class="form-group form-group-style {{ $editable ? 'editable' : 'not-editable' }}">
                {!! Form::label('materials', 'იმ საკითხავი მასალის ნიმუშები, რომლებიც არ არის საყოველთაოდ ხელმისაწვდომი,  დანართი №5: ', ['class' => 'col-sm-12 control-label']) !!}
                <div class="col-sm-12">
                    {!! Form::file('materials', ['class' => 'form-control', ($type == 'add' || $editable) ? null : 'disabled']) !!}
                </div>
            </div>

            <div class="col-sm-2" style="padding-left: 0; margin-bottom: 20px;">
                {!! Form::submit($submitButton, ['class' => 'btn btn-info btn-block']) !!}
            </div>
        </div>
    </div>
</div>
