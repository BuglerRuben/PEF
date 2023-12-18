<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;




class Admin
{
    protected $adminController;

    public function __construct(AdminController $adminController)
    {
        $this->adminController = $adminController;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)

    {
        
    $user = $request->user();
    if ( $user &&  $user->admin == 1) {
        }elseif(!$user) {
            // not logged in
            return $this-> adminController->redirectToAdminLogin();
            
         } else {
                // Code pour gerer le cas ou l'utilisateur n'est pas administrateur
                if (!$user || $user->admin != 1) {
                    // Code to handle the case where the user is not an administrator
                    return redirect('/')->with('error', 'You do not have the necessary permissions');
                }
                //Vous pouvez egalement utiliser d'autres methodes du controleur ici si necessaire

                if (Auth::check() && Auth::user()->admin != 1) {
                    // Code to be executed if user is logged in but not with the right role
                    return redirect('/')->with('error', 'You do not have the necessary permissions');
                }
                
    }
    return redirect()->route('index');
    }
}
