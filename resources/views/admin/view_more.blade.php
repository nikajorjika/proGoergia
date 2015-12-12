@extends('master')

@section('body')
    <table class="table table-responsive table-striped table-bordered adminareatable">
        <tbody>
            <tr>
                <td>განცხადება</td>
                <td><a href="{{ url('/getannoucement/'.$decleration->id.'/gancxadeba') }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
            </tr>
            <tr>
                <td>ამონაწერი</td>
                <td><a href="{{ url('/getannoucement/'.$decleration->id.'/amonaceri') }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
            </tr>
            <tr>
                <td>განმცხადებელი</td>
                <td>{{  $decleration -> applicant}}</td>
            </tr>
            <tr>
                <td>სამართლებრივი ფორმა</td>
                <td>{{  $decleration -> law_form}}</td>
            </tr>
            <tr>
                <td>საიდენტიფიკაციო ნომერი</td>
                <td>{{  $decleration -> identification_number}}</td>
            </tr>
            <tr>
                <td>მისმართი</td>
                <td>{{  $decleration -> address}}</td>
            </tr>
            <tr>
                <td>საკონტაქტო პირი</td>
                <td>{{  $decleration -> contact_person}}</td>
            </tr>
            <tr>
                <td>ელექტრონული ფოსტა</td>
                <td>{{  $decleration -> email}}</td>
            </tr>
            <tr>
                <td>საკონტაქტო ტელეფონი</td>
                <td>{{  $decleration -> contact_telephone}}</td>
            </tr>
            <tr>
                <td>სწავლების სფერო</td>
                <td>{{  $decleration -> field -> name}}</td>
            </tr>
            <tr>
                <td>კომენტარი</td>
                <td>{{  $decleration -> comment}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის დასახელება</td>
                <td>{{  $decleration -> edu_program_name}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მიზანი</td>
                <td>{{  $decleration -> edu_program_goal}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამაზე დაშვების წინაპირობა</td>
                <td>{{  $decleration -> edu_program_prelet}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მიზნობრივი ჯგუფი/ჯგუფები</td>
                <td>{{  $decleration -> edu_program_goal_groups}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მიზნობრივი ჯგუფი/ჯგუფები</td>
                <td>{{  $decleration -> edu_program_goal_groups}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მინიმალური და მაქსიმალური რაოდენობა</td>
                <td>{{  $decleration -> listenernumber -> number}}</td>
            </tr>
            <tr>
                <td>კრედიტი</td>
                <td>{{  $decleration -> credit}}</td>
            </tr>
            <tr>
                <td>საკონტაქტო საათი</td>
                <td>{{  $decleration -> contact_hours}}</td>
            </tr>
            <tr>
                <td>დამოუკიდებელი საათი</td>
                <td>{{  $decleration -> free_hours}}</td>
            </tr>

            <tr>
                <td>პროგრამის სწავლის შედეგები</td>
                <td>{{  $decleration -> edu_program_results}}</td>
            </tr>
            <tr>
                <td>პროგრამის მოკლე აღწერა და მისი შემადგენელი ძირითადი თემების ჩამონათვალი</td>
                <td>{{  $decleration -> program_short_desc}}</td>
            </tr>
            <tr>
                <td>პროგრამის შემუშავების ანგარიში და დამადასტურებელი დოკუმენტაცია -  დანართი №1</td>
                <td><a href="{{ url('/getannoucement/'.$decleration->id.'/dokumentacia') }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო გეგმა  - დანართი №2</td>
                <td><a href="{{ url('/getannoucement/'.$decleration->id.'/gegma') }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის სწავლების მეთოდები და ორგანიზების ფორმა</td>
                <td>@foreach($decleration->learnmethods as $method)
                        {{ $method-> method . ',' }}
                    @endforeach</td>
            </tr>
            <tr>
                <td>learn_methods სხვა</td>
                <td>{{  $decleration -> learn_methods_other}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მონაწილეთა შეფასების მეთოდი/მეთოდები</td>
                <td>
                    @foreach($decleration->estimations as $estimation)
                        {{ $estimation-> name.' '.$estimation->pivot->min . ' ' .$estimation->pivot->max  }}
                        <br>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>estimations სხვა</td>
                <td>{{  $decleration -> estimations_other}}</td>
            </tr>
            <tr>>
                <td>სერთიფიკატის გაცემის წესი და პირობები</td>
                <td>
                    @foreach($decleration->certificaterules as $rule)
                        {{ $rule-> name.' '.$rule->pivot->percentage.'%' . ',' }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>სერტიფიკატის ფორმის ნიმუში - დანართის №3</td>
                <td><a href="{{ url('/getannoucement/'.$decleration->id.'/certificate') }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
            </tr>
            <tr>
                <td>certificaterules სხვა</td>
                <td>{{  $decleration -> certificate_rules_other}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის შეფასების სისტემა</td>
                <td>{{  $decleration -> ratingsystem ->system }}</td>
            </tr>
            <tr>
                <td>ratingsystem სხვა</td>
                <td>{{  $decleration -> rating_system_other}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის ადამიანური რესურსი</td>
                <td>{{  $decleration -> edu_program_human_resource}}</td>
            </tr>
            <tr>
                <td>მწვრთნელის/მწვრთნელების  კვალიფიკაციის დამადასტურებელი დოკუმენტები - დანართი №4</td>
                <td><a href="{{ url('/getannoucement/'.$decleration->id.'/trainers') }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
            </tr>
            <tr>
                <td>მწვრთნელებთან გაფორმებული ხელშეკრულებები</td>
                <td>{{  $decleration -> trainers_contracts}}</td>
            </tr>
            <tr>
                <td>პროგრამის განხორციელების აუცილებელი სასწავლო გარემო</td>
                <td>{{  $decleration -> edu_program_learn_env}}</td>
            </tr>
            <tr>
                <td>პროგრამის განხორციელების აუცილებელი სასწავლო რესურსი ჩამონათვალი </td>
                <td>{{  $decleration -> edu_program_learn_resources}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის სწავლების მეთოდები და ორგანიზების ფორმა</td>
                <td>@foreach($decleration->learnmaterials as $material)
                        {{ $material-> material . ',' }}
                    @endforeach</td>
            </tr>
            <tr>
                <td>learnmaterials სხვა</td>
                <td>{{  $decleration -> learn_materials_other}}</td>
            </tr>
            <tr>
                <td>იმ საკითხავი მასალის ნიმუშები, რომლებიც არ არის საყოველთაოდ ხელმისაწვდომი -  დანართის №5</td>
                <td><a href="{{ url('/getannoucement/'.$decleration->id.'/materials') }}"><span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
            </tr>
            <tr>
                <td>ქვითარი</td>
                <td><a href="{{ url('/getannoucement/'.$decleration->id.'/qvitari') }}"> <span class="glyphicon glyphicon-download-alt" style="font-size: 30px"></span></a>
                </td>
            </tr>
        </tbody>
    </table>


@stop