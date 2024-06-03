<?php
include("connexion.php");

/// fonction pour afficher les produits
function getProduit($id=null){
        if(!empty($id)){
              
                // afficher les produits dans les champs de text
                $sql="SELECT * FROM departement WHERE id=?";
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute(array($id));
                return $req->fetch();
            
        }else {
                // afficher les produits dans la table
             $sql="SELECT * FROM departement ORDER BY id DESC LIMIT 8 "; 
            $req = $GLOBALS['con']->prepare($sql);
            $req->execute();
            return $req->fetchAll();
        
        }
        
        }

        function getPoste($id=null){
                if(!empty($id)){
                      
                        // afficher les produits dans les champs de text
                        $sql="SELECT * FROM poste WHERE id=?";
                        $req = $GLOBALS['con']->prepare($sql);
                        $req->execute(array($id));
                        return $req->fetch();
                    
                }else {
                        // afficher les produits dans la table
                     $sql="SELECT * FROM poste ORDER BY id DESC LIMIT 8 "; 
                    $req = $GLOBALS['con']->prepare($sql);
                    $req->execute();
                    return $req->fetchAll();
                
                }
                
                }
                


                function getTypeconge($id=null){
                        if(!empty($id)){
                                
                                // afficher les produits dans les champs de text
                                $sql="SELECT * FROM type_conge WHERE id=?";
                                $req = $GLOBALS['con']->prepare($sql);
                                $req->execute(array($id));
                                return $req->fetch();
                            
                        }else {
                                // afficher les produits dans la table
                                $sql="SELECT * FROM type_conge ORDER BY id DESC LIMIT 8 "; 
                                $req = $GLOBALS['con']->prepare($sql);
                                $req->execute();
                                return $req->fetchAll();
                            
                        }
                        
                        }

                       


        
////////////////////////////////
// methode pour afficher les clients
function getClient($id=null){

        //afficher les clients dans les champs de text
        if(!empty($id)){
                $sql= "SELECT * FROM client WHERE id=?";
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute(array($id));
                return $req->fetch();
        }else {
                // afficher les clients dans la table
                $sql="SELECT * FROM employe ORDER BY id DESC LIMIT 8 "; 
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute();
                return $req->fetchAll();
        }
}



function getFournisseur($id=null){

        //afficher les clients dans les champs de text
        if(!empty($id)){
                $sql= "SELECT * FROM fournisseur WHERE id=?";
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute(array($id));
                return $req->fetch();
        }else {
                // afficher les clients dans la table
                $sql="SELECT * FROM fournisseur ORDER BY id DESC LIMIT 8 "; 
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute();
                return $req->fetchAll();
        }
}

function getVente($id=null){
        if(!empty($id)){
             $sql="SELECT nom_produit,nom,prenom,v.quantite,total,date_vente,v.id,prix_achat,adresse,telephone
                    FROM client AS c,vente AS v,produit AS a WHERE v.id_produit=a.id 
                    AND v.id_client=c.id AND v.id=? AND etat =?";
                         $req = $GLOBALS['con']->prepare($sql);
                         $req->execute(array( $id ,1));
                         return $req->fetch();
}else {
        $sql="SELECT nom_produit,nom,prenom,v.quantite,total,date_vente,v.id , a.id AS idProduit
                FROM client AS c,vente AS v,produit AS a WHERE v.id_produit=a.id AND v.id_client=c.id AND etat =? "  ;
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute(array(1));
                return $req->fetchAll();
        }
}


function getCommande($id=null){
        if(!empty($id)){
             $sql="SELECT nom_produit,nom,prenom,co.quantite,prix,date_commande,co.id,prix_achat,adresse,telephone
                    FROM fournisseur AS f,commande AS co,produit AS a WHERE co.id_produit=a.id 
                    AND co.id_fournisseur=f.id AND co.id=? ";
                         $req = $GLOBALS['con']->prepare($sql);
                         $req->execute(array( $id ));
                         return $req->fetch();
}else {
        $sql="SELECT nom_produit,nom,prenom,co.quantite,prix,date_commande,co.id
                FROM fournisseur AS f,commande AS co,produit AS a WHERE co.id_produit=a.id AND co.id_fournisseur=f.id ";
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute();
                return $req->fetchAll();
        }
}

function getAllCommande()
{
        $sql= "SELECT COUNT(*) AS nbre FROM commande";
        $req = $GLOBALS['con']->prepare($sql);
        $req->execute();
        return $req->fetch();
}

function getAllVente()
{
        $sql= "SELECT COUNT(*) AS nbre FROM vente";
        $req = $GLOBALS['con']->prepare($sql);
        $req->execute();
        return $req->fetch();
}

function getAllProduit()
{
        $sql= "SELECT COUNT(*) AS nbre FROM conge";
        $req = $GLOBALS['con']->prepare($sql);
        $req->execute();
        return $req->fetch();
}


function getCA()
{
        $sql= "SELECT SUM(total) AS prix FROM vente";
        $req = $GLOBALS['con']->prepare($sql);
        $req->execute();
        return $req->fetch();
}



function getLastVente()
{
    
        $sql="SELECT * FROM employe ";
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute();
                return $req->fetchAll();
        
}


function getMostVente()
{
    
        $sql="SELECT nom_departement,nom_poste
                FROM departement AS d,poste AS o WHERE o.id_departement=d.id ";
                $req = $GLOBALS['con']->prepare($sql);
                $req->execute();
                return $req->fetch();
        
}

function getConge()
{
        $sql="SELECT * FROM conge ORDER BY id DESC LIMIT 8 "; 
        $req = $GLOBALS['con']->prepare($sql);
        $req->execute();
        return $req->fetchAll();
}


?>