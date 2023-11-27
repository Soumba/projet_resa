<?php

class FormulaireInscription
{
    
   

 
    private $email;
    
   
    private $motDePasse;
    
    

 
    private $nom;
    
   

 
    private $prenom;

    

    
    public function __construct($email, $motDePasse, $nom, $prenom)
    {
        
       
        $this->email = $email;
        
        
        $this->motDePasse = $motDePasse;
        
        
        $this->nom = $nom;
        
       
        $this->prenom = $prenom;
    }

    


    
    public function validerFormulaire()
    {
        // Ajoutez ici votre logique de validation, par exemple, vérification de la longueur du mot de passe, format de l'email, etc.
        
  
        // Si les données sont valides, vous pourriez les enregistrer dans une base de données ou effectuer d'autres opérations.
        
  
        echo "Formulaire validé. Données :\n";
        
        

       
        echo "Email: $this->email\n";
        
        
        echo "Mot de passe: $this->motDePasse\n";
        
        
        echo "Nom: $this->nom\n";
        
     
        echo "Prénom: $this->prenom\n";
    }
}


    
// Récupérer les données du formulaire
$email = $_POST['user_email'] ?? '';
$motDePasse = $_POST['user_pwd'] ?? '';
$nom = $_POST['user_name'] ?? '';
$prenom = $_POST['user_lastName'] ?? '';

// Créer une instance du formulaire


$inscription = new FormulaireInscription($email, $motDePasse, $nom, $prenom);

// Valider le formulaire


$inscription->validerFormulaire();
?>