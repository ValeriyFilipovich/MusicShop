<?php

/**
 * Класс Product - модель для работы с товарами
 */
class Product
{

    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    /**
     * Возвращает массив последних товаров
     * @param type $count [optional] <p>Количество</p>
     * @param type $page [optional] <p>Номер текущей страницы</p>
     * @return array <p>Массив с товарами</p>
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT product.id, product.name, product.price, product.is_new, category.name as category_name FROM product'
            .' JOIN category ON product.category_id = category.id'
            . ' WHERE product.status = 1'
            . ' ORDER BY RAND() LIMIT :count';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение команды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $productsList[$i]['category_name'] = $row['category_name'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Возвращает список товаров в указанной категории
     * @param type $categoryId <p>id категории</p>
     * @param type $page [optional] <p>Номер страницы</p>
     * @return type <p>Массив с товарами</p>
     */
    public static function getProductsListByCategory($categoryName, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT product.id, product.name, product.price, product.is_new, category.name as category_name FROM product'
                .' JOIN category ON product.category_id = category.id'
                . ' WHERE product.status = 1 AND category.name = :category_name'
                . ' ORDER BY id ASC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_name', $categoryName, PDO::PARAM_STR);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['is_new'] = $row['is_new'];
            $products[$i]['category_name'] = $row['category_name'];
            $i++;
        }
        return $products;
    }

    /**
     * Возвращает список товаров в указанной категории
     * @param type $productId <p>id продукта</p>
     * @param type $categoryId [optional] <p>Тип категории</p>
     * @return type <p>Миассв с свойствами</p>
     */
    public static function getProductProductProperties($categoryId, $productId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        if($categoryId == "1") {
            $sql = 'SELECT Guitar_D_name AS Name,
                   guitar_scale.Guitar_Scale_name           AS Scale,
                   color.Guitar_Color_name         AS Color,
                   cover.Guitar_Cover_name         AS GuitarCase,
                   pickup.Guitar_YesNo_name       AS Pickup,
                   body.Guitar_Body_name AS Body_material,
                   strings_num.Guitar_Strings_num_name AS Number_of_strings,
                   top.Guitar_Top_name AS Top_material,
                   frets_num.Guitar_Frets_num_name AS Number_of_frets,
                   neck.Guitar_Neck_name AS Neck_material,
                   fingerboard.Guitar_Fingerboard_name AS Fingerboard_Material
            
                    FROM   Guitar_MusicGuitar AS musicguitar
                    
                    INNER JOIN  Guitar_Scale      AS guitar_scale       ON guitar_scale.Guitar_Scale_id           = musicguitar.Guitar_D_guitar_scale
                    INNER JOIN  Guitar_Color     AS color    ON color.Guitar_Color_id         = musicguitar.Guitar_D_color
                    INNER JOIN  Guitar_Cover     AS cover      ON cover.Guitar_Cover_id         = musicguitar.Guitar_D_cover
                    INNER JOIN  Guitar_Body AS body  ON body.Guitar_Body_id = musicguitar.Guitar_D_body
                    INNER JOIN  Guitar_Strings_num AS strings_num  ON strings_num.Guitar_Strings_num_id = musicguitar.Guitar_D_strings_num
                    INNER JOIN  Guitar_Top AS top  ON top.Guitar_Top_id = musicguitar.Guitar_D_top
                    INNER JOIN  Guitar_Frets_num AS frets_num  ON frets_num.Guitar_Frets_num_id = musicguitar.Guitar_D_frets_num
                    INNER JOIN  Guitar_Neck AS neck  ON neck.Guitar_Neck_id = musicguitar.Guitar_D_neck
                    INNER JOIN  Guitar_Fingerboard AS fingerboard  ON fingerboard.Guitar_Fingerboard_id = musicguitar.Guitar_D_fingerboard
                    INNER JOIN  Guitar_YesNo      AS pickup   ON pickup.Guitar_YesNo_id       = musicguitar.Guitar_D_pickup
                    WHERE id = :productId';

            // Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':productId', $productId, PDO::PARAM_INT);

            // Выполнение коменды
            $result->execute();

            // Получение и возврат результатов
            $properties = array();
            while ($row = $result->fetch()) {
                echo "<li><span class='fw-bold'>Name: </span>" . $row['Name'] . '</li>';
                echo "<li><span class='fw-bold'>Scale: </span>" . $row['Scale'] . '</li>';
                echo "<li><span class='fw-bold'>Color: </span>" . $row['Color'] . '</li>';
                echo "<li><span class='fw-bold'>GuitarCase: </span>" . $row['GuitarCase'] . '</li>';
                echo "<li><span class='fw-bold'>Pickup: </span>" . $row['Pickup'] . '</li>';
                echo "<li><span class='fw-bold'>Body material: </span>" . $row['Body_material'] . '</li>';
                echo "<li><span class='fw-bold'>Number of strings: </span>" . $row['Number_of_strings'] . '</li>';
                echo "<li><span class='fw-bold'>Top material: </span>" . $row['Top_material'] . '</li>';
                echo "<li><span class='fw-bold'>Number of frets: </span>" . $row['Number_of_frets'] . '</li>';
                echo "<li><span class='fw-bold'>Neck material: </span>" . $row['Neck_material'] . '</li>';
                echo "<li><span class='fw-bold'>Fingerboard material: </span>" . $row['Fingerboard_Material'] . '</li>';
            }
        }

        if($categoryId == "2") {
            $sql = 'SELECT Violin_D_name AS Name,
                   size_scale.Violin_Size_scale_name AS Scale,
                   body.Violin_Body_name AS Body_material,
                   neck.Violin_Neck_name AS Neck_material,
                   type.Violin_Type_name AS Type,
                   color.Violin_Color_name AS Color,
                   pickup.Violin_YesNo_name AS Bow

                    FROM   Violin_MusicViolin AS musicviolin
                    
                    INNER JOIN  Violin_Size_scale      AS size_scale       ON size_scale.Violin_size_scale_id           = musicviolin.Violin_D_size_scale
                    INNER JOIN  Violin_Body AS body  ON body.Violin_Body_id = musicviolin.Violin_D_body
                    INNER JOIN  Violin_Neck AS neck  ON neck.Violin_Neck_id = musicviolin.Violin_D_neck
                    INNER JOIN  Violin_Type    AS type      ON type.Violin_Type_id         = musicviolin.Violin_D_type
                    INNER JOIN  Violin_Color     AS color    ON color.Violin_Color_id         = musicviolin.Violin_D_color
                    INNER JOIN  Violin_YesNo      AS pickup   ON pickup.Violin_YesNo_id       = musicviolin.Violin_D_pickup
                    WHERE id = :productId';

            // Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':productId', $productId, PDO::PARAM_INT);

            // Выполнение коменды
            $result->execute();

            // Получение и возврат результатов
            $properties = array();
            while ($row = $result->fetch()) {
                echo "<li><span class='fw-bold'>Name: </span>" . $row['Name'] . '</li>';
                echo "<li><span class='fw-bold'>Scale: </span>" . $row['Scale'] . '</li>';
                echo "<li><span class='fw-bold'>Body material: </span>" . $row['Body_material'] . '</li>';
                echo "<li><span class='fw-bold'>Neck material: </span>" . $row['Neck_material'] . '</li>';
                echo "<li><span class='fw-bold'>Type: </span>" . $row['Type'] . '</li>';
                echo "<li><span class='fw-bold'>Color: </span>" . $row['Color'] . '</li>';
                echo "<li><span class='fw-bold'>Bow: </span>" . $row['Bow'] . '</li>';
            }
        }

        if($categoryId == "3") {
            $sql = 'SELECT Flute_D_name AS Name,
                           type.Flute_Type_name AS Type,
                           body.Flute_Body_name AS Material,
                           tuning.Flute_Tuning_name AS Tuning,
                           color.Flute_Color_name AS Color,
                           fsystem.Flute_Fsystem_name AS Fsystem
                    
                            FROM   Flute_MusicFlute AS musicflute
                            
                            INNER JOIN  Flute_Type    AS type      ON type.Flute_Type_id         = musicflute.Flute_D_type
                            INNER JOIN  Flute_Tuning     AS tuning      ON tuning.Flute_tuning_id           = musicflute.Flute_D_tuning
                            INNER JOIN  Flute_Body AS body  ON body.Flute_Body_id = musicflute.Flute_D_body
                            INNER JOIN  Flute_Fsystem AS fsystem  ON fsystem.Flute_Fsystem_id = musicflute.Flute_D_fsystem
                            INNER JOIN  Flute_Color     AS color    ON color.Flute_Color_id         = musicflute.Flute_D_color
                            WHERE id = :productId';
            // Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':productId', $productId, PDO::PARAM_INT);

            // Выполнение коменды
            $result->execute();

            // Получение и возврат результатов
            $properties = array();
            while ($row = $result->fetch()) {
                echo "<li><span class='fw-bold'>Name: </span>" . $row['Name'] . '</li>';
                echo "<li><span class='fw-bold'>Type: </span>" . $row['Type'] . '</li>';
                echo "<li><span class='fw-bold'>Material: </span>" . $row['Material'] . '</li>';
                echo "<li><span class='fw-bold'>Tuning: </span>" . $row['Tuning'] . '</li>';
                echo "<li><span class='fw-bold'>Color: </span>" . $row['Color'] . '</li>';
                echo "<li><span class='fw-bold'>Fsystem: </span>" . $row['Fsystem'] . '</li>';
            }

        }

        if($categoryId == "4") {
            $sql = 'SELECT Accessories_D_name AS Model,
           atype.Accessories_Type_name         AS Accessory,
           instrument.Accessories_Instrument_name AS Instrument,
           Accessories_D_price                    AS Price
            FROM   Accessories_MusicAccessories AS musicaccessories
            INNER JOIN  Accessories_Type    AS atype      ON atype.Accessories_Type_id         = musicaccessories.Accessories_D_atype
            INNER JOIN  Accessories_Instrument AS instrument  ON instrument.Accessories_Instrument_id = musicaccessories.Accessories_D_instrument
            WHERE id = :productId';

            // Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':productId', $productId, PDO::PARAM_INT);

            // Выполнение коменды
            $result->execute();

            // Получение и возврат результатов
            $properties = array();
            while ($row = $result->fetch()) {
                echo "<li><span class='fw-bold'>Model: </span>".$row['Model'].'</li>';
                echo "<li><span class='fw-bold'>Accessory: </span>".$row['Accessory'].'</li>';
                echo "<li><span class='fw-bold'>Instrument: </span>".$row['Instrument'].'</li>';
            }
        }
    }

    /**
     * Возвращает продукт с указанным id
     * @param integer $id <p>id товара</p>
     * @return array <p>Массив с информацией о товаре</p>
     */
    public static function getProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM product WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

    /**
     * Возвращаем количество товаров в указанной категории
     * @param integer $categoryName
     * @return integer
     */
    public static function getTotalProductsInCategory($categoryName)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql =   'SELECT count(product.id) AS count FROM product'
                .' JOIN category ON product.category_id = category.id'
                .' WHERE product.status = "1" AND category.name = :category_name';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_name', $categoryName, PDO::PARAM_STR);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Возвращает список товаров с указанными индентификторами
     * @param array $idsArray <p>Массив с идентификаторами</p>
     * @return array <p>Массив со списком товаров</p>
     */
    public static function getProductsByIds($idsArray)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(',', $idsArray);

        // Текст запроса к БД
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }

    /**
     * Возвращает список рекомендуемых товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getRecommendedProducts()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price, is_new FROM product '
                . 'WHERE status = "1" AND is_recommended = "1" '
                . 'ORDER BY id DESC');
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Возвращает список товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getProductsList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM product WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateProductById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE product
            SET
                name = :name,
                price = :price,
                category_id = :category_id,
                availability = :availability,
                description = :description,
                is_new = :is_new,
                is_recommended = :is_recommended,
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createProduct($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO product '
                . '(id, name, price, category_id, availability,'
                . 'description, is_new, is_recommended, status)'
                . 'VALUES '
                . '(:id, :name, :price, :category_id, :availability,'
                . ':description, :is_new, :is_recommended, :status)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    /**
     * Возвращает текстое пояснение наличия товара:<br/>
     * <i>0 - Под заказ, 1 - В наличии</i>
     * @param integer $availability <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/products/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

}
