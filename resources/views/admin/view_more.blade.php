@extends('master')

@section('body')
    <table class="table table-responsive table-striped table-bordered adminareatable">
        <tbody>
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
                <td>სასწავლო პროგრამის მინიმალური და მაქსიმალური რაოდენობა</td>
                <td>{{  $decleration -> edu_program_listeners_number}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მოცულობა</td>
                <td>{{  $decleration -> edu_programm_cube}}</td>
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
                <td>სასწავლო პროგრამის სწავლების მეთოდები და ორგანიზების ფორმა</td>
                <td>{{  $decleration -> edu_program_learn_methods}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის მონაწილეთა შეფასების მეთოდი/მეთოდები</td>
                <td>{{  $decleration -> edu_program_participants_ratings}}</td>
            </tr>
            <tr>
                <td>სერთიფიკატის გაცემის წესი და პირობები</td>
                <td>{{  $decleration -> certificate_award_rules}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის შეფასების სისტემა</td>
                <td>{{  $decleration -> edu_program_rating_system}}</td>
            </tr>
            <tr>
                <td>სასწავლო პროგრამის ადამიანური რესურსი</td>
                <td>{{  $decleration -> edu_program_human_resource}}</td>
            </tr>
            <tr>
                <td>მწვრთნელებთან გამოფრმებული ხელშეკრულებები</td>
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
                <td>პროგრამის განხორციელებისთვის არსებული სასწავლო მასალის ჩამონათვალი </td>
                <td>{{  $decleration -> edu_program_learn_materials }}</td>
            </tr>
        </tbody>
    </table>


@stop