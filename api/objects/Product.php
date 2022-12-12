<?php


class Product
{
    public $connect;
    public $table_name = "products";
    public $name;
    public $id;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;
    public $img;

    /**
     * @param PDO $db
     */
    public


        /**
         * @param $db
         * Принимает подключение к БД
         */
    function __construct($db)
    {
        $this->connect = $db;
    }


    final function isCheck(int $a, int $b): bool
    {
        return $a > $b;
//        if($a > $b){
//            return  true;
//        }else{
//            return false;
//        }
    }


    final function create(): bool
    {
        $query = "INSERT INTO " . $this->table_name . "
         SET name=:name, price=:price, description=:description, category_id=:category_id, created=:created, img=:img";
        $stmt = $this->connect->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->created = htmlspecialchars(strip_tags($this->created));
        $this->img = htmlspecialchars(strip_tags($this->img));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":created", $this->created);
        $stmt->bindParam(":img", $this->img);
        return $stmt->execute();

    }

    final function read()
    {
        $query = "SELECT c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created, p.img
            FROM " . $this->table_name . " p
                LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.created DESC";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    final function readOne()
    {
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created, p.img
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id = ?
            LIMIT
                0,1";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row["name"];
        $this->price = $row["price"];
        $this->description = $row["description"];
        $this->category_id = $row["category_id"];
        $this->category_name = $row["category_name"];
        $this->img = $row["img"];
        return $stmt;
    }

    public function update()
    {
        $query = "UPDATE" . $this->table_name . "SET
                name = :name,
                price = :price,
                description = :description,
                category_id = :category_id,
                img = :img
            WHERE
                id = :id";

        $stmt = $this->connect->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->img = htmlspecialchars(strip_tags($this->img));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":img", $this->img);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

     final function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


}

