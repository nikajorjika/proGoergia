<?php

namespace App\Http\Controllers;

use App\Certificaterule;
use App\Decleration;
use App\Estimation;
use App\Field;
use App\Learnmaterial;
use App\Learnmethod;
use App\Listenernumber;
use App\Ratingsystem;
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
        $listener_numbers = Listenernumber::all();
        $learn_methods = Learnmethod::all();
        $estimations = Estimation::all();
        $ratingsystems = Ratingsystem::all();
        $certificaterules = Certificaterule::all();
        $learnmaterials = Learnmaterial::all();
        return view('user.user_area',[
            'fields' => $fields,
            'declerations' => $declerations,
            'listener_numbers' => $listener_numbers,
            'learn_methods' => $learn_methods,
            'estimations'=> $estimations,
            'ratingsystems' => $ratingsystems,
            'certificaterules' => $certificaterules,
            'learnmaterials'   => $learnmaterials,
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
            'listenernumber_id'     => 'required',
            'credit'=> 'required',
            'contact_hours'=> 'required',
            'free_hours'=> 'required',
            'edu_program_results'     => 'required',
            'ratingsystem_id'     => 'required',
            'program_short_desc'     => 'required',
            'edu_program_human_resource'     => 'required',
            'trainers_contracts'     => 'required',
            'edu_program_learn_env'     => 'required',
            'edu_program_learn_resources'     => 'required',
            'estimation' => 'required',
            'certificaterule' => 'required',
            'learn_method' => 'required',
            'learnmaterial' => 'required',

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
            'listenernumber_id.required'     => '"სასწავლო პროგრამის მსმენელთა მინიმალური და მაქსიმალური  რაოდენობა" ველი სავალდებულოა ',
            'credit.required' => '"კრედიტი" ველი სავალდებულოა',
            'contact_hours.required' => '"საკონტაქტო საათი" ველი სავალდებულოა',
            'free_hours.required' => '"დამოუკიდებელი საათი" ველი სავალდებულოა',
            'edu_program_results.required'     => '"პროგრამის სწავლის შედეგები (ცოდნა და უნარ-ჩვევები)" ველი სავალდებულოა ',
            'program_short_desc.required'     => '"პროგრამის მოკლე აღწერა  და მისი შემადგენელი ძირითადი თემების ჩამონათვალი" ველი სავალდებულოა ',
            'learn_method.required'     => '"სასწავლო პროგრამის სწავლების მეთოდები და ორგანიზების ფორმა" ველი სავალდებულოა ',
            'estimation.required'     => '"სასწავლო პროგრამის მონაწილეთა შეფასების მეთოდის/მეთოდების მინიმალური და მაქსიმალური ქულის მითითებით" ველი სავალდებულოა ',
            'certificaterule.required'     => '"სერტიფიკატის გაცემის წესი და პირობები" ველი სავალდებულოა ',
            'ratingsystem_id.required'     => '"სასწავლო პროგრამის შეფასების სისტემა" ველი სავალდებულოა ',
            'edu_program_human_resource.required'     => '"სასწავლო პროგრამის ადამიანური რესურსი - მწვრთნელის/მწვრთნელების ჩამონათვალი" ველი სავალდებულოა',
            'trainers_contracts.required'     => '"მწვრთნელებთან გაფორმებული ხელშეკრულებები" ველი სავალდებულოა',
            'edu_program_learn_env.required'     => '"პროგრამის განხორციელებისთვის აუცილებელი სასწავლო  გარემო" ველი სავალდებულოა',
            'edu_program_learn_resources.required'     => '"პროგრამის განხორციელებისთვის აუცილებელი სასწავლო რესურსის ჩამონათვალი" ველი სავალდებულოა',
            'learnmaterial.required'     => '"პროგრამის განხორციელებისთვის არსებული სასწავლო მასალის ჩამონათვალი" ველი სავალდებულოა',

        );


        $annoucement     = Input::file('annoucement');
        if (isset($annoucement) && !empty($annoucement)) {
            $extension = $annoucement->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        }
        else {
            $rules['annoucement'] = 'required';
            $messages ['annoucement.required'] = '"ატვირთეთ განცხადება"  სავალდებულოა';
        }
        $extraction     = Input::file('extraction');
        if (isset($extraction) && !empty($extraction)) {
            $extension = $extraction->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        }
        else {
            $rules['extraction'] = 'required';
            $messages ['extraction.required'] = '"ატვირთეთ ამონაწერი"  სავალდებულოა';
        }

        $documentation     = Input::file('documentation');
        if (isset($documentation) && !empty($documentation)) {
            $extension = $documentation->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        }
        else {
            $rules['documentation'] = 'required';
            $messages ['documentation.required'] = '"პროგრამის შემუშავების ანგარიში და დამადასტურებელი დოკუმენტაცია -  დანართი №1"  სავალდებულოა';
        }

        $plan     = Input::file('plan');
        if (isset($plan) && !empty($plan)) {
            $extension = $plan->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        }
        else {
            $rules['plan'] = 'required';
            $messages ['plan.required'] = '"სასწავლო გეგმა  - დანართი №2"  სავალდებულოა';
        }

        $certificate     = Input::file('certificate');
        if (isset($certificate) && !empty($certificate)) {
            $extension = $certificate->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        }
        else {
            $rules['certificate'] = 'required';
            $messages ['certificate.required'] = '"სერტიფიკატის ფორმის ნიმუში  დანართი №3"  სავალდებულოა';
        }

        $trainers     = Input::file('trainers');
        if (isset($trainers) && !empty($trainers)) {
            $extension = $trainers->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        }
        else {
            $rules['trainers'] = 'required';
            $messages ['trainers.required'] = '"მწვრთნელის/მწვრთნელების  კვალიფიკაციის დამადასტურებელი დოკუმენტები, დანართი №4"  სავალდებულოა';
        }

        $materials     = Input::file('materials');
        if (isset($materials) && !empty($materials)) {
            $extension = $materials->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        }

        $bill     = Input::file('bill');
        if (isset($bill) && !empty($bill)) {
            $extension = $bill->getClientOriginalExtension();
            if ($extension != 'pdf') {
                $rules['pdf']             = 'required';
                $messages['pdf.required'] = 'დასაშვებია მხოლოდ pdf გაფართოების ფაილები';
            }
        } else {
            $rules['bill'] = 'required';
            $messages ['bill.required'] = '"ატვირთეთ გადახდის ქვითარი"  სავალდებულოა';
        }
        $this->validate($request, $rules, $messages);
        $decleration = Decleration::create($request->all());


        foreach (Input::get('learnmaterial') as $learnmaterial_id)
        {
            $decleration->learnmaterials()->attach($learnmaterial_id);
        }

        foreach (Input::get('learn_method') as $learnmethod_id)
        {

            $decleration->learnmethods()->attach($learnmethod_id);

        }
        foreach (Input::get('estimation') as $estimation_id)
        {

            $decleration->estimations()->attach($estimation_id, ['min' => Input::get('min_' . $estimation_id), 'max'=>Input::get('max_' . $estimation_id)]);
        }
        foreach (Input::get('certificaterule') as $certificaterule_id)
        {

            $decleration->certificaterules()->attach($certificaterule_id, ['percentage' => Input::get('percentage_' . $certificaterule_id)]);
        }

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
                if (isset($documentation) && !empty($documentation)) {
                    $file_name        = 'dokumentacia.pdf';
                    $destinationPath  = public_path() . '/upload/' .$decleration->id;
                    $documentation->move($destinationPath, $file_name);
                }
                if (isset($plan) && !empty($plan)) {
                    $file_name        = 'gegma.pdf';
                    $destinationPath  = public_path() . '/upload/' .$decleration->id;
                    $plan->move($destinationPath, $file_name);
                }
                if (isset($certificate) && !empty($certificate)) {
                    $file_name        = 'certificate.pdf';
                    $destinationPath  = public_path() . '/upload/' .$decleration->id;
                    $certificate->move($destinationPath, $file_name);
                }
                if (isset($trainers) && !empty($trainers)) {
                    $file_name        = 'trainers.pdf';
                    $destinationPath  = public_path() . '/upload/' .$decleration->id;
                    $trainers->move($destinationPath, $file_name);
                }
                if (isset($materials) && !empty($materials)) {
                    $file_name        = 'materials.pdf';
                    $destinationPath  = public_path() . '/upload/' .$decleration->id;
                    $materials->move($destinationPath, $file_name);
                }
                if (isset($bill) && !empty($bill)) {
                    $file_name        = 'qvitari.pdf';
                    $destinationPath  = public_path() . '/upload/' .$decleration->id;
                    $bill->move($destinationPath, $file_name);
                }
        return redirect('/user_area');
    }

    public function getUserFormEdit($id)
    {
        $decleration = Decleration::findOrNew($id);
        $fields   = Field::orderBy('name')->lists('name', 'id');
        $listener_numbers = Listenernumber::all();
        $learn_methods = Learnmethod::all();
        $estimations = Estimation::all();
        $ratingsystems = Ratingsystem::all();
        $certificaterules = Certificaterule::all();
        $learnmaterials = Learnmaterial::all();

        $dec_learnmethods = [];
        foreach ($decleration -> learnmethods as $method)
        {
            $dec_learnmethods[] = $method -> id;
        }

        $dec_estimations = [];
        foreach ($decleration -> estimations as $estimation)
        {
            $dec_estimations[$estimation -> id] = ['min' => $estimation -> pivot -> min, 'max' => $estimation -> pivot -> max];
        }

        $dec_certificaterules = [];
        foreach ($decleration -> certificaterules as $certificaterule)
        {
            $dec_certificaterules[$certificaterule -> id] = $certificaterule -> pivot -> percentage;
        }

        $dec_materials = [];
        foreach ($decleration -> learnmaterials as $material)
        {
            $dec_materials[] = $material -> id;
        }
        $editables = $decleration -> editables -> lists('field_name') -> toArray();

        return view('user.edit_user_form', [
            'decleration'          => $decleration,
            'fields'               => $fields,
            'listener_numbers'     => $listener_numbers,
            'learn_methods'        => $learn_methods,
            'dec_learnmethods'     => $dec_learnmethods,
            'estimations'          => $estimations,
            'dec_estimations'      => $dec_estimations,
            'ratingsystems'        => $ratingsystems,
            'certificaterules'     => $certificaterules,
            'dec_certificaterules' => $dec_certificaterules,
            'learnmaterials'       => $learnmaterials,
            'dec_materials'        => $dec_materials,
            'editables'            => $editables,
        ]);
    }
    public function update(Request $request,$id)
    {

        $decleration = Decleration::findOrNew($id);
        $decleration->update($request->all());

        $decleration->learnmaterials()->detach();
        foreach (Input::get('learnmaterial') as $learnmaterial_id)
        {
            $decleration->learnmaterials()->attach($learnmaterial_id);
        }
        $decleration->learnmethods()->detach();
        foreach (Input::get('learn_method') as $learnmethod_id)
        {

            $decleration->learnmethods()->attach($learnmethod_id);

        }
        $decleration->estimations()->detach();

        foreach (Input::get('estimation') as $estimation_id)
        {

            $decleration->estimations()->attach($estimation_id, ['min' => Input::get('min_' . $estimation_id), 'max'=>Input::get('max_' . $estimation_id)]);
        }
        $decleration->certificaterules()->detach();

        foreach (Input::get('certificaterule') as $certificaterule_id)
        {

            $decleration->certificaterules()->attach($certificaterule_id, ['percentage' => Input::get('percentage_' . $certificaterule_id)]);
        }

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
    public function getannoucement($id,$name)
    {
        $file    = public_path() . '/upload/'.$id.'/'.$name.'.pdf';
        $headers = array (
            'Content-Type: application/file',
        );

        return \Response::download($file,$name.'.pdf',$headers);
    }


}
