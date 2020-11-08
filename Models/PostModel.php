<?php

class PostModel
{
    private $id;
    private $title;
    private $text;
    private $author;
    private $created_at;

    public function setTitle(string $title): self
    {
        $this->title = trim(strip_tags($title));

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }
    
     public function setText(string $text): self
    {
        $this->text = trim(strip_tags($text));

        return $this;
    }
    
      public function getText(): ?string
    {
        return $this->text;
    }
    
    private function setAuthor(string $email): self
    {
        $this->author = $email;

        return $this;
    }
     public function getAuthor(): ?string
    {
        return $this->author;

    }


    private function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function save(): bool
    {

        if (!$this->title) {
            die("Title Not set");
        }
         if (!$this->text) {
            die("Text Not set");
        }

        if ($this->id) {
            return $this->update();
        }

        return $this->create();
    }

    private function create(): bool
    {
        $session = Session::init();
        $user = $session->get('user');
        
        $this->setAuthor($user['email']);
        
        $db = DB::getInstance();
        $string = $db->query("
          INSERT 
          INTO posts 
          SET 
            title = '{$this->title}',
            author = '{$this->author}',
            text = '{$this->text}'");        
      
        $this->setId($db->insert_id);   

        return empty($db->error);
    }

    private function update()
    {
        $db = DB::getInstance();
        $db->query("
          UPDATE 
            posts 
          SET 
            title = '{$this->title}', 
            text = '{$this->text}'
          WHERE id = {$this->id} LIMIT 1");

        return empty($db->error);
    }

    public function delete(): bool
    {
        if (!$this->id) {
            die("User should exits in DB!");
        }

        $db = DB::getInstance();
        $db->query("DELETE FROM posts WHERE id = {$this->id} LIMIT 1");

        return (bool) $db->affected_rows;
    }

    public static function findByAuthor(string $email): ?self
    {
        return self::findUserByFieldAndValue('email', $email);
    }

    public static function find(int $id): ?self
    {
        return self::findUserByFieldAndValue('id', $id);
    }

    public static function findUserByFieldAndValue(string $field, string $value)
    {
        $db = DB::getInstance();
        $res = $db->query("
          SELECT * 
          FROM posts 
          WHERE `$field` = '$value' 
          LIMIT 1");

        $arrayPost = $res->fetch_assoc();

        if (empty($arrayPost)) {
            return null;
        }

        $post = new self();

        $post
            ->setAuthor($arrayPost['author'])
            ->setId($arrayPost['id'])
            ->setTitle($arrayPost['title'])
            ->setText($arrayPost['text'])
            ->setCreatedAt($arrayPost['created_at']);

        return $post;
    }

    public function setCreatedAt(string $dateTime): self
    {
        $this->created_at = $dateTime;

        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public static function all(): array
    {
        $db = DB::getInstance();

        return $db
            ->query("SELECT id, author, title, text, created_at FROM posts")
            ->fetch_all(MYSQLI_ASSOC) ?? [];

    }
}