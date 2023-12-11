<?php

class PageManager
{
    private $pdo;

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getAllPages()
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM pages");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching pages: " . $e->getMessage());
        }
    }

    public function getPage($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM pages WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching page: " . $e->getMessage());
        }
    }

    public function createPage($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO pages (pageName, contents) VALUES (:pageName, :contents)");

        try {
            $stmt->execute([
                ':pageName' => $data['pageName'],
                ':contents' => $data['contents'],
            ]);
        } catch (PDOException $e) {
            die("Error creating page: " . $e->getMessage());
        }
    }

    public function updatePage($id, $data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE pages SET pageName = :pageName, contents = :contents WHERE id = :id");
            $stmt->bindParam(':pageName', $data['pageName']);
            $stmt->bindParam(':contents', $data['contents']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error updating page: " . $e->getMessage());
        }
    }

    public function deletePage($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM pages WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error deleting page: " . $e->getMessage());
        }
    }
}

// Example usage:
// $pageManager = new PageManager('localhost', 'companywebsite', 'guest', 'guest');
// $pages = $pageManager->getAllPages();
// $page = $pageManager->getPage(1);
// $pageManager->createPage(['pageName' => 'New Page', 'contents' => 'Page Contents']);
// $pageManager->updatePage(1, ['pageName' => 'Updated Page', 'contents' => 'Updated Contents']);
// $pageManager->deletePage(1);
