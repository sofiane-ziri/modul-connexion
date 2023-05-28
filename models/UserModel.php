<?php

class DatabaseConnection {
    private $host = 'localhost'; // Hôte de la base de données
    private $dbname = 'moduleconnexion'; // Nom de la base de données
    private $username = 'root'; // Nom d'utilisateur de la base de données
    private $password = 'root'; // Mot de passe de la base de données
    private $connection; // Objet de connexion PDO
    
    public function __construct() {
        try {
            // Créer une instance de la classe PDO pour la connexion à la base de données
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            
            // Activer le mode d'erreur PDO pour afficher les exceptions en cas d'erreur
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // Gérer les erreurs de connexion à la base de données
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            die();
        }
    }
    
    // Méthode pour récupérer l'objet de connexion PDO
    public function getConnection() {
        return $this->connection;
    }
}
