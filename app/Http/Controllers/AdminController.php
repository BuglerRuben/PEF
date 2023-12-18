<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\ { AdRepository, MessageRepository };
use App\Models\Ad;
use App\Models\User;
use App\Notifications\{AdApprove,AdRefuse};
use App\Http\Requests\MessageRefuse as MessageRefuseRequest;
use  App\Http\Requests\MessageRefuse;

class AdminController extends Controller
{
    
    public function redirectToAdminLogin()
    {
        // Logique pour rediriger vers la page de connexion admin
        return redirect('/admin/login');
    }

    public function ajouter_user(){
        return view('admin\ajouterUser');
    }
    public function show()
    {
    

        $users = User::all();
        return view('admin.show', compact('users'));
    

    }

    public function ajouter_user_traitement(Request $request){
        if($request->isMethod("post")){
            request()->validate([
                'nom' => ['required', 'string', 'max:255'],
                'prenom'=>['required','string','max:255'],
                'email' => ['required', 'string', 'email', 'max:255','unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
                $utilisateur = new User();

                $utilisateur->nom=$request->input('nom')." ".$request->input('prenom');
                $utilisateur->email=$request->input('email');
                $utilisateur->role="user";
                $mot_de_passe=bcrypt($request->input('password'));
                $utilisateur->password=$mot_de_passe;
                $utilisateur->save();
                return redirect("/admin")->with('status','Utilisateur ajout avec');
                }else{
                    return $this->redirectToAdminLogin();
                }


    }

    //
    protected $adRepository;
    protected $messagerepository;
    public function __construct(AdRepository $adRepository, Messagerepository $messagerepository)
    {
        $this->adRepository = $adRepository;
        $this->messagerepository = $messagerepository;
    }
    
    
        public function index()
{
    $adModerationCount = $this->adRepository->noActiveCount();
    $adPerimesCount = $this->adRepository->obsoleteCount();
    $messageModerationCount = $this->messagerepository->count();

    return view('admin.index', compact('adModerationCount', 'messageModerationCount', 'adPerimesCount'));
}


public function ads()
{
    $adModeration = $this->adRepository->noActive(5);
    return view('admin.ads', compact('adModeration'));
}
/**
 * 
 *

* @return \Illuminate\Http\Response
 * 
 */


public function approve(Request $request, Ad $ad)
{
    $this->adRepository->approve($ad);
    $request->session()->$request->flash('status','annonce approuvee');
    $ad->notify(new AdApprove($ad));
    return response()->json(['id' => $ad->id]);
}


public function refuse(MessageRefuseRequest $request)
{
    $ad = $this->adRepository->getById($request->id);
    $ad->notify(new AdRefuse($request->message));
    $this->adRepository->delete($ad);
    $request->session()->$request->session()->flash('status', 'refus');
    return response()->json(['id' => $ad->id]);
}

public function destroy(Request $request, Ad $ad)
{
    $this->authorize('manage', $ad);

    $this->adRepository->delete($ad);

    $request->session()->$request->flash('status','annonce supprime');

    return response()->json();
}


    }


