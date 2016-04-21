<?php

namespace Fuel\Migrations;

class Alter_content_stored_procedure_date_order
{
    public function up()
    {
        \DB::query('DROP PROCEDURE IF EXISTS `get_content_for_category`;')->execute();
        \DB::query("
            CREATE PROCEDURE `get_content_for_category`(IN `categoryID` INT, IN `pagesize` INT, IN `indent` INT)
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

                IF pagesize > 0 THEN
                    SELECT DISTINCT cont.* FROM relatedCat AS cat
                    INNER JOIN content_in_category AS cont_cat ON cont_cat.category_id = cat.id
                    INNER JOIN contents AS cont ON cont.id = cont_cat.content_id
                    ORDER BY cont.updated_at
					LIMIT indent,pagesize;
                END IF;
                IF pagesize = 0 THEN
                    SELECT DISTINCT cont.* FROM relatedCat AS cat
                    INNER JOIN content_in_category AS cont_cat ON cont_cat.category_id = cat.id
                    INNER JOIN contents AS cont ON cont.id = cont_cat.content_id
					ORDER BY cont.updated_at;
                END IF;

            END;
        ")->execute();
    }

    public function down()
    {
        \DB::query('DROP PROCEDURE IF EXISTS `get_content_for_category`;')->execute();
        \DB::query("
            CREATE PROCEDURE `get_content_for_category`(IN `categoryID` INT, IN `pagesize` INT, IN `indent` INT)
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

                IF pagesize > 0 THEN
                    SELECT DISTINCT cont.* FROM relatedCat AS cat
                    INNER JOIN content_in_category AS cont_cat ON cont_cat.category_id = cat.id
                    INNER JOIN contents AS cont ON cont.id = cont_cat.content_id LIMIT indent,pagesize;
                END IF;
                IF pagesize = 0 THEN
                    SELECT DISTINCT cont.* FROM relatedCat AS cat
                    INNER JOIN content_in_category AS cont_cat ON cont_cat.category_id = cat.id
                    INNER JOIN contents AS cont ON cont.id = cont_cat.content_id;
                END IF;

            END;
        ")->execute();
    }
}