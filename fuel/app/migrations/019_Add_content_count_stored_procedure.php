<?php

namespace Fuel\Migrations;

class Add_content_count_stored_procedure
{
    public function up()
    {
        \DB::query('DROP PROCEDURE IF EXISTS `get_content_count_for_category`;')->execute();
        \DB::query("
            CREATE PROCEDURE `get_content_count_for_category`(IN `categoryID` INT)
            BEGIN
                SET @prevCount = 0;
                SET @count = 1;

                CREATE TEMPORARY TABLE IF NOT EXISTS relatedCat (id int) ENGINE=MEMORY;
                INSERT INTO relatedCat VALUES(categoryID);

                CREATE TEMPORARY TABLE IF NOT EXISTS relatedCatCheck (id int) ENGINE=MEMORY;
                INSERT INTO relatedCatCheck VALUES(categoryID);

                CREATE TEMPORARY TABLE IF NOT EXISTS relatedCatTemp (id int) ENGINE=MEMORY;

                WHILE (@count > @prevCount) DO
                    SET @prevCount = (SELECT COUNT(*) FROM relatedCat);

                    INSERT INTO relatedCatTemp
                    SELECT cat.related_category_id FROM category_in_category as cat
                    INNER JOIN relatedCat as rel on rel.id = cat.category_id
                    WHERE cat.related_category_id NOT IN (SELECT id FROM relatedCatCheck);

                    INSERT INTO relatedCat SELECT id FROM relatedCatTemp;
                    INSERT INTO relatedCatCheck SELECT id FROM relatedCatTemp;
                    DELETE FROM relatedCatTemp;

                    SET @count = (SELECT COUNT(*) FROM relatedCat);
                END WHILE;

                SELECT COUNT(*) AS content_count FROM (
                    SELECT DISTINCT cont.id FROM relatedCat AS cat
                    INNER JOIN content_in_category AS cont_cat ON cont_cat.category_id = cat.id
                    INNER JOIN contents AS cont ON cont.id = cont_cat.content_id
                ) AS tmp;

            END;
        ")->execute();
    }

    public function down()
    {
        \DB::query('DROP PROCEDURE IF EXISTS `get_content_count_for_category`;')->execute();
    }
}