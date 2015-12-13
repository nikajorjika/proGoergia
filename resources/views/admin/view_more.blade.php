@extends('master')

@section('body')
    <table class="table table-responsive table-striped table-bordered adminareatable">
        <tbody>
            <tr>
                <td>განცხადება</td>
                <td>
                    <a href="{{ url('/getannoucement/'.$decleration->id.'/gancxadeba') }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/gancxadeba') }}">
                        <button class="btn {{ in_array('gancxadeba', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>ამონაწერი</td>
                <td>
                    <a href="{{ url('/getannoucement/'.$decleration->id.'/amonaceri') }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/amonaceri') }}">
                        <button class="btn {{ in_array('amonaceri', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>განმცხადებელი</td>
                <td>{{ $decleration -> applicant }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/applicant') }}">
                        <button class="btn {{ in_array('applicant', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სამართლებრივი ფორმა</td>
                <td>{{ $decleration -> law_form }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/law_form') }}">
                        <button class="btn {{ in_array('law_form', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>საიდენტიფიკაციო ნომერი</td>
                <td>{{ $decleration -> identification_number }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/identification_number') }}">
                        <button class="btn {{ in_array('identification_number', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>მისმართი</td>
                <td>{{ $decleration -> address }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/address') }}">
                        <button class="btn {{ in_array('address', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>საკონტაქტო პირი</td>
                <td>{{ $decleration -> contact_person }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/contact_person') }}">
                        <button class="btn {{ in_array('contact_person', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>ელექტრონული ფოსტა</td>
                <td>{{ $decleration -> email }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/email') }}">
                        <button class="btn {{ in_array('email', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>საკონტაქტო ტელეფონი</td>
                <td>{{ $decleration -> contact_telephone }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/contact_telephone') }}">
                        <button class="btn {{ in_array('contact_telephone', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სწავლების სფერო</td>
                <td>{{ $decleration -> field -> name }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/field') }}">
                        <button class="btn {{ in_array('field', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>

            <tr>
                <td>კომენტარი</td>
                <td>{{ $decleration -> comment }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/comment') }}">
                        <button class="btn {{ in_array('comment', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სწავლების ფორმა</td>
                <td>{{ $decleration -> term -> name }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/term') }}">
                        <button class="btn {{ in_array('term', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის დასახელება</td>
                <td>{{ $decleration -> edu_program_name }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/edu_program_name') }}">
                        <button class="btn {{ in_array('edu_program_name', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მიზანი</td>
                <td>{{ $decleration -> edu_program_goal }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/edu_program_goal') }}">
                        <button class="btn {{ in_array('edu_program_goal', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამაზე დაშვების წინაპირობა</td>
                <td>{{ $decleration -> edu_program_prelet }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/edu_program_prelet') }}">
                        <button class="btn {{ in_array('edu_program_prelet', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მიზნობრივი ჯგუფი/ჯგუფები</td>
                <td>{{ $decleration -> edu_program_goal_groups }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/edu_program_goal_groups') }}">
                        <button class="btn {{ in_array('edu_program_goal_groups', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მიზნობრივი ჯგუფი/ჯგუფები</td>
                <td>{{ $decleration -> edu_program_goal_groups }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/edu_program_goal_groups') }}">
                        <button class="btn {{ in_array('edu_program_goal_groups', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მინიმალური და მაქსიმალური რაოდენობა</td>
                <td>{{ $decleration -> listenernumber -> number }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/listenernumber') }}">
                        <button class="btn {{ in_array('listenernumber', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>კრედიტი</td>
                <td>{{ $decleration -> credit }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/credit') }}">
                        <button class="btn {{ in_array('credit', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>საკონტაქტო საათი</td>
                <td>{{ $decleration -> contact_hours }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/contact_hours') }}">
                        <button class="btn {{ in_array('contact_hours', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>დამოუკიდებელი საათი</td>
                <td>{{ $decleration -> free_hours }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/free_hours') }}">
                        <button class="btn {{ in_array('free_hours', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>

            <tr>
                <td>პროგრამის სწავლის შედეგები</td>
                <td>{{ $decleration -> edu_program_results }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/edu_program_results') }}">
                        <button class="btn {{ in_array('edu_program_results', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>პროგრამის მოკლე აღწერა და მისი შემადგენელი ძირითადი თემების ჩამონათვალი</td>
                <td>{{ $decleration -> program_short_desc }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/program_short_desc') }}">
                        <button class="btn {{ in_array('program_short_desc', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>პროგრამის შემუშავების ანგარიში და დამადასტურებელი დოკუმენტაცია -  დანართი №1</td>
                <td>
                    <a href="{{ url('/getannoucement/'.$decleration->id.'/dokumentacia')  }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/dokumentacia') }}">
                        <button class="btn {{ in_array('dokumentacia', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო გეგმა  - დანართი №2</td>
                <td>
                    <a href="{{ url('/getannoucement/'.$decleration->id.'/gegma')  }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/gegma') }}">
                        <button class="btn {{ in_array('gegma', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის სწავლების მეთოდები და ორგანიზების ფორმა</td>
                <td>
                    @foreach($decleration->learnmethods as $method)
                        {{ $method-> method . ','  }}
                    @endforeach
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/learnmethods') }}">
                        <button class="btn {{ in_array('learnmethods', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td> სხვა</td>
                <td>{{ $decleration -> learn_methods_other }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/learn_methods_other') }}">
                        <button class="btn {{ in_array('learn_methods_other', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მონაწილეთა შეფასების მეთოდი/მეთოდები</td>
                <td>
                    @foreach($decleration->estimations as $estimation)
                        {{ $estimation-> name.' '.$estimation->pivot->min . ' ' .$estimation->pivot->max   }}
                        <br>
                    @endforeach
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/estimations') }}">
                        <button class="btn {{ in_array('estimations', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td> სხვა</td>
                <td>{{ $decleration -> estimations_other }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/estimations_other') }}">
                        <button class="btn {{ in_array('estimations_other', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სერთიფიკატის გაცემის წესი და პირობები</td>
                <td>
                    @foreach($decleration->certificaterules as $rule)
                        {{ $rule-> name.' '.$rule->pivot->percentage.'%' . ','  }}
                    @endforeach
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/certificaterules') }}">
                        <button class="btn {{ in_array('certificaterules', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სერტიფიკატის ფორმის ნიმუში - დანართის №3</td>
                <td>
                    <a href="{{ url('/getannoucement/'.$decleration->id.'/certificate')  }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/certificate') }}">
                        <button class="btn {{ in_array('certificate', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td> სხვა</td>
                <td>{{ $decleration -> certificate_rules_other }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/certificate_rules_other') }}">
                        <button class="btn {{ in_array('certificate_rules_other', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის შეფასების სისტემა</td>
                <td>{{ $decleration -> ratingsystem ->system  }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/ratingsystem') }}">
                        <button class="btn {{ in_array('ratingsystem', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td> სხვა</td>
                <td>{{ $decleration -> rating_system_other }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/rating_system_other') }}">
                        <button class="btn {{ in_array('rating_system_other', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის ადამიანური რესურსი</td>
                <td>{{ $decleration -> edu_program_human_resource }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/edu_program_human_resource') }}">
                        <button class="btn {{ in_array('edu_program_human_resource', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>მწვრთნელის/მწვრთნელების  კვალიფიკაციის დამადასტურებელი დოკუმენტები - დანართი №4</td>
                <td>
                    <a href="{{ url('/getannoucement/'.$decleration->id.'/trainers')  }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/trainers') }}">
                        <button class="btn {{ in_array('trainers', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>მწვრთნელებთან გაფორმებული ხელშეკრულებები</td>
                <td>{{ $decleration -> trainers_contracts }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/trainers_contracts') }}">
                        <button class="btn {{ in_array('trainers_contracts', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>პროგრამის განხორციელების აუცილებელი სასწავლო გარემო</td>
                <td>{{ $decleration -> edu_program_learn_env }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/edu_program_learn_env') }}">
                        <button class="btn {{ in_array('edu_program_learn_env', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>პროგრამის განხორციელების აუცილებელი სასწავლო რესურსი ჩამონათვალი </td>
                <td>{{ $decleration -> edu_program_learn_resources }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/edu_program_learn_resources') }}">
                        <button class="btn {{ in_array('edu_program_learn_resources', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის სწავლების მეთოდები და ორგანიზების ფორმა</td>
                <td>
                    @foreach($decleration->learnmaterials as $material)
                        {{ $material-> material . ','  }}
                    @endforeach
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/learnmaterials') }}">
                        <button class="btn {{ in_array('learnmaterials', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td> სხვა</td>
                <td>{{ $decleration -> learn_materials_other }}</td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/learn_materials_other') }}">
                        <button class="btn {{ in_array('learn_materials_other', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>იმ საკითხავი მასალის ნიმუშები, რომლებიც არ არის საყოველთაოდ ხელმისაწვდომი -  დანართის №5</td>
                <td>
                    <a href="{{ url('/getannoucement/'.$decleration->id.'/materials')  }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/materials') }}">
                        <button class="btn {{ in_array('materials', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>ქვითარი</td>
                <td>
                    <a href="{{ url('/getannoucement/'.$decleration->id.'/qvitari')  }}"> <span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
                <td>
                    <a href="{{ url('/admin/editable/' . $decleration -> id . '/qvitari') }}">
                        <button class="btn {{ in_array('qvitari', $editables) ? 'btn-success' : 'btn-danger' }}">რედაქტირება</button>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>


@stop