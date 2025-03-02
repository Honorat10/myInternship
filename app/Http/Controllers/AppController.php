<?php

namespace App\Http\Controllers;
use App\Models\Demande;
use App\Http\Requests\TraineeRequest;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(Request $request)
{
    // Vérifier si l'utilisateur est authentifié
    $user = $request->user();

    // Récupérer les demandes de l'utilisateur connecté
    $demandes = Demande::where('user_id', $user->id)->get(); // Récupère toutes les demandes de l'utilisateur

    

    // Retourner la vue 'dashboard' avec les demandes et l'utilisateur
    return view('dashboard', [
        'user' => $user,
        'demandes' => $demandes, // Envoyer les demandes à la vue
    ]);
}

    public function new(){
        return view('/new');
    }
    public function save(TraineeRequest $request, $id)
    {
        // Vérification spécifique au type de stage
        if ($request->type_stage == "academique" && empty($request->ecole)) {
            return redirect()->back()->with('error', 'Renseignez l\'école');
        } elseif ($request->type_stage == "professionnel" && !$request->hasFile('cv')) {
            return redirect()->back()->with('error', 'Renseignez le CV');
        }
    
        // Gestion du fichier CV
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvExtension = $cv->getClientOriginalExtension();
            $cvFilename = time() . '.' . $cvExtension;
            $cvPath = 'uploads/cvs/';
            $cv->move(public_path($cvPath), $cvFilename);
        }
    
        // Gestion du fichier Lettre
        if ($request->hasFile('lettre')) {
            $lettre = $request->file('lettre');
            $lettreExtension = $lettre->getClientOriginalExtension();
            $lettreFilename = time() . '.' . $lettreExtension;
            $lettrePath = 'uploads/lettres/';
            $lettre->move(public_path($lettrePath), $lettreFilename);
        }
    
        // Création de la demande
        Demande::create([
            'user_id' => $id, // Utiliser l'ID de l'utilisateur connecté
            'nom_complet' => $request->nom_complet,
            'email' => $request->email,
            'service' => $request->service,
            'type' => $request->type_stage,
            'ecole' => $request->ecole,
            'cv' => isset($cvFilename) ? $cvPath . $cvFilename : null, // Stockage du chemin du fichier CV
            'lettre' => isset($lettreFilename) ? $lettrePath . $lettreFilename : null, // Stockage du chemin du fichier Lettre
            'status' => 'en attente', // Statut par défaut
            'date_depot' => now(),
        ]);
    
        // Redirection avec message de succès
        return redirect()->back()->with('success', 'Votre demande a été enregistrée avec succès!');
    }
    
}
    
    

