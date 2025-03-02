<?php

namespace App\Http\Controllers;
use App\Mail\DemandeApprouveeMail;
use App\Mail\DemandeRejeteeMail;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Importer la classe Mail
class AdminController extends Controller
{
    public function index(Request $request)
{
    $user = $request->user();
    $demandes = Demande::all(); // Récupère toutes les demandes

    // Retourne la vue d'administration avec les données
    return view('admin.index', [
        'user' => $user,
        'demandes' => $demandes, // Envoie les demandes à la vue
    ]);
}
public function approuver($id)
{
    // Trouver la demande par ID
    $demande = Demande::find($id);

    if ($demande) {
        // Mettre à jour le statut de la demande
        $demande->status = 'approuvé';
        $demande->save();
        $data = [
            'nom_complet' => $demande->nom_complet,
            'service' => $demande->service,
            'email' => $demande->email,
            'status' => $demande->status,
        ];

        // Envoyer l'email de confirmation
        Mail::to($demande->email)->send(new DemandeApprouveeMail($demande));

       

        // Retourner à la liste des demandes avec un message de succès
        return redirect()->route('admin.index')->with('success', 'La demande a été approuvée et un email a été envoyé.');
    }

    // Si la demande n'est pas trouvée, afficher une erreur
    return redirect()->route('admin.index')->with('error', 'Demande non trouvée.');
}
public function rejeter($id)
{
    // Trouver la demande par ID
    $demande = Demande::find($id);

    if ($demande) {
        // Mettre à jour le statut de la demande
        $demande->status = 'rejeté';
        $demande->save();

        // Préparer les données pour l'email
        $data = [
            'nom_complet' => $demande->nom_complet,
            'service' => $demande->service,
            'email' => $demande->email,
            'status' => $demande->status,
        ];

        // Envoyer l'email de rejet
        Mail::to($demande->email)->send(new DemandeRejeteeMail($demande));

        // Retourner à la liste des demandes avec un message de succès
        return redirect()->route('admin.index')->with('success', 'La demande a été rejetée et un email a été envoyé.');
    }

    // Si la demande n'est pas trouvée, afficher une erreur
    return redirect()->route('admin.index')->with('error', 'Demande non trouvée.');
}


}
