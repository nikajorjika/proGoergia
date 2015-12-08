<?php

namespace App\Http\Controllers;

use App\Decleration;
use App\Field;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Builder\Declaration;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function auth(Request $request)
    {
        $rules = array(
            'name'     => 'required',
            'password' => 'required'
        );

        $messages = array(
            'name.required'     => 'სახელი სავალდებულოა',
            'password.required' => 'პაროლი სავალდებულოა'
        );

        $this->validate($request, $rules, $messages);

        $user = User::where('name', Input::get('name'))
                    ->first();

        if (empty($user)) {
            return redirect('/login');
        }

        if (Hash::check(Input::get('password'), $user->password)) {
            Auth::loginUsingId($user->id);
            return redirect('/admin');
        }

        return redirect('/login');
    }

    public function admin()
    {
        if (!Auth::user())
            return redirect('/');

        return view('user.admin')
            ->with('admin_active', 'active');
    }

    public function getRegister()
    {
        return view('user.user_registration');
    }

    public function postRegister(Request $request)
    {
        $rules = array(
            'first_name'     => 'required',
            'last_name'      => 'required',
            'personal_id'    => 'required|unique:users|digits:11',
            'telephone'      => 'required|unique:users',
            'email'          => 'required|unique:users|email',
            'password'       => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        );

        $messages = array(
            'first_name.required'       => 'სახელი სავალდებულოა',
            'last_name.required'        => 'გვარი სავალდებულოა',
            'personal_id.required'      => 'პირადი ნომერი სავალდებულოა',
            'personal_id.unique'        => 'პირადი ნომერი გამოყენებულია',
            'personal_id.digits'        => 'პირადი ნომერი უნდა შედგებოდეს 11 ციფრისგან',
            'telephone.required'        => 'ტელეფონი სავალდებულოა',
            'telephone.unique'          => 'ტელეფონი გამოყენებულია',
            'email.required'            => 'ელექტრონული ფოსტა სავალდებულოა',
            'email.unique'              => 'ელექტრონული ფოსტა გამოყენებულია',
            'email.email'               => 'ელექტრონული ფოსტა არ არსებობს',
            'password.required'         => 'პაროლი სავალდებულოა',
            'password.min'              => 'პაროლი უნდა შეიცავდეს მინიმუმ 6 სიმბოლოს',
            'password.confirmed'        => 'პაროლი არ ემთხვევა',
            'password_confirmation.required' => '"გაიმეორეთ პაროლი" ველი სავალდებულოა',
            'password_confirmation.min' => '"გაიმეორეთ პაროლი" ველი უნდა შეიცავდეს მინიმუმ 6 სიმბოლოს',
        );

        $this->validate($request, $rules, $messages);

        $user = User::create($request->all());

        Auth::login($user);

        return 'იუზერი წარმატებით დაემატა';
    }
    public function getAuth()
    {
        return view('user.user_auth');
    }

    public function postAuth(Request $request)
    {
        $rules = array(
            'personal_id'     => 'required',
            'password'        => 'required'
        );

        $messages = array(
            'personal_id.required'      => 'პირადი ნომერი სავალდებულოა',
            'password.required'         => 'პაროლი სავალდებულოა'
        );

        $this->validate($request, $rules, $messages);

        $user = User::where('personal_id', Input::get('personal_id'))
            ->first();

        if (empty($user)) {
            return redirect('/user_auth');
        }

        if (Hash::check(Input::get('password'), $user->password)) {
            Auth::loginUsingId($user->id);
            return redirect('/user_area');
        }
        
        return redirect('/user_auth');
    }

    public function getUserArea()
    {

        $declerations = Auth::user()->declerations;

        $fields   = Field::orderBy('name')->lists('name', 'id');

        return view('user.user_area',[
            'fields' => $fields,
            'declerations' => $declerations,
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postAddUserForm(Request $request)
    {

        $rules = array(
            'applicant'     => 'required',
            'law_form'     => 'required',
            'identification_number'     => 'required',
            'address'     => 'required',
            'contact_person'     => 'required',
            'email'     => 'required',
            'contact_telephone'     => 'required',
            'field_id'     => 'required',
            'edu_program_name'     => 'required',
            'edu_program_goal'     => 'required',
            'edu_program_prelet'     => 'required',
            'edu_program_goal_groups'     => 'required',
            'edu_program_listeners_number'     => 'required',
            'edu_programm_cube'     => 'required',
            'edu_program_results'     => 'required',
            'program_short_desc'     => 'required',
            'edu_program_learn_methods'     => 'required',
            'edu_program_participants_ratings'     => 'required',
            'certificate_award_rules'     => 'required',
            'edu_program_rating_system'     => 'required',
            'edu_program_human_resource'     => 'required',
            'trainers_contracts'     => 'required',
            'edu_program_learn_env'     => 'required',
            'edu_program_learn_resources'     => 'required',
            'edu_program_learn_materials'     => 'required',

        );

        $messages = array(
            'applicant.required'     => '"განმცხადებელი" ველი სავალდებულოა ',
            'law_form.required'     => '"სამართლებრივი ფორმა" ველი სავალდებულოა ',
            'identification_number.required'     => '"საიდენტიფიკაციო ნომერი" ველი სავალდებულოა ',
            'address.required'     => '"მისამართი" ველი სავალდებულოა ',
            'contact_person.required'     => '"საკონტაქტო პირი" ველი სავალდებულოა ',
            'email.required'     => '"ელექტრონული ფოსტა" ველი სავალდებულოა ',
            'contact_telephone.required'     => '"საკონტაქტო ტელეფონი" ველი სავალდებულოა ',
            'field_id.required'     => '"სწავლების სფერო" ველი სავალდებულოა ',
            'edu_program_name.required'     => '"სასწავლო პროგრამის დასახელება" ველი სავალდებულოა ',
            'edu_program_goal.required'     => '"სასწავლო პროგრამის მიზანი" ველი სავალდებულოა ',
            'edu_program_prelet.required'     => '"სასწავლო პროგრამაზე დაშვების წინაპირობა" ველი სავალდებულოა ',
            'edu_program_goal_groups.required'     => '"სასწავლო პროგრამის მიზნობრივი ჯგუფი/ჯგუფები" ველი სავალდებულოა ',
            'edu_program_listeners_number.required'     => '"სასწავლო პროგრამის მსმენელთა მინიმალური და მაქსიმალური  რაოდენობა" ველი სავალდებულოა ',
            'edu_programm_cube.required'     => '"სასწავლო პროგრამის მოცულობა" ველი სავალდებულოა ',
            'edu_program_results.required'     => '"პროგრამის სწავლის შედეგები (ცოდნა და უნარ-ჩვევები)" ველი სავალდებულოა ',
            'program_short_desc.required'     => '"პროგრამის მოკლე აღწერა  და მისი შემადგენელი ძირითადი თემების ჩამონათვალი" ველი სავალდებულოა ',
            'edu_program_learn_methods.required'     => '"სასწავლო პროგრამის სწავლების მეთოდები და ორგანიზების ფორმა" ველი სავალდებულოა ',
            'edu_program_participants_ratings.required'     => '"სასწავლო პროგრამის მონაწილეთა შეფასების მეთოდის/მეთოდების მინიმალური და მაქსიმალური ქულის მითითებით" ველი სავალდებულოა ',
            'certificate_award_rules.required'     => '"სერტიფიკატის გაცემის წესი და პირობები" ველი სავალდებულოა ',
            'edu_program_rating_system.required'     => '"სასწავლო პროგრამის შეფასების სისტემა" ველი სავალდებულოა ',
            'edu_program_human_resource.required'     => '"სასწავლო პროგრამის ადამიანური რესურსი - მწვრთნელის/მწვრთნელების ჩამონათვალი" ველი სავალდებულოა',
            'trainers_contracts.required'     => '"მწვრთნელებთან გაფორმებული ხელშეკრულებები" ველი სავალდებულოა',
            'edu_program_learn_env.required'     => '"პროგრამის განხორციელებისთვის აუცილებელი სასწავლო  გარემო" ველი სავალდებულოა',
            'edu_program_learn_resources.required'     => '"პროგრამის განხორციელებისთვის აუცილებელი სასწავლო რესურსის ჩამონათვალი" ველი სავალდებულოა',
            'edu_program_learn_materials.required'     => '"პროგრამის განხორციელებისთვის არსებული სასწავლო მასალის ჩამონათვალი" ველი სავალდებულოა',

        );


        $annoucement     = Input::file('annoucement');
        if (isset($annoucement) && !empty($annoucement)) {
            $extension = $annoucement->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        }
        $extraction     = Input::file('extraction');
        if (isset($extraction) && !empty($extraction)) {
            $extension = $extraction->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        }

        $this->validate($request, $rules, $messages);

        $decleration = Decleration::create($request->all());


        if (isset($annoucement) && !empty($annoucement)) {
            $file_name        = 'gancxadeba.pdf';
            $destinationPath  = public_path() . '/upload/' . $decleration->id;
            $annoucement->move($destinationPath, $file_name);
        }

        if (isset($extraction) && !empty($extraction)) {
            $file_name        = 'amonaceri.pdf';
            $destinationPath  = public_path() . '/upload/' .$decleration->id;
            $extraction->move($destinationPath, $file_name);
        }


        return redirect('/user_area');
    }

    public function getUserFormEdit($id)
    {
        $decleration = Decleration::findOrNew($id);
        $fields   = Field::orderBy('name')->lists('name', 'id');

        return view('user.edit_user_form',[
            'decleration' => $decleration,
            'fields'       =>$fields,
        ]);
    }
    public function update(Request $request,$id)
    {
        $decleration = Decleration::findOrNew($id);
        $decleration->update($request->all());

        return redirect('/user_area');
    }

    public function delete($id)
    {
        $decleration = Decleration::findOrNew($id);
        $decleration->delete($id);

        return redirect('/user_area');
    }
    public function downloadannoucement()
    {
        $file    = public_path() . '/upload/gancxadeba.docx';
        $headers = array (
            'Content-Type: application/file',
        );

        return \Response::download($file,'gancxadeba.docx',$headers);
    }


}
